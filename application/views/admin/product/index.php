<?php

use application\components\Pagination;
use application\components\Db;
use application\models\Order;

if (empty($_GET["page"])){
    $_GET["page"]=1;
}
?>

<main>
    <?php $v=new \application\controllers\admin\ProductController();?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <h4>PRODUCT</h4>
                <div>
                    <a href="/admin/category" class="btn btn-success">Category</a>
                </div>
                <div>
                    <a href="/admin/product" class="btn btn-success">Product</a>
                </div>
            </div>
            <div class="col-9">
                <?php

                if (!empty($_GET["page"])){
                    $page=$_GET["page"];
                }else{
                    $page=1;
                }
                $start=($page-1)*5;


                $db = \application\components\Db::getConnection();
                $select = $db->query("SELECT `prod`.*, `cat`.`name` AS `cat_name`
                FROM `product` AS `prod`
                        LEFT JOIN `category` AS `cat`
                                ON `prod`.`category_id` = `cat`.`id` ORDER BY `id` DESC LIMIT $start, 5  ");
                $result=$select->fetchAll(PDO::FETCH_ASSOC);
                ?>


                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">NEW?</th>
                        <th scope="col">Information</th>
                        <th scope="col">Price</th>
                        <th scope="col">Create Time</th>
                        <th scope="col">Update Time</th>
                        <th scope="col"><a href="/admin/product/create" class="btn btn-success">Create</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($result as $v=>$k):?>
                        <tr id="Del<?= $k["id"];?>">
                            <td><?= $k["id"];?></td>
                            <td><?= $k["name"];?></td>
                            <td><?= $k["cat_name"];?></td>
                            <td><?= $k["is_new"];?></td>
                            <td><?= $k["desc_info"];?></td>
                            <td><?= $k["price"];?></td>
                            <td><?= $k["create_time"];?></td>
                            <td><?= $k["update_time"];?></td>
                            <td>
                                <a href="/admin/product/update/<?= $k["id"];?>" class="btn btn-success">Edit</a>
                                <button  type="submit" class="btn btn-danger" onclick="delProd(<?= $k["id"];?>)">Delete</button>
                            </td>
                        </tr>

                    <?php endforeach ; ?>
                    </tbody>
                </table>
                <?php
                $p=new Pagination('product',"/admin/product/");

                if ($p->PaginationTrue()==true) {
                    ?>
                    <div class="d-flex justify-content-center">
                        <?php
                        echo $p->BigPrev();
                        echo $p->OnePrev();
                        $p->ThreeButtonsPage();
                        echo $p->OneNext();
                        echo $p->BigNext();
                        ?>
                    </div>
                    <?php $p->PagCount();}?>
            </div>
        </div>
    </div>
</main>
<?php

?>

<script>
    function delProd(arg) {
        let del = confirm("Delete?");

        let d=$('#Del'+arg);
        let Delet=d[0]["id"];
        $('#'+Delet).remove();
        if (del === true) {
            $.ajax({
                url:window.location.origin + '/admin/product/delete',
                type: 'POST',
                dataType: 'json',
                data: {DeleteId: arg},
                success: function (data) {
                    console.log(data);
                }
            })
        }
    }
</script>