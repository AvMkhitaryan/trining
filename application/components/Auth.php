<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 04.04.2020
 * Time: 20:25
 */

namespace application\components;

use application\models\LoginForm;
use application\models\Order;
use application\models\User;
use application\models\AdminForm;
class Auth
{
    public static function isGuest()
    {
        if (empty($_SESSION['user'])) {
            return true;
        }

        return false;
    }

    public static function checkLogged()
    {
        if (!empty($_SESSION['user']['id']) && !empty($_SESSION['user']['role'])){
            return "true";
        }else{
            return 'false';

        }

    }

    public static function isAdmin()
    {
        if (!empty($_SESSION['user']['role'])){
            if ($_SESSION['user']['role']=="admin"){
                return true;
            }else{
                return false;
            }
        }
    }

    public static function setSession($id, $role)
    {
        $_SESSION['user']['id'] = $id;
        $_SESSION['user']['role'] = $role;
    }

    public static function setCookie($user_name,$cookie_key)
    {
        setcookie('user',$user_name,time()+(60*60),"/");
        setcookie('cook_key',$cookie_key,time()+(60*60),"/");

    }
//    public static function isAdminSetCookie($user_name,$cookie_key)
//    {
//        setcookie('admin',$user_name,time()+(60*60),"/");
//        setcookie('cook_key',$cookie_key,time()+(60*60),"/");
//
//    }

    public static function logout()
    {
        $user_name=$_COOKIE["user"];
        $cookie_key=$_COOKIE["cook_key"];

        Order::cookieInDib($user_name,"null");

        setcookie('user', $user_name, time() - 3600, '/');
        setcookie('cook_key', $cookie_key, time() - 3600, '/');

        session_unset();
        session_destroy();

        header("Location: /"); // redirect to home page
    }

    public static function goHome()
    {
        header("Location: /"); // redirect to home page
    }

    public static function goLoginPage()
    {
        header("Location: /user/login"); // redirect to login page
    }
    public static function goAdminPage()
    {
        header("Location: /admin");
    }

    public static function goAdminLogin()
    {
        header("Location: /admin/login");
    }

    public static function goCategoryPage()
    {
        header("Location: /admin/category");
    }


}