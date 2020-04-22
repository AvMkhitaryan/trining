<?php
/**
 * Created by PhpStorm.
 * User: Av
 * Date: 22.04.2020
 * Time: 19:37
 */

namespace application\models;

use application\components\Auth;
use application\components\Validator;

class AdminForm
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
    public function validate(){
        $email=Validator::emailValid($this->email);

        $pass=Validator::passValid($this->password);

        if ($email==true && $pass==true){
            return Order::admin($this->email);
        }else{
            $_SESSION["AdminLoginFormEroors"]="invalid information, sxal lokin kam parol";
        }
    }

    public function HashPass()
    {
        $password = User::hashPassword($this->password);
        return $password;
    }

    public function isTrueUser(){
        $dbInfo=$this->validate();
        if (!empty($dbInfo)){
            if ($dbInfo[0]["password"]==$this->HashPass()){
                return true;
            }else{
                $_SESSION["AdminLoginFormEroors"]="password is notife";
            }
        }else{
            $_SESSION["AdminLoginFormEroors"]="not in db information";
        }
    }
    public function InfoInDb(){
        $dbInfo=$this->validate();
        if (!empty($dbInfo)){
            if ($this->isTrueUser()==true){
                if ($dbInfo[0]["User_level"]=='admin'){

                    $_SESSION['user']['id']=$dbInfo[0]["id"];
                    $_SESSION['user']['role']=$dbInfo[0]["User_level"];

                    return true;

                }else{
                    $_SESSION["AdminLoginFormEroors"]="Sorry your Accounte Is Not Admin";
                }
            }
        }else{
            $_SESSION["AdminLoginFormEroors"]="not in db information";
        }

    }
    public static function isAdmin(){
        if (self::InfoInDb()==true){
            return true;
        }
    }

//    public function CreteAdminSession(){
//
//        if ($this->InfoInDb()==true){
//            $dbInfo=$this->validate();
////            Auth::isAdmin($dbInfo[0]["id"],$dbInfo[0]["User_level"]);
//
//        }
//    }

//    public function CreteCookeInAdmin(){
//        if ($this->InfoInDb()==true){
//
//        }
//    }





}