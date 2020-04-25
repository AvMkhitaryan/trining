<?php
/**
 * Created by PhpStorm.
 * User: Av
 * Date: 22.04.2020
 * Time: 21:24
 */

namespace application\controllers\admin;

use application\base\AdminBaseController;
use application\components\Auth;
use application\components\Db;
use application\models\Product;

class ProductController extends AdminBaseController
{
    public function actionIndex(){
        $this->view->setTitle('home');
        $this->view->render('admin/product/index', []);

        return true;
    }

    public function actionCreate(){

        $this->view->setTitle('home');
        $this->view->render('admin/product/create',[]);

        if (!empty($_POST)&& !empty($_POST["CrButton"])){
            Product::CategoryInDb($_POST["NewProduct"],$_POST["category"],$_POST["new"],$_POST["text"],$_POST["price"]);
        }

    }

    public function actionUpdate($id){

        $_POST["id"]=$id;
        $this->view->render('admin/product/update', ['id' => $id]);

        if (!empty($_POST)&& !empty($_POST["UpButton"])){
            Product::UpdateInsertProduct($_POST["NewProduct"],$_POST["category"],$_POST["new"],$_POST["text"],$_POST["price"],$_POST["id"]);
            Auth::goProductPage();
        }
    }

    public function actionDelete(){

        $DelId=$_POST["DeleteId"];
        Product::DeleteInProduct($DelId);
        echo json_encode(1);

    }

}