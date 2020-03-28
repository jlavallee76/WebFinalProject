<!--------------------------------------------------
    Final Project: Big Brother Social Network      -
    Name: Josh Lavallee                            -
    Course: WEBD-2006 Section 1                    -
    Date: March 21st/2020                          -
    Description: Header Constant                   -
---------------------------------------------------->
<?PHP

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>WebProject</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
</head>

<body style="background-color: #f0f0f0;">
    <nav class="navbar navbar-dark navbar-expand-md sticky-top navigation-clean-button" style="background-color: rgba(0,0,0,0.83);">
        <div class="container">
            <a class="navbar-brand" href="index.php" style="color: rgb(255,255,255);">
                <img data-bs-hover-animate="pulse" src="assets/img/logo.png" style="width: 121px;">
            </a>
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" data-bs-hover-animate="pulse" href="episodes.php" style="color: rgb(255,255,255);">Episodes</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" data-bs-hover-animate="pulse" href="houseguests.php" style="color: rgb(255,255,255);">Houseguests</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" data-bs-hover-animate="pulse" href="fantasy.php" style="color: rgb(255,255,255);">Fantasy</a></li>
                </ul>
                <?PHP if(isset($_SESSION["LoggedIn"])): ?>
                    <span class="navbar-text actions">                   
                        <img class="rounded-circle" src="" width="60px" height="60px"  role="button" data-bs-hover-animate="jello" href="login.php" href="profile.php" style="background-color: rgb(218,4,3);padding: 2px;" />
                        <a class="btn btn-light action-button" role="button" data-bs-hover-animate="jello" href="logout.php" style="background-color: rgb(218,4,3);">Log Out</a>
                    </span>
                <?PHP else : ?>
                    <span class="navbar-text actions"> 
                        <a class="btn btn-light action-button" role="button" data-bs-hover-animate="jello" href="signup.php" style="background-color: rgba(218,4,3,0);margin: 0px;margin-right: 14px;">Sign Up</a>
                        <a class="btn btn-light action-button" role="button" data-bs-hover-animate="jello" href="login.php" style="background-color: rgb(218,4,3);">Log In</a>
                    </span>
                <?PHP endif ?>
            </div>
        </div>
    </nav>