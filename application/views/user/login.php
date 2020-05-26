<!-- Login Page Content -->
<div class="d-flex justify-content-center">
    <div>
        <h3>Login</h3>
        <?php
        if (!empty($_SESSION["regisTrue"])){?>
            <div style="border: 1px solid silver; border-radius: 5px; padding: 3px; margin-top: 15px; font-style: italic; font-size: 25;"><?= $_SESSION["regisTrue"]; ?></div>
            <?php
            unset($_SESSION["regisTrue"]);
        }
        ?>
        <form action="/user/login" method="post">

            <br>
            <label for="email">Email<br>
                <input type="text" name="email" id="email" placeholder="Email">
            </label>
            <br>
            <label for="password">Password <br>
                <input type="password" name="password" id="password" placeholder="Password">
            </label>
            <br>
            <label for="checkbox">Remember Me
                <input type="checkbox" name="checkbox" id="checkbox">
            </label>
            <br>
            <div>
                <input type="submit" name="submit" id="submit" value="login" class="btn btn-success">
            </div>
            <br>
            <div style="margin-bottom: 5px">
                <a href="#" class="btn btn-success">Confirm password ?</a>
            </div>
            <?php

            if (!empty($_SESSION["regisTrue"])){
                echo $_SESSION["regisTrue"];
                unset($_SESSION["regisTrue"]);
            }

            if (!empty($_SESSION["LoginErrors"])) {
                echo $_SESSION["LoginErrors"];
                unset($_SESSION["LoginErrors"]);
            }
            ?>
        </form>
    </div>
</div>

