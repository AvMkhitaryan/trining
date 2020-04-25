<?php
/**
 * Created by PhpStorm.
 * User: Av
 * Date: 15.04.2020
 * Time: 21:42
 */

namespace application\models;


class Order
{
    public static function insert($fname,$lname,$email,$password){

        $db = \application\components\Db::getConnection();

        $sql = "INSERT INTO `users` (`first_name`, `last_name`,`email`,`password`,`cookie_key`,`User_level`)
              VALUES ('$fname','$lname','$email','$password','null','user')";

        $stmt = $db->prepare($sql);
        $stmt->execute();

//        $sql = "INSERT INTO `users` (`first_name`, `last_name`,`email`,`password`,`cookie_key`,`User_level`)
//              VALUES ('$fname','$lname','$email','$password','null','user')";
//        $stmt = $db->prepare($sql);
//        $stmt->execute();

//        $db=\application\components\Db::getConnection();
//
//        $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`,`password`,`cook_key`,`User_level`)
//    VALUES ('$fname', '$lname', '$email','$password','null','user')";
//
//        $db->exec($sql);

//        $qry = $db->prepare(" INSERT INTO `users` (`first-name`,`last-name`,`email`, `password`, `generateAuthKey`,`User_level`)
//        VALUES ('$fname','$lname','$email','$password', 'null','user')");
//        $qry->execute();
//        var_dump($qry);die;

    }

    public static function infoInDb($mail)
    {
        $db = \application\components\Db::getConnection();

        $select = $db->query("SELECT * FROM `users` WHERE `email`='$mail'");
        $result=$select->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public static function table($tabelName,$start_from,$limit){
        $db = \application\components\Db::getConnection();

        $select = $db->query("SELECT * FROM $tabelName ORDER BY `id` DESC LIMIT `$start_from` , `$limit` ;");
        $category=$select->fetchAll(\PDO::FETCH_ASSOC);
        return $category;
    }

    public static function tableUpdate($id){

        $db = \application\components\Db::getConnection();

        $select = $db->query("SELECT * FROM `category` WHERE `id`='$id'");
        $category=$select->fetchAll(\PDO::FETCH_ASSOC);
        return $category;
    }

    public static function tableUpdateInsert($name,$id){
        $db = \application\components\Db::getConnection();

        $sql = "UPDATE `category` SET `name`='$name' WHERE `id`='$id'";

        $stmt = $db->prepare($sql);

        $stmt->execute();
    }
    public static function tableCreateCategory($newName){
        $db = \application\components\Db::getConnection();

        $sql = "INSERT INTO `category` (`name`, `create_time`,`update_time`)VALUES ('$newName', now(),now())";
        $stmt = $db->prepare($sql);
        $stmt->execute();
    }

    public static function cookieInDib($id,$cookieNumber){
        $db = \application\components\Db::getConnection();

        $sql = "UPDATE `users` SET `cookie_key`='$cookieNumber' WHERE `id`='$id'";

        $stmt = $db->prepare($sql);

        $stmt->execute();
    }

    public static function admin($mail)
    {
        $db = \application\components\Db::getConnection();

        $select = $db->query("SELECT * FROM `users` WHERE `email`='$mail'");
        $result=$select->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public static function deleteCate($id){

        $db = \application\components\Db::getConnection();

        $sql = $db->prepare("DELETE FROM `category` WHERE `id`='$id'");
        $sql->execute();

    }

    public static function DbCount($TableName){
        $db = \application\components\Db::getConnection();

        $nRows = $db->query("select count(*) from `$TableName`")->fetchColumn();

        return $nRows;

    }


}