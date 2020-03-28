<!--------------------------------------------------
    Final Project: Big Brother Social Network      -
    Name: Josh Lavallee                            -
    Course: WEBD-2006 Section 1                    -
    Date: March 21st/2020                          -
    Description: Home Page                         -
---------------------------------------------------->

<?PHP
    $title = 'Sign Up';
    
    require_once('requires/header.php');
    require('connect.php');
    
    $validRegistation = true;

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password_repeat = filter_input(INPUT_POST, 'password-repeat', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

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
            echo "This user exists.";
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
            echo "This e-mail has been used.";
            $validRegistation = false;
        }

        if($password != $password_repeat)
        {
            echo "The passwords do not match.";
            $validRegistation = false;
        }

        if($validRegistation)
    {
        $createUserQuery = "INSERT INTO users (username, email, password, date_created) 
                            VALUES (:username, :email, :password, NOW())";


        $createUsertatement = $db->prepare($createUserQuery);
        $createUsertatement->bindValue(':username', $username);
        $createUsertatement->bindValue(':email', $email);
        $createUsertatement->bindValue(':password', $password);

        $createUsertatement->execute();

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
                        <input class="form-control" type="text" name="username" placeholder="Username" required="" minlength="6" maxlength="20">
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email" autocomplete="on" required="">
                    </div>
                    
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required="" minlength="6" maxlength="20">
                    </div>
                    
                    <div class="form-group">
                        <input class="form-control" type="password" name="password-repeat" placeholder="Password (repeat)" required="" minlength="6" maxlength="20">
                    </div>
                    
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label"><input class="form-check-input" type="checkbox">I agree to the license terms.</label>
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
    require_once('requires/footer.php');
?>