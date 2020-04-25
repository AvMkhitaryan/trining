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
    public static function CreteDbSelect()
    {
        $db = \application\components\Db::getConnection();

        $select = $db->query("SELECT * FROM `category` ");
        $result = $select->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public static function CategoryInDb($name,$category,$new,$text,$price){

        $db = \application\components\Db::getConnection();

        $sql = "INSERT INTO `product` (name,category_id,is_new ,desc_info, price, create_time,update_time)
                               VALUES ('$name','$category','$new','$text','$price', now(),now())";
        $db->exec($sql);

    }

    public static function updateProductPrint($id){
        $db = \application\components\Db::getConnection();

        $select = $db->query("SELECT * FROM `product` WHERE id='$id'");
        $result = $select->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public static function UpdateInsertProduct($name,$category,$new,$text,$price,$id){

        $db = \application\components\Db::getConnection();

        $sql = "UPDATE `product` SET name='$name', category_id='$category',is_new='$new',desc_info='$text',price='$price', update_time= now() WHERE id='$id'";

        $stmt = $db->prepare($sql);

        $stmt->execute();

    }

    public static function DeleteInProduct($id){

        $db = \application\components\Db::getConnection();
        $sql = $db->prepare("DELETE FROM `product` WHERE `id`='$id'");
        $sql->execute();
    }
}