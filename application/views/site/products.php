<?php
use application\components\Pagination;

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

                    if (!empty($data[1])){
                        $pro=$data[1];
                    }
                    if (!empty($pro)){
                        foreach ($pro as $value){?>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100" style="background-color: #dddddd; margin-top: 2px;margin-bottom: 2px;">
                                    <a href="/site/view/<?= $value["id"]; ?>"><img style="height: 200px; width: 100%;" class="" src="../../../uploads/<?=$value["img_path"]; ?>" alt="LOGO"></a>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="/site/view/<?= $value["id"]; ?>" class="btn btn-outline-secondary"><?= $value["name"]; ?></a>
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
    </div>
</main>
