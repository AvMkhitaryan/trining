<?php

//$id=$_SESSION["updateID"];
//
//$val=\application\models\Order::tableUpdate($id);
//
//unset($_SESSION["updateID"]);
//if (!empty($data)){
//    echo "<pre>";
//    var_dump($data[0][0]["name"]);
//    echo "</pre>";
//}
?>
<div class="container">
    <div class="row">
        <div class="col-3">

        </div>
        <div class="col-6">
            <div class="d-flex justify-content-center" style="margin-top: 80px;margin-bottom: 80px">
                <form action="" method="post">
                    <input type="text" name="edit" value="<?=$data[0][0]["name"]; ?>">
                    <input type="submit" name="submit" value="Edit" class="btn btn-success">
                    <a href="/admin/category" class="btn btn-success">go Back</a>
                </form>
            </div>
        </div>

        <div class="col-3">

        </div>
    </div>
</div>
<?php

?>