<?php
//echo "<pre>";
//var_dump($data);
//echo "</pre>";
//?>

<main style="margin-top: 60px;margin-bottom: 60px">
    <div class="container">
        <div class="d-flex justify-content-center">
        <div class="col-3">
            
        </div>
         <div class="col-9">
             <div class="d-flex">
                 <div>
                     <img style="width: 250px;" src="../../../uploads/<?=$data[0][0]["img_path"]; ?>" alt="Logo">
                 </div>
                 <div style="margin-left: 25px;">
                     <p style="margin:0;">Products Name</p>
                    <h4><?=$data[0][0]["name"]; ?></h4>
                 </div>
                 <div style="margin-left: 25px;">
                     <p style="margin:0;">Price</p>
                    <h4><?=$data[0][0]["price"]; ?>$</h4>
                 </div>
                 <br>
                 <?php if ($data[0][0]["is_new"]=="NEW"){?>
                     <div style="margin-left: 25px;">
                         <h3 style="margin:0; color: red;">NEW</h3>
                     </div>
                 <?php } ?>
                 <div style="margin-top: 15px;margin-left: 15px;">
                     <a href="/site/buy/<?= $data[0][0]["id"]; ?>" class="btn btn-outline-success">Buy ?</a>
                 </div>
             </div>

             <?php if ($data[0][0]["quantity"]!==null){?>
                 <h3>in Denmark <?=$data[0][0]["quantity"]  ?> items are eaten from this product</h3>
             <?php }else{?>
                <h3>sorry product all sold out</h3>
            <?php }?>



                 <div style="border: 1px solid silver;padding: 15px;border-radius: 5px;margin-right: 25px;" class="font-italic">
                     <h4>Iformation for this Products</h4>

                     <?=$data[0][0]["desc_info"]; ?>
                 </div>
        </div>
        </div>
    </div>
</main>
<?php
//var_dump($data[0][0]["img_path"]); ?>