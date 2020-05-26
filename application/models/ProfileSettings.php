<?php
/**
 * Created by PhpStorm.
 * User: Av
 * Date: 29.04.2020
 * Time: 19:59
 */

namespace application\models;
use application\components\Validator;
use application\components\Db;

class ProfileSettings
{
    private $id;
    private $fName;
    private $lName;
    private $email;

    public function value($post){

        $this->id=$post["id"];
        $this->fName=$post["fname"];
        $this->lName=$post["lname"];
        $this->email=$post["email"];
    }

    public function Validation(){
        $fName= Validator::ForLname($this->fName);
        $lName= Validator::ForLname($this->lName);
        $email=Validator::emailValid($this->email);

        if ($fName!=true){
            return false;
        }
        if ($lName!=true){
            return false;
        }
        if ($email!=true){
            return false;
        }

        return true;
    }

    public function insert(){
        if ($this->Validation()==true){

            $db = Db::getConnection();

            $sql = "UPDATE `users` SET `first_name`='$this->fName',`last_name`='$this->lName', `email`='$this->email' WHERE `id`='$this->id'";

            $stmt = $db->prepare($sql);

            $stmt->execute();

            return true;
        }
return false;
    }
}