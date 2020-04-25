<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 11.04.2020
 * Time: 19:21
 */

namespace application\controllers\admin;

use application\base\AdminBaseController;
use application\components\Auth;
use application\components\Message;
use application\models\Order;


class CategoryController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function actionIndex()
    {
        $this->view->setTitle('home');
        $this->view->render('admin/category/index', []);

        return true;
    }

    public function actionView($id)
    {
        $this->view->setTitle('home');
        $this->view->render('admin/category/view', ['id' => $id]);

        return true;
    }

    public function actionCreate()
    {
        $this->view->setTitle('home');
        $this->view->render('admin/category/create',[]);

        if (!empty($_POST)&& $_POST["click"]){
            Order::tableCreateCategory($_POST["name"]);
            Auth::goCategoryPage();
        }

        return true;
    }

    public function actionUpdate($id)
    {

        $val=\application\models\Order::tableUpdate($id);

        $_SESSION["updateID"]=$id;
        $_POST["id"]=$id;
        $this->view->setTitle('home');
        $this->view->render('admin/category/update', ['id' => $id]);
        if (!empty($_POST) && !empty($_POST["submit"])){
            Order::tableUpdateInsert($_POST["edit"],$id);
            Auth::goCategoryPage();
        }

        return true;
    }

    public function actionDelete($id)
    {

//        $db = \application\components\Db::getConnection();
//
//        $sql = $db->prepare("DELETE FROM `category` WHERE `id`='$id'");
//        $sql->execute();
//
//        $this->view->setTitle('home');
//        header("Location: /admin/category");
//
//        return true;
    }
}