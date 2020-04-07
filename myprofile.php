<!--------------------------------------------------
    Final Project: Big Brother Social Network      -
    Name: Josh Lavallee                            -
    Course: WEBD-2006 Section 1                    -
    Date: March 21st/2020                          -
    Description: Home Page                         -
---------------------------------------------------->

<?PHP
    $title = 'MyProfile';

    session_start();
    require('requires/header.php');

    if($_SESSION["LoggedIn"])
    {       
        $getInfoQuery = "SELECT *
                         FROM users
                         WHERE username = :username";

        $getInfoStatement = $db->prepare($getInfoQuery);
        $getInfoStatement->bindValue('username', $_SESSION["Username"], PDO::PARAM_STR);
        $getInfoStatement->execute();
        $userInfo = $getInfoStatement->fetch();
    }
?>
    <main>
        <?PHP if($userInfo["role"] == 0 || $userInfo["role"] == 1) : ?>
            <div class="container profile profile-view" id="profile">
                    <div class="form-row profile-row">
                        <div class="col-md-4 relative">
                            <div class="avatar">
                                <div class="avatar-bg center">
                                    <img class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                                    <img class="rounded-circle" src="assets\img\profilepics\<?= $userInfo["profile_photo"] ?>" width="195px" height="200px" style="background-color: rgb(218,4,3);padding: 2px;" />
                                </div>
                                <hr>
                                <form enctype="multipart/form-data" method="post" action="myprofile.php">
                                    <input type="file" class="form-control" size="32" name="image_field" value="">
                                    <br>
                                    <button name="newprofilepic" class="btn btn-danger form-btn" data-bs-hover-animate="pulse" type="submit" style="background-color: rgb(73,48,227);margin: 0px;margin-bottom: 0px;">UPLOAD</button>
                                </form>
                            </div>
                            <br>
                        </div>

                        <div class="col-md-8">
                            <h1><?= $userInfo["fname"] . " " . $userInfo["lname"] . "'s "?>Profile</h1>
                            <hr>
                            <h5>Change Information</h5>
                            <hr>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group"><label>Firstname </label><input class="form-control" type="text" name="firstname" value="<?= $userInfo["fname"] ?>"></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group"><label>Lastname </label><input class="form-control" type="text" name="lastname" value="<?= $userInfo["lname"] ?>"></div>
                                </div>
                            </div>
                            <div class="form-group"><label>Email </label><input class="form-control" type="email" autocomplete="off" required="" name="email" value="<?= $userInfo["email"] ?>"></div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group"><label>Password </label><input class="form-control" type="password" name="password" autocomplete="off" required=""></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group"><label>Confirm Password</label><input class="form-control" type="password" name="confirmpass" autocomplete="off" required=""></div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="col-md-12 content-right">
                                    <button class="btn btn-primary form-btn" data-bs-hover-animate="pulse" type="reset" style="background-color: rgb(255,0,0);margin-bottom: 0px;">CANCEL</button>
                                    <button class="btn btn-danger form-btn" data-bs-hover-animate="pulse" type="submit" style="background-color: rgb(73,48,227);margin: 0px;margin-bottom: 0px;">SAVE</button>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        <?PHP endif ?>
        
        <?PHP if($userInfo["role"] == 1) : ?>
            <div class="container profile profile-view" id="profile-1">
            <hr>
                <form enctype="multipart/form-data" method="post" action="myprofile.php">
                    <div class="form-row profile-row">
                        <div class="col-md-4 relative">
                            <h1>Administrator<br>Privileges</h1>
                        </div>
                        <div class="col-md-8">
                            <div class="form-row">
                                <div class="col-sm-12 col-md-6">
                                    <h1>Add Episode</h1>
                                    <hr>
                                    <div class="form-group">
                                        <label>Episode Name:&nbsp;</label>
                                        <input class="form-control" type="text" name="episodename"></div>
                                    <div class="form-group">
                                        <label>Air Date:&nbsp;</label>
                                        <input class="form-control" type="text" name="airdate">
                                    </div>
                                    <div class="form-group">
                                        <label>Event:&nbsp;</label>
                                        <input class="form-control" type="text" name="event">
                                    </div>
                                        <label>Episode Photo:&nbsp;</label>
                                        <input type="file" class="form-control" size="32" name="image_field" value="">
                                    <hr>    
                                    <button name="postnewepisode" class="btn btn-danger form-btn" data-bs-hover-animate="pulse" type="submit" style="background-color: rgb(73,48,227);margin: 0px;margin-bottom: 0px;">POST</button>
                                    <button class="btn btn-primary form-btn" data-bs-hover-animate="pulse" type="reset" style="background-color: rgb(255,0,0);margin-bottom: 0px;">CANCEL</button>
                                </div>
                </form>
                            <div class="col-sm-12 col-md-6">
                            <h1>Stats</h1>
                                <hr>
                                <div class="form-row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="card text-white bg-primary shadow">
                                            <div class="card-body">
                                                <p class="m-0">Episodes</p>
                                                <p class="text-white-50 small m-0">episodes(count)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card text-white bg-info shadow">
                                            <div class="card-body">
                                                <p class="m-0">Posts</p>
                                                <p class="text-white-50 small m-0">$posts(count)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        <?PHP endif ?>
    </main>
<?PHP
    require('requires/footer.php');
?>