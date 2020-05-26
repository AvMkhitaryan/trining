<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 04.04.2020
 * Time: 20:32
 */

namespace application\models;

use application\components\Auth;
use application\components\Validator;

class LoginForm
{
    public $email;
    public $password;
    public $rememberMe;

    public function __construct($post)
    {
        $this->email = $post['email'];
        $this->password = $post['password'];
        if(!empty($post["checkbox"])){
            $this->rememberMe = $post['checkbox'];
        }

    }

    public function validate()
    {
        $email=Validator::emailValid($this->email);

        $pass=Validator::passValid($this->password);

        if (!empty($email)){
            if ($email==true){
                if ($pass==true){
                    $dbInfoUser=Order::infoInDb($this->email);
                    return $dbInfoUser;
                }else{
                    Auth::goLoginPage();
                    $_SESSION["LoginErrors"]="Invalid password";
                }
            }else{
                Auth::goLoginPage();
                $_SESSION["LoginErrors"]="Invalid Email";
            }
        }
    }


    public function HashPass()
    {
        $password = User::hashPassword($this->password);
        return $password;
    }


    public function comparisonUser(){
        $dbInfo=$this->validate();
        $hPass=$this->HashPass();

        if ($dbInfo[0]["password"]==$hPass){

            $_SESSION['userId'] = $dbInfo[0]["id"];
            $_SESSION['userRole'] = $dbInfo[0]["User_level"];

            return true;
        }else{
            Auth::goLoginPage();
            $_SESSION["LoginErrors"]="Sxal Password";
            return false;
        }
    }

    public function SessionAndCookie(){

       $compUser= $this->comparisonUser();
       $dbInfo=$this->validate();
       $cookie_vale=User::generateAuthKey();
       if ($compUser==true){
           if ($this->rememberMe=="on"){
               setcookie('user_id',$dbInfo[0]['id'],time()+(60*60),"/");
               setcookie('cook_key',$cookie_vale,time()+(60*60),"/");
           }
       }else{
           Auth::goLoginPage();
           $_SESSION["LoginErrors"]="error Info Db";
       }

    }





//    public function infoGod(){
//        if ($this->validateEmail()==true){
//            $dbvlues=$this->DbInfo();
//            $hPass=$this->HashPass();
//            if ($this->email==$dbvlues[0]["email"]){
//                if ($hPass==$dbvlues[0]["password"]){
//                    return true;
//                }else{
//                    return false;
//                }
//            }else{
//                return false;
//            }
//        }
//    }
//
//    public function login()
//    {
//        $infogod=$this->infoGod();
//        $val=$this->DbInfo();
//
//       if ($infogod==true) {
////            $user = $this->getUser();
//            Auth::setSession($val[0]["id"],$val[0]["User_level"]);
//            if($this->rememberMe=="on") {
//                Auth::setCookie($val[0]["first_name"], User::generateAuthKey());
//                Auth::goHome();
//            }
//           Auth::goHome();
//        }
//        return false;
//    }

//    public function getUser()
//    {
//        $user = User::findByEmail($this->email);
//        // before check passwords make hash password
//        $password = User::hashPassword($this->password);
//        if ($user['password'] == $password) {
//            return $user;
//        }
//        return false;
//    }
}