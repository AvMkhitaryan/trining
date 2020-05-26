<!-- Main Header -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../../../assets/js/jquery-3.5.0.min.js"></script>
    <link href="../../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../assets/css/shop-homepage.css" rel="stylesheet">
    <title><?= $this->getTitle(); ?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/"><i class="fa fa-shopping-bag" aria-hidden="true"></i>  SPORT SHOP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <div class="col-8">

            </div>
            <div class="col-4">
                <div class="row">
                    <?php if (empty($_SESSION['userId'])){
                        ?>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/user/login"><i class="fa fa-sign-in" aria-hidden="true"></i>LOGIN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/user/register"><i class="fa fa-external-link" aria-hidden="true"></i>REGISTRATION</a>
                            </li>
                        </ul>
                        <?php
                    }else{
                        ?>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="/site/basket" class="btn btn-outline-info"><i class="fa fa-shopping-cart" aria-hidden="true"> <?php if(!empty($_SESSION["by"])){echo count($_SESSION["by"]);} ?></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="/site/logout" class="btn btn-outline-danger">EXIT</a>
<!--                                <button class="btn btn-outline-danger" onclick="exit(true)" type="button">EXIT</button>-->
                            </li>

                        </ul>
                        <?php
                        echo "";
                    } ?>
                </div>
                <div>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/site/product">Product
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/site/about">About</a>
                        </li>
                        <?php if (!empty($_SESSION['userId'])){
                            echo "<li class='nav-item'>
                                <a class='nav-link' href='/site/settings/".$_SESSION['userId']."'>Settings</a>
                            </li>";
                        }?>

                        <li class="nav-item">
                            <a class="nav-link" href="/site/contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<header style="">
<!--    <div class="container-fluid">-->
<!---->
<!--    <div class="row">-->
<!--        <div class="col-2">-->
<!--    <a href="/" style="font-style: italic"><h2><b>Tamp For your Project</b></h2></a>-->
<!--        </div>-->
<!--        <div class="col-8">-->
<!---->
<!--        </div>-->
<!--        <div class="col-2">-->
<!--            --><?php //if (empty($_SESSION['userId'])){
//                ?>
<!--                <div class="row">-->
<!--                    <div style="margin: 15px">-->
<!--                        <a style="font-size: 15px" href="/user/login"><i class="fa fa-sign-in" aria-hidden="true"></i>LOGIN</a>-->
<!--                    </div>-->
<!--                    <div style="margin: 15px">-->
<!--                        <a style="font-size: 15px" href="/user/register"><i class="fa fa-external-link" aria-hidden="true"></i>REGISTRATION</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            --><?php
//            }else{
//                ?>
<!--                <div  style="margin: 15px">-->
<!--<!--                    <form action="" method="POST">-->
<!--<!--                    <input type="submit" name="exit" style="font-size: 15px" class="btn btn-danger" value="Exit">-->
<!--                    <button class="btn btn-danger" onclick="exit(true)" type="button">EXIT</button>-->
<!--<!--                    </form>-->
<!--                </div>-->
<!--            --><?php
//                echo "";
//            } ?>
<!---->
<!---->
<!--        </div>-->
<!--    </div>-->
<!--    </div>-->
</header>


<!-- Content -->
<?php include_once $this->basePath.$content.".php";

?>
<!-- Main Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
</footer>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
    // function exit(arg) {
    //     let del = confirm("Exit?");
    //     if (del === true) {
    //         $.ajax({
    //             url:window.location.origin + '/admin/dashboard/logout',
    //             type: 'POST',
    //             dataType: 'json',
    //             data: {exit: arg},
    //             success: function (data) {
    //                 if (data){
    //                     console.log(data);
    //                     //window.location="/";
    //                 }
    //             }
    //         })
    //     }
    // }

</script>