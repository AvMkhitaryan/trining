<?php
/**
 * Created by PhpStorm.
 * User: Av
 * Date: 24.04.2020
 * Time: 16:32
 */

namespace application\models;
use application\models\Order;
use application\components\Db;

class Product
{
    public static function Select()
    {
        $db = Db::getConnection();

        $select = $db->query("SELECT * FROM `category` ");
        $result = $select->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public static function Create($name,$category,$new,$text,$imgPath,$price,$quantity){

        $db = \application\components\Db::getConnection();

        $sql = "INSERT INTO `product` (`name`,`category_id`,`is_new`,`desc_info`,`img_path`,`price`,`quantity`, `create_time`,`update_time`)
                              VALUES ('$name','$category','$new','$text','$imgPath','$price','$quantity', now(),now())";
        $stmt = $db->prepare($sql);
        $stmt->execute();

    }

    public static function updateProductPrint($id){
        $db = \application\components\Db::getConnection();

        $select = $db->query("SELECT * FROM `product` WHERE id='$id'");
        $result = $select->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public static function Update($name,$category,$new,$text,$imgPath,$price,$id,$quantity){

        $db = \application\components\Db::getConnection();

        $sql = "UPDATE `product` SET name='$name', category_id='$category',is_new='$new',desc_info='$text',img_path='$imgPath',price='$price',quantity='$quantity', update_time= now() WHERE id='$id'";

        $stmt = $db->prepare($sql);

        $stmt->execute();

    }

    public static function DeleteInProduct($id){

        $db = \application\components\Db::getConnection();
        $sql = $db->prepare("DELETE FROM `product` WHERE `id`='$id'");
        $sql->execute();
    }
    public static function Sel()
    {
        $db = Db::getConnection();

        $select = $db->query("SELECT `prod`.*, `cat`.`name` AS `cat_name`
                FROM `product` AS `prod`
                        LEFT JOIN `category` AS `cat`
                                ON `prod`.`category_id` = `cat`.`id` ORDER BY `id`");
        $result = $select->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
}