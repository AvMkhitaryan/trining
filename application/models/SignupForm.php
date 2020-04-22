<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 04.04.2020
 * Time: 20:32
 */

namespace application\models;

use application\components\Auth;
use application\components\Db;
use application\components\Validator;

class SignupForm
{
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $confirm_password;

    public function __construct($post)
    {
        $this->first_name=$post["firstName"];
        $this->last_name=$post["lastName"];
        $this->email=$post["email"];
        $this->password=$post["password"];
        $this->confirm_password=$post["confPass"];
    }

//    public function rules()
//    {
//        return [
//            'required' => [
//                'first_name' => $this->first_name,
//                'last_name' => $this->last_name,
//                'email' => $this->email,
//                'password' => $this->password,
//                'confirm_password' => $this->confirm_password,
//            ],
//            'name' => [
//                'first_name' => $this->first_name,
//                'last_name' => $this->last_name,
//            ],
//            'email' => [
//                'email' => $this->email,
//            ],
//            'password' => [
//                'password' => $this->password,
//                'confirm_password' => $this->confirm_password,
//            ]
//        ];
//    }
//
//    public function validate()
//    {
//        $validator = new Validator($this->rules());
//        if (!empty($validator->validate())) {
//            return $validator->validate();
//        }
//        if ($this->password != $this->confirm_password) {
//            return ['password' => 'message'];
//        }
//        return [];
//    }
    public function twoPass(){
        if ($this->password=$this->confirm_password){
            return true;
        }else{
            $_SESSION["regErrors"]="two Password is notifay";
            Auth::goLoginPage();
        }
    }

    public function fName(){
        $fName=Validator::ForLname($this->first_name);
        return $fName;
    }

    public function lName(){
        $lName=Validator::ForLname($this->last_name);
        return $lName;
    }

    public function email(){
        $email=Validator::emailValid($this->email);
        return $email;
    }

    public function pass(){
        $pass=Validator::passValid($this->password);
        return $pass;
    }


    public function HashPass()
    {
        $password = User::hashPassword($this->password);
        return $password;
    }

    public function ValInfo(){
        if ($this->fName()==true){
            if ($this->lName()==true){
                if ($this->email()==true){
                    if ($this->pass()==true){
                        return "true";
                    }else{
                        $_SESSION["regErrors"]="pass Errors";
                        Auth::goLoginPage();
                    }
                }else{
                    $_SESSION["regErrors"]="Email name Errors";
                    Auth::goLoginPage();
                }
            }else{
                $_SESSION["regErrors"]="Last name Errors";
                Auth::goLoginPage();
            }
        }else{
            $_SESSION["regErrors"]="First name Errors";
            Auth::goLoginPage();
        }
    }


    public function insert(){
        if ($this->ValInfo()==true){
             Order::insert($this->first_name,$this->last_name,$this->email, $this->HashPass());
            return true;
        }
    }

}