<?PHP
    $title = 'Home';
    require_once 'header.php';
?>
    <div class="register-photo" style="background-color: #f0f0f0;">
        <div class="form-container">
            <div class="image-holder" style="background-image: url(&quot;assets/img/eye.jpg&quot;);height: 370px;width: 334px;"></div>
            <form method="post">
                <h2 class="text-center" style="color: rgb(218,4,3);"><strong>Create</strong> an account.</h2>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" autocomplete="on" required=""></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required="" minlength="6" maxlength="20"></div>
                <div class="form-group"><input class="form-control" type="password" name="password-repeat" placeholder="Password (repeat)" required="" minlength="6" maxlength="20"></div>
                <div class="form-group">
                    <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox">I agree to the license terms.</label></div>
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(218,4,3);">Sign Up</button></div><a class="already" href="#">You already have an account? Login here.</a></form>
        </div>
    </div>
<?PHP
    require_once 'footer.php';
?>