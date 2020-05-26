<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 04.04.2020
 * Time: 20:33
 */

namespace application\models;
use application\components\Db;
use application\components\Validator;

class ContactForm
{
    private $name;
    private $email;
    private $phone;
    private $message;

    public function __construct($post)
    {

        $this->name=$post["name"];
        $this->email=$post["email"];
        $this->phone=$post["phone"];
        $this->message=$post["message"];

    }

    public function validate(){
       $name= Validator::ForLname($this->name);
       $email=Validator::emailValid($this->email);

       if ($name!=true){
           return false;
       }

       if ($email!=true){
           return false;
       }

       return true;
    }

    public function insert(){
        if ($this->validate()==true){

            $db = Db::getConnection();

            $sql = "INSERT INTO `contact` (`name`, `email`,`phone`,`text`)
              VALUES ('$this->name','$this->email','$this->phone','$this->message')";

            $stmt = $db->prepare($sql);
            $stmt->execute();

            return true;
        }
        return false;
    }
}