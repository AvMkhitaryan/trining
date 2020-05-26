<?php

use application\models\Product;
$name=$data[0];
$v=$data[1];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-4">

        </div>
        <div class="col-4">
            <h3>Product Update</h3>
            <form action="" method="POST" enctype='multipart/form-data'>
                <label for="category">Category
                    <select name="category" id="category">
                        <?php
                        foreach ($name as $value) {
                            ?>
                            <option  <?php if ($value["id"] == $data[1][0]["category_id"]) {
                                echo 'selected="selected"';
                            } ?> value="<?= $value["id"]; ?>"><?= $value["name"]; ?></option>
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
                <label for="img">
                    <input type="file" name="image" value="<?= $v[0]["img_path"]; ?>">
                </label>
                <br>
                <h6>If You have new photo,<br> uploads photo,<br>   and this photo is delete</h6>
                <div class="col-xl-3" style="display: block">
                    <div class="container">
                        <img src="../../../uploads/<?= $v[0]["img_path"]; ?>" alt="Avatar" class="image" style="width:200px">
                    </div>
                </div>
                <label for="text">Desc Info<br>
                    <textarea type="text" id="text" name="text"><?= $v[0]["desc_info"]; ?></textarea>
                </label>
                <br>
                <label for="price">Price
                    <input type="text" id="price" name="price" value="<?= $v[0]["price"]; ?>">
                </label>
                <br>
                <label for="Quantity">Quantity
                    <input type="text" id="Quantity" name="Quantity" value="<?= $v[0]["quantity"]; ?>">
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
<?php
if (!empty($_POST) && !empty($_POST["UpButton"]))
    if (!empty($_FILES["image"]["name"])) {
        $_POST["img_path"] = $_FILES["image"]["name"];
    } else {
        $_POST["img_path"] = $img;
    }
?>
