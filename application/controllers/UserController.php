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
//            echo "<pre>";
//            var_dump($model->insert());
//            echo "</pre>";

            if ($model->insert()==true){
                Auth::goLoginPage();
            }

//            $validate = $model->validate();
//            if (!empty($validate)) {
//                $this->view->render('user/register',$validate);
//            }
//            if ($model->register()) {
//                Auth::goLoginPage();
//            }
        }
        $this->view->render('user/register',[]);

        return true;
    }

    public function actionLogin()
    {
        if (!empty($_POST) && isset($_POST['submit'])){
                $model = new LoginForm($_POST);

            if ($model->comparisonUser()==true){
//                  $this->view->render('user/login',[]);
                Auth::goHome();
            }else{
                $this->view->render('user/login',[]);
            }
//            if (!empty($val['error'])) {
//                $this->view->render('user/login',$val['error']);
//            }
//            $this->view->render('user/login',[]);
//            Auth::goHome();
//            if ($model->login()) {
//                Auth::goHome();
//            }
        }
        $this->view->render('user/login',[]);

        return true;
    }
}