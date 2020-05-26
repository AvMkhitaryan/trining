<?php
use application\components\Pagination;
use application\components\Db;

if (!empty($_GET["page"])){
    $page=$_GET["page"];
}else{
    $page=1;
    $_GET["page"]=1;
}

$start=($page-1)*9;
$db = Db::getConnection();

$pr = $db->query("SELECT `prod`.*, `cat`.`name` AS `cat_name`
                FROM `product` AS `prod`
                        LEFT JOIN `category` AS `cat`
                                ON `prod`.`category_id` = `cat`.`id`  ORDER BY `id` DESC LIMIT $start, 9  ");
$production=$pr->fetchAll(\PDO::FETCH_ASSOC);
$pro=$production;
?>
<main style="margin-top: 60px;margin-bottom: 60px">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
            <?php if (!empty($data)){
                $arr=$data[0];
            } ?>
            <div class="list-group">
                <?php if (!empty($arr)){
                    foreach ($arr as $v){
                        echo  ' <a href="/site/products/'.$v["id"].'" class="btn btn-outline-secondary">'.$v["name"].'</a>';
                    }
                } ?>
            </div>

        </div>

        <div class="col-lg-10">
            <div class="row">
        <?php
            if (!empty($pro)){
                foreach ($pro as $value){?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100" style="background-color: #dddddd; margin-top: 2px;margin-bottom: 2px;">
                            <a href="/site/view/<?= $value["id"]; ?>"><img style="height: 200px; width: 100%;" class="" src="../../../uploads/<?=$value["img_path"] ?>" alt="LOGO"></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <div>
                                        <p><?= $value["cat_name"] ?></p>
                                    </div>
                                    <a href="/site/view/<?= $value["id"]; ?>" class="btn btn-outline-secondary"><?= $value["name"] ?></a>
                                </h4>
                                <div class="d-flex">
                                    <a href="/site/buy/<?= $value["id"]; ?>" class="btn btn-outline-success">Buy ?</a>
                                    <h5 style="margin-left: 15px;margin-top: 6px;"><?= $value["price"] ?>$</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        ?>
            </div>
        </div>
        </div>
        <?php
        $p=new Pagination('product',"/site/product/",9);

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
</main>


