<main style="margin-top: 60px;margin-bottom: 60px">
    <div class="container">
        <?php if (empty($_SESSION['thenksBuy'])) { ?>
            <div class="d-flex justify-content-center">
                <h4>Are you ready to spend your money <?= $data[1][0]['first_name'] ?> ?</h4>
            </div>
            <div class="d-flex justify-content-center">
                <br>
                <form action="" method="post">
                    <?php if ($data[0][0]['quantity'] > 1) { ?>
                        <label for="quantity">how many of our product are you ready to take? 1 or
                            max <?= $data[0][0]['quantity']; ?> :</label>
                        <br>
                    <?php } else { ?>
                        <label for="quantity">last left <?= $data[0][0]['quantity']; ?> :</label>
                        <br>
                    <?php } ?>

                    <div class="d-flex justify-content-center">
                        <input type="number" id="quantity" name="quantity" min="1" max="<?= $data[0][0]['quantity']; ?>"
                               value="1">
                    </div>
                    <br>
                    <div class="form-group">

                        <div class="input-group">
                            <input type="text" name="cardNumber" placeholder="Your card number" class="form-control"
                                   required>
                            <div class="input-group-append">
                    <span class="input-group-text text-muted">
                                                <i class="fa fa-cc-visa mx-1"></i>
                                                <i class="fa fa-cc-amex mx-1"></i>
                                                <i class="fa fa-cc-mastercard mx-1"></i>
                                            </span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="buy" class="btn btn-outline-success" value="buy">BUY</button>
                    </div>
                </form>
            </div>
        <?php } ?>

        <?php if (!empty($_SESSION['thenksBuy']) && $_SESSION['thenksBuy'] == true) { ?>
            <div class="d-flex justify-content-center">
                <h3>Thanks for Buy Go To The <a href="/site/product">Praducts</a> And Buy again</h3>
            </div>
        <?php } ?>

    </div>
</main>
