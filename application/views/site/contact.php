<main style="margin-top: 60px;margin-bottom: 60px">
    <div class="container">
        <?php if (!empty($_POST["thanksName"]))
        {echo "<div style='font-size: 25px' class=\"d-flex justify-content-center\">Thanks For Your Message Diar ".$_POST["thanksName"]." we will contact you as soon as possible</div>" ;}
        echo "<br>";
        ?>
        <div class="d-flex justify-content-center">

            <form action="" method="post">
                <label for="name"><h4>Your Name</h4>
                    <input type="text" id="name" name="name" placeholder="Name">
                </label>
                <br>
                <label for="email"> <h4>Your Email</h4>
                    <input type="email" id="email" name="email" placeholder="Email">
                </label>
                <br>
                <label for="phone"><h4>Your Phone Number</h4>
                    <input type="text" id="phone" name="phone" placeholder="phone">
                </label>
                <br>
                <label for="message"><h4>Message</h4>
                    <textarea id="message" name="message" placeholder="Write Your Message"></textarea>
                </label>
                <br>
                <button type="submit" class="btn btn-success" name="button" value="Message">Send Message</button>
            </form>
        </div>
    </div>
</main>

