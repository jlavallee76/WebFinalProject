<!--------------------------------------------------
    Final Project: Big Brother Social Network      -
    Name: Josh Lavallee                            -
    Course: WEBD-2006 Section 1                    -
    Date: March 21st/2020                          -
    Description: Log-In Page                       -
---------------------------------------------------->

<?PHP
    $title = 'Login';
    require_once('requires/header.php');
?>
    <main>
        <div class="article-dual-column"></div>
            <div class="login-clean" style="background-color: #f0f0f0;">
                <form class="border-secondary shadow" method="post" action="authenticate.php">
                    
                    <h2 class="sr-only">Login Form</h2>
                    
                    <div class="illustration">
                        <i class="fa fa-key" style="color: rgb(218,4,3);"></i>
                    </div>
                    
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email" required="">
                    </div>
                    
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required="" minlength="6" maxlength="20">
                    </div>
                    
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(218,4,3);">Log In</button>
                    </div>
                    
                    <a class="forgot" href="#">Forgot your email or password?</a>
                    
                </form>
        </div>
    </main>
<?PHP
    require_once('requires/footer.php');
?>