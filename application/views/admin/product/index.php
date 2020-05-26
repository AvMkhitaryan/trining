<?php

use application\components\Pagination;
use application\components\Db;
use application\models\Order;
use application\controllers\admin\DashboardController;

//if (empty($_GET["page"])){
//    $_GET["page"]=1;
//}
?>

<main>
<!--    --><?php //$v = new \application\controllers\admin\ProductController();
//    $db = \application\components\Db::getConnection();
//    $nRows = $db->query('select count(*) from `product`')->fetchColumn();
//    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-1">
                <h4>PRODUCT</h4>
                <div>
                    <a href="/admin/category" class="btn btn-success">Category</a>
                </div>
                <div>
                    <a id="product" href="/admin/product" class="btn btn-success">Product</a>
                </div>
            </div>
            <div class="col-11" style="overflow: auto;">
                <!--                --><?php
                //
                //                if (!empty($_GET["page"])){
                //                    $page=$_GET["page"];
                //                }else{
                //                    $page=1;
                //                }
                //                $start=($page-1)*5;
                //
                //
                //                $db = \application\components\Db::getConnection();
                //                $select = $db->query("SELECT `prod`.*, `cat`.`name` AS `cat_name`
                //                FROM `product` AS `prod`
                //                        LEFT JOIN `category` AS `cat`
                //                                ON `prod`.`category_id` = `cat`.`id` ORDER BY `id` DESC LIMIT $start, 5  ");
                //                $result=$select->fetchAll(PDO::FETCH_ASSOC);
                //                ?>
                <table  id="dtBasicExample" class="table table-dark" width="100%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>IsNew</th>
                        <th>Img</th>
                        <th>Info</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Create Time</th>
                        <th>Update Time</th>
                        <th><a href="/admin/product/create" class="btn btn-success btn-sm">Create</a></th>
                    </tr>
                    </thead>
                    <tbody id="tBody">
                    <?php foreach ($data[0] as $k => $v) {?>
                        <tr style="background-color: #343a40" id="Del{<?= $v['id']; ?>}">
                            <td><?= $v['id']; ?></td>
                            <td><?= $v['name']; ?></td>
                            <td><?= $v['cat_name']; ?></td>
                            <td><?= $v['is_new']; ?></td>
                            <td><?= $v['img_path']; ?></td>
                            <td><?= $v['desc_info']; ?></td>
                            <td><?= $v['price']; ?></td>
                            <td><?= $v['quantity']; ?></td>
                            <td><?= $v['create_time']; ?></td>
                            <td><?= $v['update_time']; ?></td>
                            <td><a href="/admin/product/update/<?= $v['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="delProd(<?= $v['id']; ?>)">Delete</button></td>
                        </tr>
                   <?php } ?>
                    </tbody>
                </table>
                <!--                <table class="table table-dark">-->
                <!--                    <thead>-->
                <!--                    <tr>-->
                <!--                        <th scope="col">ID</th>-->
                <!--                        <th scope="col">Name</th>-->
                <!--                        <th scope="col">Category</th>-->
                <!--                        <th scope="col">NEW?</th>-->
                <!--                        <th scope="col">Image</th>-->
                <!--                        <th scope="col">Information</th>-->
                <!--                        <th scope="col">Price</th>-->
                <!--                        <th scope="col">Quantity</th>-->
                <!--                        <th scope="col">Create Time</th>-->
                <!--                        <th scope="col">Update Time</th>-->
                <!--                        <th scope="col"><a href="/admin/product/create" class="btn btn-success">Create</a>-->
                <!--                            <input id="liveSearch" type="text" name="search" placeholder="Search For Name" datatype="product"></th>-->
                <!--                    </tr>-->
                <!--                    </thead>-->
                <!--                    <tbody id="tBody" data-id="--><? //= $nRows ?><!--">-->
                <!---->
                <!--                    </tbody>-->
                <!--                </table>-->
                <!--                <div id="noneDiv" onclick="fun(1)"></div>-->
                <!--                <div id="pageCount" class="d-flex justify-content-center"></div>-->
                <!--                <div id="pag" class="d-flex justify-content-center">-->
                <!--                    <div id="leftbig">-->
                <!---->
                <!--                    </div>-->
                <!--                    <div id="leftOne">-->
                <!---->
                <!--                    </div>-->
                <!--                    <div id="buttons">-->
                <!---->
                <!--                    </div>-->
                <!--                    <div id="rigtheOne">-->
                <!---->
                <!--                    </div>-->
                <!--                    <div id="rigtheBig">-->
                <!---->
                <!--                    </div>-->
                <!--                </div>-->
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable();
    });

    function delProd(arg) {
        let del = confirm("Delete?");
        if (del === true) {
            $.ajax({
                url: window.location.origin + '/admin/product/delete',
                type: 'POST',
                dataType: 'json',
                data: {DeleteId: arg},
                success: function (data) {
                    console.log(data);
                    if (data == 1) {

                    }
                }
            })
        }
    };
    // $("#noneDiv").click();

    // function fun(arg) {
    //
    //     let table = $("#liveSearch").attr("datatype");
    //     let dataLength = $("#tBody").attr("data-id");
    //
    //     let pageumber = arg;
    //     let leftOneClick = "";
    //     let rigthOneClick = "";
    //     let ForStar = "";
    //     let ForEnd = "";
    //
    //     $.ajax({
    //         url: window.location.origin + '/admin/dashboard/prtab',
    //         type: 'POST',
    //         dataType: 'json',
    //         data: {start: arg, tableName: table},
    //         success: function (data) {
    //             console.log(data);
    //             let DLceil = Math.ceil(dataLength / 5);
    //
    //             if (pageumber === 1) {
    //                 leftOneClick = 1
    //             } else {
    //                 leftOneClick = pageumber - 1
    //             }
    //
    //             if (pageumber === DLceil) {
    //                 rigthOneClick = DLceil;
    //             } else {
    //                 rigthOneClick = pageumber + 1;
    //             }
    //
    //             // $("#tBody").children().remove();
    //             // $("#pageCount").children().remove();
    //             // $("#leftbig").children().remove();
    //             // $("#leftOne").children().remove();
    //             // $("#rigtheOne").children().remove();
    //             // $("#rigtheBig").children().remove();
    //             // console.log(data);
    //             data.forEach((i, k) => {
    //                 if (k < 5) {
    //                     $("tBody").append(`
    //                          <tr id="Del${i.id}">
    //                             <td>${i.id}</td>
    //                             <td>${i.name}</td>
    //                             <td>${i.cat_name}</td>
    //                             <td>${i.is_new}</td>
    //                             <td>${i.img_path}</td>
    //                             <td>${i.desc_info}</td>
    //                             <td>${i.price}</td>
    //                             <td>${i.quantity}</td>
    //                             <td>${i.create_time}</td>
    //                             <td>${i.update_time}</td>
    //                             <td>
    //                                 <a href="/admin/product/update/${i.id}" class="btn btn-success">Edit</a>
    //                                 <button type="submit" class="btn btn-danger" onclick="delProd(${i.id})">Delete</button>
    //                             </td>
    //                         </tr>`)
    //                 }
    //             });
    //             if (dataLength > 5) {
    //
    //                 $("#pageCount").append(`
    //                     <h4>Page ${pageumber} OF ${DLceil}</h4>
    //                     `);
    //
    //                 $("#leftbig").children().remove();
    //                 $("#leftbig").append(` <a onclick="fun(1)" class='btn btn-outline-dark'><i class="fa fa-backward" aria-hidden="true"></i></a> `);
    //
    //
    //                 $("#leftOne").children().remove();
    //                 $("#leftOne").append(`<a onclick="fun(${leftOneClick})" class='btn btn-outline-dark'><i class="fa fa-caret-left" aria-hidden="true"></i></a>`);
    //
    //                 $("#buttons").children().remove();
    //
    //                 if (pageumber === 1) {
    //                     ForStar = 1;
    //                     if (DLceil < 3) {
    //                         ForEnd = ForStar + 1;
    //                     } else {
    //                         ForEnd = ForStar + 2;
    //
    //                     }
    //                 }
    //
    //                 if (pageumber > 1) {
    //                     ForStar = pageumber - 1;
    //                     if (DLceil <= 3) {
    //                         ForEnd = ForStar + 2;
    //                     } else {
    //                         ForEnd = ForStar + 1;
    //                     }
    //                 }
    //
    //                 if (pageumber > 2 && pageumber === DLceil) {
    //                     ForStar = pageumber - 2;
    //                     ForEnd = ForStar + 2;
    //
    //                 }
    //
    //                 for (i = ForStar; i <= ForEnd; i++) {
    //                     $("#buttons").append(`<a onclick="fun(${i})" class='btn btn-outline-dark'>${i}</a>`);
    //                 }
    //
    //
    //                 $("#rigtheOne").children().remove();
    //                 $("#rigtheOne").append(`<a onclick="fun(${rigthOneClick})" class='btn btn-outline-dark'><i class="fa fa-caret-right" aria-hidden="true"></i></a>`);
    //
    //                 $("#rigtheBig").children().remove();
    //                 $("#rigtheBig").append(`<a onclick="fun(${DLceil})" class='btn btn-outline-dark'><i class="fa fa-forward" aria-hidden="true"></i></a>`)
    //
    //             }
    //         }
    //     })
    // }

    //     $("#liveSearch").keyup(function() {
    //         let val= $("#liveSearch").val();
    //         let table=$("#liveSearch").attr("datatype");
    //
    //         $.ajax({
    //             url:window.location.origin + '/admin/dashboard/search',
    //             type: 'POST',
    //             dataType: 'json',
    //             data: {TableName:table,InputVal:val},
    //             success: function (data) {
    //
    //                 $("#tBody").children().remove();
    //                 $("#buttons").children().remove();
    //                 $("#pageCount").children().remove();
    //                 $("#leftbig").children().remove();
    //                 $("#leftOne").children().remove();
    //                 $("#rigtheOne").children().remove();
    //                 $("#rigtheBig").children().remove();
    //                 console.log(data[0].quantity);
    //                 data.forEach((i,k)=>{
    //                     if(k<5){
    //                         $("#tBody").append(`
    //                          <tr id="Del${i.id}">
    //                             <td>${i.id}</td>
    //                             <td>${i.name}</td>
    //                             <td>${i.cat_name}</td>
    //                             <td>${i.is_new}</td>
    //                             <td>${i.desc_info}</td>
    //                             <td>${i.price}</td>
    //                             <td>${i.Quantity}</td>
    //                             <td>${i.create_time}</td>
    //                             <td>${i.update_time}</td>
    //                             <td><a href="/admin/product/update/${i.id}" class="btn btn-success">Edit</a>
    //                                 <button  type="submit" class="btn btn-danger" onclick="delProd(${i.id})">Delete</button>
    //                             </td>
    //                         </tr>
    //
    //                         `)
    //                     }
    //
    //                 })
    //             }
    //
    //         })
    //
    //
    // //        $.ajax({
    // //            url:window.location.origin + '/admin/dashboard/search',
    // //            type: 'POST',
    // //            dataType: 'json',
    // //            data: {TableName:table,InputVal:val},
    // //            success: function (data) {
    // //                $("#tBody").children().remove();
    // //
    // //                if (data.length>5 && data.length !==0){
    // //
    // //                    $("#pag").children().remove();
    // //                    let pag=Math.ceil(data.length/5);
    // //                    console.log(pag);
    // ////                    $("#pag").append(`<button class="btn btn-outline-dark" onclick=""><i class="fa fa-backward" aria-hidden="true"></i></button>`);
    // ////                    $("#pag").append(`<button class="btn btn-outline-dark" onclick=""><i class="fa fa-caret-left" aria-hidden="true"></i></button>`);
    // ////                    $("#pag").append(`<div style="">pag</div>`);
    // ////
    // ////                    $("#pag").append(`<button class="class='btn btn-outline-dark" onclick=""><i class="fa fa-caret-right" aria-hidden="true"></i></button>`);
    // ////                    $("#pag").append(`<button class="class='btn btn-outline-dark" onclick=""><i class="fa fa-forward" aria-hidden="true"></i></button>`);
    // ////                    $("#pag").append(`<div class="d-flex justify-content-center"><h4>Page # of ${pag}</h4></div>`);
    // //
    // //                    console.log(pag);
    // //                }else {
    // //                    $("#pag").children().remove();
    // //                    console.log(data.length)
    // //                }
    // //                data.forEach((i)=>{
    // //                    $("tBody").append(`
    // //                         <tr id="Del${i.id}">
    // //                            <td>${i.id}</td>
    // //                            <td>${i.name}</td>
    // //                            <td>${i.cat_name}</td>
    // //                            <td>${i.is_new}</td>
    // //                            <td>${i.desc_info}</td>
    // //                            <td>${i.price}</td>
    // //                            <td>${i.create_time}</td>
    // //                            <td>${i.update_time}</td>
    // //                            <td><a href="/admin/product/update/${i.id}" class="btn btn-success">Edit</a>
    // //                                <button  type="submit" class="btn btn-danger" onclick="delProd(${i.id})">Delete</button>
    // //                            </td>
    // //                        </tr>
    // //
    // //                        `)
    // //                })
    // //            }
    // //        })
    //
    //     })

</script>