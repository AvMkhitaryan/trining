<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 04.04.2020
 * Time: 20:23
 */

namespace application\components;

class Db
{
    public static function getConnection()
    {
        $paramsPath = __DIR__.'/../config/db_params.php';
        $params = include ($paramsPath);

        $dsn = "mysql:host={$params['host']}; dbname={$params['dbname']}";
        $db = new \PDO($dsn, $params['user'], $params['password']);
        $db->exec("set name utf8");

//        $contact = "CREATE TABLE IF NOT EXISTS `contact`(
//    id INT(11) AUTO_INCREMENT PRIMARY KEY,
//    name VARCHAR(255),
//    email VARCHAR(255),
//    phone VARCHAR(255),
//    text TEXT
//    )";
        //$db->exec($contact);

//        $categories = "CREATE TABLE IF NOT EXISTS `category`(
//    id INT(11) AUTO_INCREMENT PRIMARY KEY,
//    name VARCHAR(255),
//    create_time DATETIME,
//    update_time TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP
//    )";
//
//        $db->exec($categories);


//        $product = "CREATE TABLE IF NOT EXISTS `product`(
//          id INT(11) AUTO_INCREMENT PRIMARY KEY,
//           name VARCHAR(255),
//            category_id INT(11),
//            is_new VARCHAR(255),
//            desc_info VARCHAR(255),
//            img_path VARCHAR(255),
//            price INT(11),
//            quantity VARCHAR(255),
//            create_time DATETIME,
//            update_time TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP
//)";
//        $db->exec($product);
//
//        $product_foreign_key_two = "ALTER TABLE product ADD FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE CASCADE ON UPDATE CASCADE";
//        $db->exec($product_foreign_key_two);

        return $db;
    }
}