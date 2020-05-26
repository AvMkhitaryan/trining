<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 04.04.2020
 * Time: 20:27
 */

namespace application\controllers;

use application\base\BaseController;
use application\components\Auth;
use application\components\Db;
use application\models\ContactForm;
use application\models\ProfileSettings;
use application\models\Buy;

class SiteController extends BaseController
{
    public function actionIndex()
    {

        $db = Db::getConnection();

        $select = $db->query("SELECT * FROM `category` ORDER BY `name`");
        $result=$select->fetchAll(\PDO::FETCH_ASSOC);


        $this->view->setTitle('home');
        $this->view->render('site/index', [$result]);

        return true;
    }

    public function actionBuy($id){

        if (!Auth::checkLogged()){
            Auth::redirect("/user/login");
        }

        $proId=$id;
        $userId=$_SESSION['userId'];
        $db = Db::getConnection();

        $select = $db->query("SELECT * FROM `product` WHERE `id`='$proId'");
        $ProSelect=$select->fetchAll(\PDO::FETCH_ASSOC);

        $select = $db->query("SELECT * FROM `users` WHERE `id`='$userId'");
        $UserSelect=$select->fetchAll(\PDO::FETCH_ASSOC);

        if (!empty($_POST)&& !empty($_POST["buy"])){

            $buy=new Buy();
            $buy->DbBuy($id);
            $buy->DbMinusQuantity($_POST['quantity']);
            $v=$buy->CreateSession();

            if ($v==true){
                $_SESSION['thenksBuy']=true;
            }
        }

        $this->view->setTitle('Buy');
        $this->view->render('site/buy', ['id'=>$id,$ProSelect,$UserSelect]);

        return true;

    }

    public function actionBasket(){
        if (!Auth::checkLogged()){
            Auth::redirect("/user/login");
        }
        if (!empty($_SESSION["by"])){
            $array=$_SESSION["by"];
        }else{
            $array="empty";
        }

        $this->view->setTitle('Basket');
        $this->view->render('site/basket', [$array]);

        return true;
    }

    public function actionBaskdel($id){
        if (!Auth::checkLogged()){
            Auth::redirect("/user/login");
        }

        if (empty($_SESSION["by"])){
            Auth::redirect("/site/product");
        }
        if (!empty($_SESSION["by"])){
            $V=$_SESSION["by"];
            unset($V[$id]);
            $_SESSION["by"]=$V;
            Auth::redirect("/site/basket");

        }
        return true;
    }

    public function actionView($id){
        $val=$id;
        $db = Db::getConnection();

        $select = $db->query("SELECT * FROM `product` WHERE `id`='$val'");
        $ProID=$select->fetchAll(\PDO::FETCH_ASSOC);

        $this->view->setTitle('Views');
        $this->view->render('site/view', ['id'=>$id,$ProID]);

        return true;
    }

    public function actionProducts($id){
        $db = Db::getConnection();

        $pr = $db->query("SELECT `prod`.*, `cat`.`name` AS `cat_name`
                FROM `product` AS `prod`
                        LEFT JOIN `category` AS `cat`
                                ON `prod`.`category_id` = `cat`.`id` WHERE `category_id`='$id' ORDER BY `id` DESC ");
        $p=$pr->fetchAll(\PDO::FETCH_ASSOC);

        $select = $db->query("SELECT * FROM `category` ORDER BY `name`");
        $c=$select->fetchAll(\PDO::FETCH_ASSOC);

        $this->view->setTitle('Products');
        $this->view->render('site/products', ['id'=>$id,$c,$p]);

        return true;

    }

    public function actionProduct()
    {

        $db = Db::getConnection();
        $pr = $db->query("SELECT `prod`.*, `cat`.`name` AS `cat_name`
                FROM `product` AS `prod`
                        LEFT JOIN `category` AS `cat`
                                ON `prod`.`category_id` = `cat`.`id`  ORDER BY `id` DESC ");
        $production=$pr->fetchAll(\PDO::FETCH_ASSOC);

        $select = $db->query("SELECT * FROM `category` ORDER BY `name`");
       $category=$select->fetchAll(\PDO::FETCH_ASSOC);

        $this->view->setTitle('product');
        $this->view->render('site/product', [$category]);

        return true;
    }

    public function actionContact()
    {
        if (!empty($_POST) && !empty($_POST["button"])){
           $contact=new ContactForm($_POST);
           if ($contact->insert()==true){
               $_POST["thanksName"]=$_POST["name"];
           }
        }
        $this->view->setTitle('contact');
        $this->view->render('site/contact', []);

        return true;
    }

    public function actionAbout()
    {
        $this->view->setTitle('About');
        $this->view->render('site/about', []);

        return true;
    }

    public function actionSettings($id)
    {
        if (!Auth::checkLogged()){
            Auth::redirect("/");
        }

        $db = Db::getConnection();

        $select = $db->query("SELECT * FROM `users` WHERE `id`='$id'");
        $result=$select->fetchAll(\PDO::FETCH_ASSOC);


        if (!empty($_POST) && $_POST["button"]=="edit"){
            $_POST["id"]=$id;
            $edit=new ProfileSettings();
            $edit->value($_POST);

            if ($edit->insert()==true){
                $_SESSION["editName"]=$_POST["fname"];
            }
        }

        $this->view->setTitle('Settings');
        $this->view->render('site/settings', ['id'=>$id, $result]);
        return true;
    }

    public function actionError()
    {
        $this->view->setLayout('error');
        $this->view->setTitle('error');
        $this->view->render('', []);

        return true;
    }

    public function actionLogout()
    {
        Auth::logout();
        Auth::redirect("/");
        return true;
    }
}