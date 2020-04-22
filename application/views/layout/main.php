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
    <title>Document</title>
</head>
<body>
<header style="background-color:silver">
    <div class="container-fluid">

    <div class="row">
        <div class="col-2">
    <a href="/" style="font-style: italic"><h2><b>Tamp For your Project</b></h2></a>
        </div>
        <div class="col-8">

        </div>
        <div class="col-2">
            <?php if (empty($_SESSION["id"])){
                ?>
                <div class="row">
                    <div style="margin: 15px">
                        <a style="font-size: 15px" href="/user/login"><i class="fa fa-sign-in" aria-hidden="true"></i>LOGIN</a>
                    </div>
                    <div style="margin: 15px">
                        <a style="font-size: 15px" href="/user/register"><i class="fa fa-external-link" aria-hidden="true"></i>REGISTRATION</a>
                    </div>
                </div>
            <?php
            }else{
                ?>
                <div  style="margin: 15px">
                    <form action="" method="POST">
                    <input type="submit" name="exit" style="font-size: 15px" class="btn btn-danger" value="Exit">
                    </form>
                </div>
            <?php
                echo "";
            } ?>

            <?php if (!empty($_POST["exit"])){
                \application\components\Auth::logout();
            } ?>

        </div>
    </div>
    </div>
</header>


<!-- Content -->
<?php include_once $this->basePath.$content.".php";

?>
<!-- Main Footer -->
<footer style="background-color: #82838c">
    <div class="d-flex justify-content-center">
<h2 style="margin-top: 25px"><b>2020</b></h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4" style="padding: 15px;">
                <a href="#" style="color: #000;">Contach</a>
            </div>
            <div class="col-4" style="padding: 15px;">
                <a href="#" style="color: #000;">Info</a>
            </div>
            <div class="col-4" style="padding: 15px;">
                <a href="#" style="color: #000;">More Information</a>
            </div>
        </div>
    </div>
</footer>
</body>
</html>