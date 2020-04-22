<?php

$db = \application\components\Db::getConnection();
$delID = $_POST["a"];
if (isset($delID)){
    echo "true";
}

$sql = $db->prepare("DELETE FROM `category` WHERE `id`='$delID'");
$sql->execute();