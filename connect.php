<?php
    require_once("vendor/autoload.php");

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