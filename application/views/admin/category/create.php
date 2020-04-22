<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 11.04.2020
 * Time: 19:38
 */

?>
<div class="container">
    <div class="row">
        <div class="d-flex justify-content-center">
            <form action="" method="post">
                <label for="name">insert Category
                <input type="text" id="name" name="name">
                </label>
                <input type="submit" name="click" class="btn btn-success" value="Create">

            </form>
        </div>
    </div>
</div>
<?php
if (!empty($_POST["click"])&& !empty($_POST["name"])){
    \application\models\Order::tableCreateCategory($_POST["name"]);
    \application\components\Auth::goCategoryPage();
}

?>