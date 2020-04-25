<?php
use application\models\Product;
$name=Product::CreteDbSelect();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-4">

        </div>
        <div class="col-4">
            <div>
                <form action="" method="POST">
                <label for="category">Category
                    <select name="category" id="category">
                        <option selected="selected">----</option>
                        <?php
                        foreach ($name as $value) {
                            ?>
                            <option value="<?= $value["id"]; ?>"><?= $value["name"]; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </label>
                    <br>
                <label for="NewProduct">NAME
                    <input type="text" id="NewProduct" name="NewProduct">
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
                        <textarea class="form-control" id="text" rows="3" name="text"></textarea>
                    </label>
                    <br>
                    <label for="price">Price
                        <input type="text" id="price" name="price">
                    </label>
                    <br>
                    <input type="submit" name="CrButton" value="Create" class="btn btn-success">
                    <a href="/admin/product" class="btn btn-success">GO back</a>
                </form>
            </div>
        </div>
        <div class="col-4">
<?php //$V=Product::insertInDb($_POST["category"],$_POST["category"],$_POST["category"]);
//echo "<pre>";
//    var_dump($_POST);
//    echo "</pre>";
//?>
        </div>
    </div>
</div>

