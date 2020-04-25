<?php
use application\models\Product;
$name=Product::CreteDbSelect();
//if (!empty($_POST)){
//    echo "<pre>";
//    var_dump($_POST);
//    echo "</pre>";
//}
$v=Product::updateProductPrint($_POST["id"]);

//echo "<pre>";
//    var_dump($v);
//    echo "</pre>";

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-4">

        </div>
        <div class="col-4">
            <h3>Product Pudate</h3>
            <form action="" method="POST">
                <label for="category">Category
                    <select name="category" id="category">
                        <option>----</option>
                        <?php
                        foreach ($name as $value) {
                            ?>
                            <option <?php if($value["id"]==$v[0]["category_id"]){echo 'selected="selected"';} ?> value="<?= $value["id"]; ?>"><?= $value["name"]; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </label>
                <br>
                <label for="NewProduct">NAME
                    <input type="text" id="NewProduct" name="NewProduct" value="<?= $v[0]["name"]; ?>">
                </label>
                <br>
                <label for="new">New Production ?
                    <select name="new" id="new">
                        <option value="NEW" selected="selected">New</option>
                        <option value="notNew">Not New</option>
                    </select>
                </label>
                <br>
                <label for="text">Desc Info
                    <input type="text" id="text" name="text" value="<?= $v[0]["desc_info"]; ?>">
                </label>
                <br>
                <label for="price">Price
                    <input type="text" id="price" name="price" value="<?= $v[0]["price"]; ?>">
                </label>
                <br>
                <input type="submit" name="UpButton" value="Create" class="btn btn-success">
                <a href="/admin/product" class="btn btn-success">GO back</a>
            </form>
        </div>
        <div class="col-4">

        </div>
    </div>
</div>
