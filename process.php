<!--------------------------------------------------
    Final Project: Big Brother Social Network      -
    Name: Josh Lavallee                            -
    Course: WEBD-2006 Section 1                    -
    Date: March 22nd/2020                          -
    Description: User Authentication Constant      -
---------------------------------------------------->

<?PHP
    require('connect.php');
    
    if($_POST && (!empty($_POST['username']) && (!empty($_POST['email'])) && (!empty($_POST['password']))))
	{
        // Create Query
        $createQuery = "INSERT INTO users (username, email, password, date_created) 
                        VALUES (:username, :email, :password, NOW())";

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $createstatement = $db->prepare($createQuery);
        $createstatement->bindValue(':username', $username);
		$createstatement->bindValue(':email', $email);
        $createstatement->bindValue(':password', $password);

		$createstatement->execute();
        
        header("Location: index.php");
        
        exit;
    }
    else
	{
		$message = "Title and content must be at least one character.";
    }
?>