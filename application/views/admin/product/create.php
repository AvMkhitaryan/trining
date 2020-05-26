<?php
use application\models\Product;
//$name=Product::CreteDbSelect();

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-4">

        </div>
        <div class="col-4">
            <div>
                <form action="" method="POST" enctype='multipart/form-data'>
                <label for="category">Category
                    <select name="category" id="category">
                        <option selected="selected">----</option>
                        <?php
                        foreach ($data[0] as $value) {
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
                    <label for="image">Image
                        <input type="file" id="image" name="image">
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
                    <label for="quantity">Quantity
                        <input type="text" id="quantity" name="quantity">
                    </label>
                    <br>
                    <input type="submit" name="CrButton" value="Create" class="btn btn-success">
                    <a href="/admin/product" class="btn btn-success">GO back</a>
                </form>
            </div>
        </div>
        <div class="col-4">
<?php
if (!empty($_FILES)){
    $_POST["img_name"]=$_FILES["image"]["name"];
}
?>
        </div>
    </div>
</div>

