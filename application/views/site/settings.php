<main style="margin-top: 60px;margin-bottom: 60px">
    <div class="container">
        <div class="d-flex justify-content-center">
            <h4>Edit Your Profile</h4>
        </div>
            <?php if (!empty($_POST["fname"])){echo '
            <div class="d-flex justify-content-center">
                <h4 class="d-flex justify-content-center">
              Diear '.$_POST["fname"].'  Your settings Is Update
                </h4>
        
        </div>
         ';}else{?>
        <div class="d-flex justify-content-center">
            <form action="" method="post">
                <label for="fname"><h4>First Name</h4>
                    <input type="text" id="fname" name="fname" value="<?php echo $data[0][0]['first_name']?>">
                </label>
                <br>
                <label for="lname"><h4>Last Name</h4>
                    <input type="text" id="lname" name="lname" value="<?php echo $data[0][0]['last_name']?>">
                </label>
                <br>
                <label for="email"> <h4>Your Email</h4>
                    <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $data[0][0]['email']?>">
                </label>
                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success" style="margin-right: 5px;" name="button" value="edit">Edit</button>
                    <a class="btn btn-success" href="/">Go Back</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</main>

