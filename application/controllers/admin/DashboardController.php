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

use application\models\AdminForm;
use application\models\LoginForm;

class DashboardController extends AdminBaseController
{
    public function actionIndex()
    {
        if (Auth::checkLogged()=="true") {
            $this->view->render('admin/dashboard/index', []);

        }else{
            header("Location: /admin/login");
        }
//        if (Auth::isAdmin()==true) {
//            header("Location: /admin");
//        }else{
//            header("Location: /admin/login");
//        }
        $this->view->setTitle('home');
        $this->view->render('admin/dashboard/index', []);

        return true;
    }

    public function actionLogin()
    {
        if (!empty($_POST)&& !empty($_POST["submit"])){
            $info=new AdminForm($_POST);
//            echo "<pre>";
//            var_dump($info->CreteAdminSession());
//            echo "</pre>";
            if ($info->InfoInDb()==true){
                Auth::goAdminPage();

            }else{
                echo "false";
            }
        }

        $this->view->setTitle('home');
        $this->view->render('admin/dashboard/login', []);

        return true;
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