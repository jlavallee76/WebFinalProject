<!--------------------------------------------------
    Final Project: Big Brother Social Network      -
    Name: Josh Lavallee                            -
    Course: WEBD-2006 Section 1                    -
    Date: March 22nd/2020                          -
    Description: User Authentication Constant      -
---------------------------------------------------->

<?PHP
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

        $matchEmailQuery = "SELECT email
                            FROM users
                            WHERE email = :email";

        $allEmailsStatement = $db->prepare($matchEmailQuery);
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
          // Create Query
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