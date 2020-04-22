<!-- Dashboard Main Header -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="../../../assets/js/jquery-3.5.0.min.js"></script>
    <title>Admin</title>
</head>
<body>
<header style="background-color: #979797;">
<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <a href="/admin" class="btn btn-light">Admin page</a>
            <a href="/" class="btn btn-light">home Page</a>
        </div>
        <div class="col-8">

        </div>
        <div class="col-2">
            <?php if (empty($_SESSION['user']['id'])){
                ?>
                <div>
                    <a href="/admin/login" class="btn btn-success">Login</a>
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
            }?>
            </div>
    </div>
</div>
</header>

<!-- Content -->
<?php include_once $this->basePath.$content.".php";

?>

<!-- Dashboard Main Footer -->
<footer style="background-color: #979797; margin-top:15px; padding: 15px 0 15px 0;">
    <div class="d-flex justify-content-center">
        <div style="text-align: center;">
            <h2><b>Welcome Your Admin Page</b></h2>
            <p>Test Version</p>
        </div>
    </div
</footer>
</body>
</html>