<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 11.04.2020
 * Time: 19:38
 */echo "admin category udpate <br>";
 echo "<pre>";
var_dump($_POST["id"]);

$id=$_SESSION["updateID"];

$val=\application\models\Order::tableUpdate($id);

unset($_SESSION["updateID"]);
?>
<div class="container">
    <div class="row">
        <div class="d-flex justify-content-center">
        <form action="" method="post">
            <input type="text" name="edit" value="<?=$val[0]["name"]; ?>">
            <input type="submit" name="submit" value="Edit" class="btn btn-success">
            <a href="/admin/category" class="btn btn-success">go Back</a>
        </form>
        </div>
    </div>
</div>
<?php

?>