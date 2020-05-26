<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 04.04.2020
 * Time: 20:28
 */

namespace application\controllers;

use application\base\BaseController;
use application\components\Auth;
use application\components\Valid\Validator;
use application\models\LoginForm;
use application\models\SignupForm;

class UserController extends BaseController
{
    public function actionRegister()
    {
        if (!empty($_POST) && isset($_POST['click'])) {
            $model = new SignupForm($_POST);

            if ($model->insert()==true){
                $_SESSION["regisTrue"]="Thanks for your registration";
                Auth::redirect("/user/login");
            }
        }
        $this->view->render('user/register',[]);

        return true;
    }

    public function actionLogin()
    {
        if (!empty($_POST) && isset($_POST['submit'])){
                $model = new LoginForm($_POST);
            if ($model->comparisonUser()==true){
                Auth::redirect("/");
            }

        }
        $this->view->render('user/login',[]);

        return true;
    }
}