<div class="container">

    <div class="row" style="margin-top: 60px; margin-bottom: 60px;">

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
        <!-- /.col-lg-3 -->

        <div class="col-lg-10">

            <div id="demo" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../../../uploads/wallpers/Nike1.jpg" alt="Los Angeles" width="1100" height="500">
                    </div>
                    <div class="carousel-item">
                        <img src="../../../uploads/wallpers/nike2.jpg" alt="Chicago" width="1100" height="500">
                    </div>
                    <div class="carousel-item">
                        <img src="../../../uploads/wallpers/Nike2.png" alt="New York" width="1100" height="500">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>

        </div>
        <!-- /.col-lg-9 -->

    </div >
    <!-- /.row -->

</div>