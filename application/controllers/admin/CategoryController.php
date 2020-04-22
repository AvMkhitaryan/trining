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

        return true;
    }

    public function actionUpdate($id)
    {

        $val=\application\models\Order::tableUpdate($id);

        $this->view->setTitle('home');
        $this->view->render('admin/category/update', ['id' => $id]);
        if (!empty($_POST) && !empty($_POST["submit"])){
            echo "<pre>";
            var_dump($_POST);
            echo "</pre>";
        }

        return true;
    }

    public function actionDelete($id)
    {
        $this->view->setTitle('home');
        header("Location: /admin/category");

        return true;
    }
}