<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 11.04.2020
 * Time: 19:07
 */


namespace application\controllers\admin;

use application\base\AdminBaseController;
use application\components\Auth;
use application\components\Db;
use application\models\AdminForm;
use application\models\LoginForm;
use application\models\Product;
class DashboardController extends AdminBaseController
{
    public function actionIndex()
    {
        if (Auth::checkLogged()!==true) {
            header("Location: /admin/login");
        }

        if (Auth::isAdmin()!==true) {
            $this->view->render('admin/dashboard/index', []);
        }

        $this->view->setTitle('home');
        $this->view->render('admin/dashboard/index', []);

        return true;
    }

    public function actionLogin()
    {
        if (!empty($_POST)&& !empty($_POST["submit"])){
            $info=new AdminForm($_POST);
            if ($info->InfoInDb()==true){
                Auth::redirect("/admin");
            }else{
                $_SESSION["AdminLoginPage"]="HOOPS You have Note Admin";
                Auth::redirect("admin/dashboard/login");
            }
        }
        $this->view->setTitle('home');
        $this->view->render('admin/dashboard/login', []);

        return true;
    }

    public function actionLogout(){


        if (!empty($_POST) && !empty($_POST["exit"])){
            Auth::logout();
        echo json_encode(1,200);
        die();
        }
    }

    public function actionSearch(){
//        echo json_encode(1,200);
//        die();
        if (!empty($_POST)){

            if ($_POST["TableName"]=="product"){

                $value=$_POST["InputVal"];
                $db = \application\components\Db::getConnection();
                $select = $db->query("SELECT `prod`.*, `cat`.`name` AS `cat_name`
                FROM `product` AS `prod`
                        LEFT JOIN `category` AS `cat`
                                ON `prod`.`category_id` = `cat`.`id` WHERE `prod`.`name` LIKE '%$value%' ORDER BY `id` DESC ");
                $result=$select->fetchAll(\PDO::FETCH_ASSOC);

                echo json_encode($result,200);
                die();
            }

            if ($_POST["TableName"]=="category"){
                $value=$_POST["InputVal"];

                $db = \application\components\Db::getConnection();

                $select = $db->query("SELECT * FROM `category` WHERE `name` LIKE '%$value%' ORDER BY `id` DESC ;");
                $category=$select->fetchAll(\PDO::FETCH_ASSOC);

                echo json_encode($category,200);
                die();

            }

        }
    }

    public function actionPrtab(){
        if (!empty($_POST)){

            if ($_POST["tableName"]=="product"){
                $start=$_POST["start"];
                $start=($start-1)*5;
                $db = \application\components\Db::getConnection();
                $select = $db->query("SELECT `prod`.*, `cat`.`name` AS `cat_name`
                FROM `product` AS `prod`
                        LEFT JOIN `category` AS `cat`
                                ON `prod`.`category_id` = `cat`.`id` ORDER BY `id` DESC LIMIT 1000 OFFSET $start");
                $result=$select->fetchAll(\PDO::FETCH_ASSOC);

                echo json_encode($result,200);
                die();
            }

            if ($_POST["tableName"]=="category"){


                $start=$_POST["start"];
                $start=($start-1)*5;

                $db = \application\components\Db::getConnection();

                $select = $db->query("SELECT * FROM `category` ORDER BY `id` DESC LIMIT 1000 OFFSET $start ;");
                $category=$select->fetchAll(\PDO::FETCH_ASSOC);

                echo json_encode($category,200);
                die();

            }

        }

    }
}

//namespace application\controllers\admin;
//use application\base\AdminBaseController;
//use application\components\Auth;
//use application\components\Validator;
//use application\models\LoginForm;
//use application\models\Order;
//use application\models\SignupForm;
//use application\models\User;
//
//class DashboardController extends AdminBaseController
//{
//
//
//
////    public function actionIndex()
////    {
////        if ($this->actionLogin()=="true"){
////            Auth::goAdminPage();
////        }else{
////            Auth::goAdminPage();
////        }
//////        if (empty($_SESSION["adminId"])) {
//////            if ($_SESSION["isAdmin"]=='admin'){
//////                $this->view->render('site/index', []);
////////                $this->view->render('admin/dashboard/login', []);
//////            }else{
//////
//////            }
//////
//////        }else{
////////
//////        }
////
//////        if (!Auth::isAdmin('admin')) {
//////            $this->view->setTitle('home');
//////            $this->view->render('site/index', []);
//////        }
////
////        $this->view->setTitle('home');
////        $this->view->render('admin/dashboard/index', []);
////
////        return true;
////    }
////
////    public function actionLogin()
////    {
////        if (!empty($_POST) && isset($_POST["submit"])){
////
////        $emal=Validator::emailValid($_POST["email"]);
////        $pass=Validator::passValid($_POST["password"]);
////
//////        return $emal;
////
//////            echo "<pre>";
//////            var_dump($model);
//////            echo "</pre>";
////            if ($emal==true && $pass==true){
////                Auth::logout();
////                $hPass=User::hashPassword($_POST["password"]);
////                $email=Order::admin($_POST["email"]);
////                if ($email[0]["email"]==$_POST["email"]){
////                    if ($hPass==$email[0]["password"]){
////                        if ($email[0]["User_level"]=='admin'){
////                            Auth::isAdmin($email[0]["id"],$email[0]["User_level"]);
////                            Auth::goAdminPage();
////                            return "true";
////                        }else{
////                            return"false";
////                        }
////                    }else{
////                        return "false three";
////                    }
////                }else{
////                    return "false two";
////                }
////
////            }else{
////                //$this->view->render('admin/dashboard/login', []);
////                return "false one";
////            }
////        }else{
////            return "false ziro";
////        }
//////        $this->view->setTitle('home');
//////        $this->view->render('admin/dashboard/login', []);
//////
////
////    }
//}