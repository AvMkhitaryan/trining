<?php

session_start();

spl_autoload_register(function ($className){
    $fileName = str_replace("\\", "/", $className).".php";
    require_once $fileName;
});
//
//if(!empty($_SESSION['id'])){
//    echo $_SESSION['id'];
//}else{
//    echo "Sess id empty";
//}
//echo "<br>";
//if(!empty($_SESSION['role'])){
//    echo $_SESSION['role'];
//}else{
//    echo "Sess role empty";
//}
//echo "<br>";
//if(!empty($_COOKIE["cook_key"])){
//    echo $_COOKIE["cook_key"];
//}else{
//    echo "Cook key empty";
//}
//echo "<br>";
//if(!empty($_COOKIE["user"])){
//    echo $_COOKIE["user"];
//}else{
//    echo "Cook USer empty";
//}
//echo "<br>";

//if (!empty($_SESSION['user']['id'])){
//    echo $_SESSION['user']['id'];
//}else{
//    echo "adminID false <br>";
//}
//echo "<br>";
//if (!empty($_SESSION['user']['role'])){
//    echo $_SESSION['user']['role'];
//}else{
//    echo "isAdmin false";
//}
//echo "<br>";
$router = new application\components\Router();
$router->run();



