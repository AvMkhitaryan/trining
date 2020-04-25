<?php
include_once "delete.php";

use application\components\Pagination;

use application\models\Order;

if (empty($_GET["page"])){
   $_GET["page"]=1;
}
?>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <h4>CATEGORY</h4>
                <div>
                <a href="/admin/category" class="btn btn-success">Category</a>
                </div>
                <div>
                <a href="/admin/product" class="btn btn-success">Product</a>
                </div>
            </div>
            <div class="col-9">
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Time ONE </th>
                        <th scope="col">Time Two</th>
                        <th scope="col"><a href="/admin/category/create" class="btn btn-success">Create</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    if (!empty($_GET["page"])){
                        $page=$_GET["page"];
                    }else{
                        $page=1;
                    }
                    $start=($page-1)*5;

                    $db = \application\components\Db::getConnection();

                    $select = $db->query("SELECT * FROM `category` ORDER BY `id` DESC LIMIT $start, 5 ;");
                    $category=$select->fetchAll(\PDO::FETCH_ASSOC);

                    foreach ($category as $v){
                        ?>
                        <tr>
                          <th scope="row"><?php echo $v["id"]; ?></th>
                           <td><?php echo $v["name"]; ?></td>
                           <td><?php echo $v["create_time"]; ?></td>
                           <td><?php echo $v["update_time"]; ?></td>
                            <td><a href="/admin/category/update/<?= $v["id"];?>" class="btn btn-success">Edit</a></td>
                            <td><button type="submit" class="btn btn-danger" onclick="deleteInfoTableColom(<?= $v["id"] ?>)">Delete</button></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>

                    <?php
                    $p=new Pagination('category',"/admin/category/");

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
<script>
    function deleteInfoTableColom(deletID) {
        let del = confirm("Delete?");
        if (del === true) {

            $.ajax({
                url: 'category/delete.php',
                type: 'POST',
                dataType: 'json',
                data: {a: deletID},
                success: function (data) {
                    console.log(data);
//                    if (data===true) {
//                        console.log(data);
//                    }
//                    window.location = "index.php";
                }
            })
        }
    }


</script>

