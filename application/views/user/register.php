<!-- Register Page Content-->
<?php //if (!empty($data) && isset($data['first_name'])) : ?>
<!--    <div>--><?//= $data['first_name'] ?><!--</div>-->
<?php //endif; ?>
<!--<input type="text">-->
<!---->
<?php //echo "Registretion";?>

<div class="d-flex justify-content-center" style="margin-top: 80px">
    <h3>Registration Page</h3>
</div>

<div class="d-flex justify-content-center">
    <form action="" method="Post">
        <label for="firstName">
            First Name<br>
            <input type="text" name="firstName" id="firstName" placeholder="First Name">
        </label>
        <br>
        <label for="lastName">
            Last Name<br>
            <input type="text" name="lastName" id="lastName" placeholder="Last Name">
        </label>
        <br>
        <label for="email">
            Email<br>
            <input type="email" name="email" id="email" placeholder="Email">
        </label>
        <br>
        <label for="password">
            Password<br>
            <input type="password" name="password" id="password" placeholder="Password">
        </label>
        <br>
        <label for="confirmPassword">
            Confirm Password<br>
            <input type="password" name="confPass" id="confirmPassword" placeholder="confirm Password">
        </label>
        <div>
            <input type="submit" name="click" class="btn btn-success" value="Registration">
        </div>
        <br>
        <div>
            <a href="/user/login" class="btn btn-success">Login Page</a>
        </div>
        <br>
        <div>
<?php
if (!empty($_SESSION["regErrors"])){
    echo $_SESSION["regErrors"];

    unset($_SESSION["regErrors"]);
}
//if (!empty($_POST["click"])){
//    if (!empty($_POST["firstName"]) && !empty($_POST["lastName"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["confPass"])){
//
//    if ($_POST["password"]==$_POST["confPass"]){
//        $RegInfo=new \application\models\SignupForm();
//        $RegInfo->insertInfo($_POST);
//    }else{
//        echo "Pass False";
//    }
//    }else{
//        echo "False";
//    }
//}
//            ?>

        </div>
    </form>
</div>
