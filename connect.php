<!--------------------------------------------------
    Final Project: Big Brother Social Network      -
    Name: Josh Lavallee                            -
    Course: WEBD-2006 Section 1                    -
    Date: March 22nd/2020                          -
    Description: Connection to Database            -
---------------------------------------------------->

<?php
    define('DB_DSN','mysql:host=localhost;dbname=bbproject;charset=utf8');
    define('DB_USER','root');
    define('DB_PASS','');     

    try
    {
        // Create a PDO object called $db.
        $db = new PDO(DB_DSN, DB_USER, DB_PASS);
        
        //array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        print "Error: " . $e->getMessage();
        die();
    }
?>