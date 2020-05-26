<?php

namespace application\models;

use application\components\Db;

class Buy
{
    private $productId;
    private $categoryQuantityLength;
    private $true;
    private $buyProdCount;

    public function DbBuy($id)
    {

        $this->productId = $id;
        $db = Db::getConnection();

        $select = $db->query("SELECT * FROM `product` WHERE `id`='$id'");
        $category = $select->fetchAll(\PDO::FETCH_ASSOC);
        $this->categoryQuantityLength = $category[0]['quantity'];
    }

    public function DbMinusQuantity($val)
    {
        $this->buyProdCount = $val;
        $Length = $this->categoryQuantityLength;
        $newQLength = $Length - $val;
        $id = $this->productId;

        $db = Db::getConnection();

        $sql = "UPDATE `product` SET `quantity`='$newQLength' WHERE `id`='$id'";

        $stmt = $db->prepare($sql);

        $stmt->execute();

        $this->true = true;

    }

    public function CreateSession()
    {
        if (!empty($this->true && $this->true == true)) {
            $V = [];
            $id = $this->productId;
            $arrayV = '';
            //unset($_SESSION["by"]);
            if (!empty($_SESSION["userId"])) {
                if (!empty($_SESSION["by"])) {
                    $V = $_SESSION["by"];
                    foreach ($V as $k => $v) {
                        if ($k != $this->productId) {
                            $V = $_SESSION["by"];
                            $V[$this->productId] = $this->buyProdCount;
                            $_SESSION["by"] = $V;
                            return true;
                        } else {
                            $arrayV = $v;
                            $newZ = $this->buyProdCount + $arrayV;
                            $V[$k] = $newZ;
                            $_SESSION["by"] = $V;
                            return true;
                        }
                    }
                }
                if (empty($_SESSION["by"])) {
                    $_SESSION["by"] = [$this->productId => $this->buyProdCount];
                    return true;
                }
            }
            return true;
        }
        return false;
    }

    public static function Select($id){
        $db = Db::getConnection();

        $select = $db->query("SELECT * FROM `product` WHERE `id`='$id'");
        $result=$select->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
}