<!--------------------------------------------------
    Final Project: Big Brother Social Network      -
    Name: Josh Lavallee                            -
    Course: WEBD-2006 Section 1                    -
    Date: March 21st/2020                          -
    Description: Log-In Page                       -
---------------------------------------------------->

<?PHP
    $title = 'Login';

    session_start();
    require('requires/header.php');


    $errors = array();

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $_SESSION["Username"] = $username;
    
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    if($_POST && (!empty($_POST['username']) && (!empty($_POST['password']))))
	{
        $getUserQuery = "SELECT *
                         FROM users
                         WHERE username = :username";

        $getUserStatement = $db->prepare($getUserQuery);
        $getUserStatement->bindValue('username', $username, PDO::PARAM_STR);
        $getUserStatement->execute();
        $selectUser = $getUserStatement->fetch();

        if(empty($selectUser))
        {
            array_push($errors, "nouser_exists");
        }
        elseif(password_verify($password, $selectUser['password']))
        {
            $_SESSION["LoggedIn"] = true;
            $_SESSION["ProfilePic"] = $selectUser['profile_photo'];

            header("Location: episodes.php");
        }
        else
        {
            array_push($errors, "incorrect_password");
        }
    }
?>
    <main>
        <div class="article-dual-column"></div>
            <div class="login-clean" style="background-color: #f0f0f0;">
                <form class="border-secondary shadow" method="post" action="login.php">
                    
                    <h2 class="sr-only">Login Form</h2>
                    
                    <div class="illustration">
                        <i class="fa fa-key" style="color: rgb(218,4,3);"></i>
                    </div>
                    
                    <div class="form-group">
                        <input class="form-control" type="text" name="username" placeholder="Username" required="" minlength="6" maxlength="20"
                        <?PHP if(isset($_SESSION["Username"])) : ?>
                            value="<?= $_SESSION["Username"]?>"
                        <?PHP endif ?>>
                        <?PHP if(in_array("nouser_exists", $errors)) : ?>
                            <p style="color: rgb(218,4,3);">This username does not exist.<p>
                        <?PHP endif ?>
                    </div>
                    
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required="" minlength="6" maxlength="20">
                        <?PHP if(in_array("incorrect_password", $errors)) : ?>
                            <p style="color: rgb(218,4,3);">Incorrect password, please try again.<p>
                        <?PHP endif ?>
                    </div>
                    
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(218,4,3);">Log In</button>
                    </div>
                    
                    <a class="forgot" href="#">Forgot your email or password?</a>
                    
                </form>
        </div>
    </main>
<?PHP
    require('requires/footer.php');
?>