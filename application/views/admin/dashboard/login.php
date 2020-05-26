<div class="d-flex justify-content-center">
    <div>
        <h3>ADMIN Login </h3>
        <form action="" method="post">
            <label for="email">Email<br>
                <input type="text" name="email" id="email" placeholder="Email">
            </label>
            <br>
            <label for="password">Password <br>
                <input type="password" name="password" id="password" placeholder="Password">
            </label>
            <br>
            <label for="checkbox">Remember Me
                <input type="checkbox" name="checkbox" id="checkbox" >
            </label>
            <br>
            <div>
                <input type="submit" name="submit" id="submit" class="btn btn-success">
            </div>
            <br>
            <div style="margin-bottom: 5px">
                <a href="#" class="btn btn-success">Confirm password ?</a>
            </div>
        </form>
        <?php if (!empty($_SESSION["AdminLoginPage"])){
            echo $_SESSION["AdminLoginPage"];
            unset($_SESSION["AdminLoginPage"]);
        } ?>
    </div>
</div>