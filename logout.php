<!--------------------------------------------------
    Final Project: Big Brother Social Network      -
    Name: Josh Lavallee                            -
    Course: WEBD-2006 Section 1                    -
    Date: March 28th/2020                          -
    Description: Log-Out Page                      -
---------------------------------------------------->

<?PHP
    session_start();
    session_unset(); 
    session_destroy();

    header("Location: login.php");
?>