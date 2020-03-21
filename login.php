<?PHP
    $title = 'Home';
    require_once 'header.php';
?>
    <div class="login-clean" style="background-color: #f0f0f0;">
        <form class="border-secondary shadow" method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="fa fa-key" style="color: rgb(218,4,3);"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" required=""></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required="" minlength="6" maxlength="20"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(218,4,3);">Log In</button></div><a class="forgot" href="#">Forgot your email or password?</a></form>
    </div>
<?PHP
    require_once 'footer.php';
?>