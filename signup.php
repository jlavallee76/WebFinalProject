<!--------------------------------------------------
    Final Project: Big Brother Social Network      -
    Name: Josh Lavallee                            -
    Course: WEBD-2006 Section 1                    -
    Date: March 21st/2020                          -
    Description: Home Page                         -
---------------------------------------------------->

<?PHP
    $title = 'Sign Up';
    
    session_start();
    require('requires/header.php');
    
    $validRegistation = true;
    $errors = array();

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $_SESSION["Username"] = $username;

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $_SESSION["Email"] = $email;

    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $_SESSION["Password"] = $password;

    $password_repeat = filter_input(INPUT_POST, 'password-repeat', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $_SESSION["PasswordRepeat"] = $password_repeat;

    if($_POST && (!empty($_POST['username']) && (!empty($_POST['email'])) && (!empty($_POST['password']))))
	{
        $matchUsersQuery = "SELECT username
                            FROM users
                            WHERE username = :username";

        $allUsersStatement = $db->prepare($matchUsersQuery);
        $allUsersStatement->bindValue('username', $username, PDO::PARAM_STR);
        $allUsersStatement->execute();
        $selectUsers = $allUsersStatement->fetch();

        if(!empty($selectUsers))
        {
            array_push($errors, "user_exists");
            $validRegistation = false;
        }

        $matchEmailsQuery = "SELECT email
                             FROM users
                             WHERE email = :email";

        $allEmailsStatement = $db->prepare($matchEmailsQuery);
        $allEmailsStatement->bindValue('email', $email, PDO::PARAM_STR);
        $allEmailsStatement->execute();
        $selectEmails = $allEmailsStatement->fetch();

        if(!empty($selectEmails))
        {
            array_push($errors, "email_exists");
            $validRegistation = false;
        }

        if($password != $password_repeat)
        {
            array_push($errors, "password_mismatch");
            $validRegistation = false;
        }

        if($validRegistation)
        {
            $password = password_hash($password, PASSWORD_DEFAULT); //Encrypting the users password.
            

            $createUserQuery = "INSERT INTO users (username, email, password, date_created) 
                                VALUES (:username, :email, :password, NOW())";


            $createUserStatement = $db->prepare($createUserQuery);
            $createUserStatement->bindValue(':username', $username);
            $createUserStatement->bindValue(':email', $email);
            $createUserStatement->bindValue(':password', $password);

            $createUserStatement->execute();

            $_SESSION["LoggedIn"] = true;

            header("Location: episodes.php");
            exit;  
        }
    }
?>
    <main>
        <div class="register-photo" style="background-color: #f0f0f0;">
            <div class="form-container">
                <div class="image-holder" style="background-image: url(&quot;assets/img/eye.jpg&quot;);height: 370px;width: 334px;"></div>
                <form method="post" action="signup.php">

                    <h2 class="text-center" style="color: rgb(218,4,3);"><strong>Create</strong> an account.</h2>
                    
                    <div class="form-group">
                        <input class="form-control" type="text" name="username" placeholder="Username" required="" minlength="6" maxlength="20" 
                        <?PHP if(isset($_SESSION["Username"])) : ?>
                            value="<?= $_SESSION["Username"]?>"
                        <?PHP endif ?>
                        >
                        <?PHP if(in_array("user_exists", $errors)) : ?>
                            <p style="color: rgb(218,4,3);">This username has been taken.<p>
                        <?PHP endif ?>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email" autocomplete="on" required=""
                        <?PHP if(isset($_SESSION["Email"])) : ?>
                            value="<?= $_SESSION["Email"]?>"
                        <?PHP endif ?>
                        >
                        <?PHP if(in_array("email_exists", $errors)) : ?>
                            <p style="color: rgb(218,4,3);">This e-mail has already been used.<p>
                        <?PHP endif ?>
                    </div>
                    
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required="" minlength="6" maxlength="20">
                    </div>
                        <?PHP if(in_array("password_mismatch", $errors)) : ?>
                            <p style="color: rgb(218,4,3);">The passwords do not match.<p>
                        <?PHP endif ?>
                    
                    <div class="form-group">
                        <input class="form-control" type="password" name="password-repeat" placeholder="Password (repeat)" required="" minlength="6" maxlength="20">
                    </div>
                    
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label"><input class="form-check-input" type="checkbox" required="">I agree to the license terms.</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit" name="sign-up" style="background-color: rgb(218,4,3);">Sign Up</button>
                    </div>
                    
                    <a class="already" href="login.php" style="color: rgb(218,4,3)">You already have an account? Login here.</a>
                </form>
            </div>
        </div>
    </main>
<?PHP
    require('requires/footer.php');
?>