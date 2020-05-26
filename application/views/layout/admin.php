<!-- Dashboard Main Header -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../../../assets/js/jquery-3.5.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <title>Admin</title>
</head>
<body>
<header style="background-color: #979797;">
    <!--<div class="container-fluid">-->
    <!--    <div class="row">-->
    <!--        <div class="col-2">-->
    <!--            <a href="/admin" class="btn btn-light">Admin page</a>-->
    <!--            <a href="/" class="btn btn-light">home Page</a>-->
    <!--        </div>-->
    <!--        <div class="col-8">-->
    <!---->
    <!--        </div>-->
    <!--        <div class="col-2">-->
    <!--            --><?php //if (empty($_SESSION['userId'])){
    //                ?>
    <!--                <div>-->
    <!--                    <a href="/admin/login" class="btn btn-success">Login</a>-->
    <!--                </div>-->
    <!--                --><?php
    //            }else{
    //                ?>
    <!--                <div  style="margin: 15px">-->
    <!--                        <button class="btn btn-danger" onclick="exit(true)" type="button">EXIT</button>-->
    <!--                </div>-->
    <!--                --><?php
    //                echo "";
    //            } ?>
    <!---->
    <!--            </div>-->
    <!--    </div>-->
    <!--</div>-->

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Home</a>
        <a class="navbar-brand" href="/admin">Admin</a>
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

        </form>
        <!-- Navbar-->
        <?php if (empty($_SESSION['userId'])) {
            ?>
            <div>
                <a href="/admin/login" class="btn btn-success">Login</a>
            </div>
            <?php
        } else {
            ?>
            <div class="d-flex" style="margin: 15px">
                <!--                <a href="#" class="btn btn-outline-secondary" ><i class="fa fa-envelope-o" aria-hidden="true"></i></a>-->
                <a href="/site/logout" class="btn btn-outline-danger">EXIT</a>
                <!--                <button class="btn btn-outline-danger" onclick="exit(true)" type="button">EXIT</button>-->
            </div>
            <?php
            echo "";
        } ?>
    </nav>
</header>

<!-- Content -->
<?php include_once $this->basePath . $content . ".php";

?>

<!-- Dashboard Main Footer -->
<footer class="bg-dark" style=" margin-top:15px; padding: 15px 0 15px 0;">
    <div class="d-flex justify-content-center">
        <div style="text-align: center;">
            <h2><b>Welcome Your Admin Page</b></h2>
            <p>Test Version</p>
        </div>
    </div
</footer>
</body>
</html>
<script>
    // function exit(arg) {
    //     let del = confirm("Exit?");
    //     if (del === true) {
    //     $.ajax({
    //         url:window.location.origin + '/admin/dashboard/logout',
    //         type: 'POST',
    //         dataType: 'json',
    //         data: {exit: arg},
    //         success: function (data) {
    //
    //             console.log(data);
    //         }
    //     })
    // }
    // }

</script>