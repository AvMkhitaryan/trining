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
use application\components\Upload;

class ProductController extends AdminBaseController
{
    public function actionIndex()
    {
        if (!Auth::checkLogged()) {

            $_SESSION["AdminLoginPage"] = "Please Login";
            Auth::redirect("/admin/login");
        }
        if (!Auth::isAdmin()) {
            $_SESSION["AdminLoginPage"] = "Sorry Your User Levels is not Admin";
            Auth::redirect("/admin/login");
        }
        $dat=Product::Sel();
        $this->view->setTitle('home');
        $this->view->render('admin/product/index', [$dat]);

        return true;
    }

    public function actionCreate()
    {
        if (!Auth::checkLogged()) {
            $_SESSION["AdminLoginPage"] = "Please Login";
            Auth::redirect("/admin/login");
        }
        if (!Auth::isAdmin()) {
            $_SESSION["AdminLoginPage"] = "Sorry Your User Levels is not Admin";
            Auth::redirect("/admin/login");
        }

        if (!empty($_POST) && !empty($_POST["CrButton"])) {

            Product::Create($_POST["NewProduct"], $_POST["category"], $_POST["new"], $_POST["text"], $_FILES["image"]["name"], $_POST["price"], $_POST["quantity"]);

            if (!empty($_FILES) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
                Upload::Insert("uploads", $_FILES);
                Auth::redirect("/admin/product");
            }
            Auth::redirect("/admin/product");
        }
        $dat=Product::Select();
        $this->view->setTitle('Create');
        $this->view->render('admin/product/create', [$dat]);
        return true;
    }

    public function actionUpdate($id)
    {
        if (!Auth::checkLogged()) {
            $_SESSION["AdminLoginPage"] = "Please Login";
            Auth::redirect("/admin/login");
        }
        if (!Auth::isAdmin()) {
            $_SESSION["AdminLoginPage"] = "Sorry Your User Levels is not Admin";
            Auth::redirect("/admin/login");
        }

        $oldVal=Product::Select();
        $chekitSelect = Product::updateProductPrint($id);
        $this->view->setTitle('Update');
        $this->view->render('admin/product/update', ['id' => $id,$oldVal,$chekitSelect]);

        if (!empty($_POST) && !empty($_POST["UpButton"])) {
            Product::Update($_POST["NewProduct"], $_POST["category"], $_POST["new"], $_POST["text"], $_POST["img_path"], $_POST["price"], $_POST["id"], $_POST["Quantity"]);
            if (!empty($_FILES) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
                Upload::Insert("uploads", $_FILES);
                Auth::redirect("/admin/product");
            }
            Auth::redirect("/admin/product");
        }
        return true;
    }

    public function actionDelete()
    {

        $DelId = $_POST["DeleteId"];

        Product::DeleteInProduct($DelId);

        echo json_encode(1, 200);

        die;

    }

}