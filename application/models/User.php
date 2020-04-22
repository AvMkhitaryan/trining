<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 04.04.2020
 * Time: 20:28
 */

namespace application\models;

use application\components\Db;

class User
{
    public static function findByEmail($email)
    {
        $user = ""; // get user by email
        if($user) {
            return $user;
        }
        return false;
    }

    public static function forgotPassword($password)
    {
        // this method for later
    }

    public static function hashPassword($password)
    {
        return md5($password); // for example
    }

    public static function findById($id)
    {
        $user = ""; // get user by id
        if($user) {
            return $user;
        }
        return false;
    }

    public static function generateAuthKey()
    {
        $cook_value="";
        for ($i = 0; $i <= 15; $i++) {
            if ($i % 2 === 0) {
                $cook_value .= chr(rand(97, 122));
            } else {
                $cook_value .= mt_rand(0, 100);
            }
        }
        return $cook_value;
    }
}