<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 11.04.2020
 * Time: 19:48
 */

namespace application\models;

use application\components\Db;

class Category
{
    public static function Delete($id){

        $db = Db::getConnection();
        $sql = $db->prepare("DELETE FROM `category` WHERE `id`='$id'");
        $sql->execute();
    }

    public static function Select($id){

        $db = Db::getConnection();

        $select = $db->query("SELECT * FROM `category` WHERE `id`='$id'");
        $category=$select->fetchAll(\PDO::FETCH_ASSOC);
        return $category;
    }
    public static function Update($name,$id){

        $db = Db::getConnection();

        $sql = "UPDATE `category` SET `name`='$name' WHERE `id`='$id'";

        $stmt = $db->prepare($sql);

        $stmt->execute();
    }

    public static function Create($newName){
        $db = Db::getConnection();

        $sql = "INSERT INTO `category` (`name`, `create_time`,`update_time`)VALUES ('$newName', now(),now())";
        $stmt = $db->prepare($sql);
        $stmt->execute();
    }

}

