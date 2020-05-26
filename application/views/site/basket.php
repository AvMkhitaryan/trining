<?php use application\models\Buy;


echo "<pre>";
$v = [];
$a = $data[0];


echo "</pre>";
?>
<main style="margin-top: 60px;margin-bottom: 60px">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <div style="width: auto;height: 200px; background-color: silver">
                    <div class="d-flex justify-content-center">
                        <h4 style="font-style: italic;margin-top: 70px;">GOOGLE <br> REKLAM</h4>
                    </div>
                </div>
            </div>
            <div class="col-10">
                <?php if (!empty($_SESSION["by"])) { ?>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Prod</th>
                            <th scope="col">Count</th>
                            <th scope="col">Price or One</th>
                            <th scope="col">Old</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($a as $key => $value) {
                            $v = Buy::Select($key);
                            ?>
                            <tr>
                                <td><a href="/site/view/<?= $v[0]["id"]; ?>"><img
                                                src="../../../uploads/<?= $v[0]["img_path"] ?>" alt="logo"
                                                style="width: 100px"></a></td>
                                <td><h4><?= $value ?></h4></td>
                                <td><h4><?= $v[0]["price"]; ?>$</h4></td>
                                <td><h4><?= $v[0]["price"] * $value ?>$</h4></td>
                                <td><a href="/site/baskdel/<?= $key ?>" type="submit" class="btn btn-outline-danger"><i
                                                class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                <?php } ?>
                <?php if (empty($_SESSION["by"])) { ?>
                    <div class="d-flex justify-content-center">
                        <h3 style="margin-top: 15px;" class="text-center">You have not made a purchase, let's go to the
                            <a href="/site/product">Product</a> section and buy you something</h3>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>

