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
use application\models\Category;


class CategoryController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function actionIndex()
    {
        if (!Auth::checkLogged()){
            $_SESSION["AdminLoginPage"]="Please Login";
            Auth::redirect("/admin/login");
        }
        if (!Auth::isAdmin()){
            $_SESSION["AdminLoginPage"]="Sorry Your User Levels is not Admin";
            Auth::redirect("/admin/login");
        }

        $this->view->setTitle('home');
        $this->view->render('admin/category/index', []);

        return true;
    }

    public function actionView($id)
    {
        if (!Auth::checkLogged()){
            $_SESSION["AdminLoginPage"]="Please Login";
            Auth::redirect("/admin/login");
        }
        if (!Auth::isAdmin()){
            $_SESSION["AdminLoginPage"]="Sorry Your User Levels is not Admin";
            Auth::redirect("/admin/login");
        }
        $this->view->setTitle('home');
        $this->view->render('admin/category/view', ['id' => $id]);

        return true;
    }

    public function actionCreate()
    {
        if (!Auth::checkLogged()){
            $_SESSION["AdminLoginPage"]="Please Login";
            Auth::redirect("/admin/login");
        }
        if (!Auth::isAdmin()){
            $_SESSION["AdminLoginPage"]="Sorry Your User Levels is not Admin";
            Auth::redirect("/admin/login");
        }


        if (!empty($_POST)&& $_POST["click"]){

            Category::Create($_POST["name"]);
            Auth::redirect("/admin/category");
        }

        $this->view->setTitle('home');
        $this->view->render('admin/category/create',[]);

        return true;
    }

    public function actionUpdate($id)
    {
        if (!Auth::checkLogged()){
            $_SESSION["AdminLoginPage"]="Please Login";
            Auth::redirect("/admin/login");
        }
        if (!Auth::isAdmin()){
            $_SESSION["AdminLoginPage"]="Sorry Your User Levels is not Admin";
            Auth::redirect("/admin/login");
        }

        if (!empty($_POST) && !empty($_POST["submit"])){
            Category::Update($_POST["edit"],$id);
            Auth::redirect("/admin/category");
        }
        $val=Category::Select($id);

        $this->view->setTitle('home');
        $this->view->render('admin/category/update', ['id' => $id,$val]);

        return true;
    }

    public function actionDelete()
    {

        $DelId=$_POST["DeleteId"];

        Category::Delete($DelId);

        echo json_encode(1,200);

        die;

    }
}