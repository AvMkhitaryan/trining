<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 11.04.2020
 * Time: 18:14
 */

namespace application\components;


class Validator
{
//    public $rules = [];
//
//    public function __construct($rules)
//    {
//        $this->rules = $rules;
//    }
//
//    public function validate()
//    {
//        $rules = $this->rules;
////        return $rules['required'];
//        if (!empty($rules)) {
//            $data = [];
//
//            if (isset($rules['required'])) {
//                $required = $rules['required'];
//                foreach ($required as $key=>$value){
////                    echo $key." <br>";
////                    echo $value." <br>";
////                    if ($value == '') {
////                        $data[$key] = str_replace('_', ' ', $key) . ' ' . 'is required';
////                    }
//                }
//                if (!empty($data)) {
//                    return $data;
//                }
//            }
//
//            if (isset($rules['name'])) {
//                $name = $rules['name'];
//                foreach ($name as $key=>$value) {
//                    if (!preg_match('', $value)) {
//                        $data[$key] = str_replace('_', ' ', $value).'message';
//                    }
//                }
//                if (!empty($data)) {
//                    return $data;
//                }
//
//                foreach ($name as $key=>$value) {
//                    if (strlen($value) <2 || strlen($value) > 100) {
//                        $data[$key] = str_replace('_', ' ', $value).'message';
//                    }
//                }
//                if (!empty($data)) {
//                    return $data;
//                }
//            }
//
//            if (isset($rules['email'])) {
//                $email = $rules['email'];
//                foreach ($email as $key=>$value) {
//                    if (!preg_match('', $value)) {
//                        $data[$key] = str_replace('_', ' ', $value).'message';
//                    }
//                }
//                if (!empty($data)) {
//                    return $data;
//                }
//            }
//
//            if (isset($rules['password'])) {
//                $password = $rules['password'];
//                foreach ($password as $key=>$value) {
//                    if (strlen($value) <8 || strlen($value) > 20) {
//                        $data[$key] = str_replace('_', ' ', $value).'message';
//                    }
//                }
//                if (!empty($data)) {
//                    return $data;
//                }
//            }
//        }
//        return [];
//    }

public static function ForLname($n){
        if (trim(strlen($n)>3 || strlen($n)<30)){
            return true;
        }else{
            return false;
        }

}

public static function emailValid($email){
    if (!empty($email)){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }else{
            return true;
        }
    }
}

public static function passValid($pass){
    if (!empty($pass)){
        if (trim(strlen($pass)>3 || strlen($pass)<20)){
            return true;
        }else{
            return false;
        }
    }
}
}