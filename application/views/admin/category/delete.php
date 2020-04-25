<?php
use application\models\Order;
use application\components\Auth;

$delID="";
if (!empty($_POST["a"])){
    $delID=$_POST["a"];
}
if (!empty($delID)){
    Order::deleteCate($delID);
    Auth::goCategoryPage();
}
