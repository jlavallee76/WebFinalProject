<!--------------------------------------------------
    Final Project: Big Brother Social Network      -
    Name: Josh Lavallee                            -
    Course: WEBD-2006 Section 1                    -
    Date: March 21st/2020                          -
    Description: Home Page                         -
---------------------------------------------------->

<?PHP
    $title = 'Home';

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

        if(isset($_POST['postnewepisode']) && (!empty($_POST['episodename']) && (!empty($_POST['airdate']))))
        {
            $episodename = filter_input(INPUT_POST, 'episodename', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $airdate = filter_input(INPUT_POST, 'airdate', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $event = filter_input(INPUT_POST, 'event', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            

            $createEpisodeQuery = "INSERT INTO episodes (episodename, airdate, event, dateposted) 
                                   VALUES (:episodename, :airdate, :event, NOW())";


            $createEpisodeStatement = $db->prepare($createEpisodeQuery);
            $createEpisodeStatement->bindValue(':episodename', $episodename);
            $createEpisodeStatement->bindValue(':airdate', $airdate);
            $createEpisodeStatement->bindValue(':event', $event);

            $createEpisodeStatement->execute();

            header("Location: episodes.php");
            exit;  
        }
    }
?>
    <main>
        <?PHP if($userInfo["role"] == 0 || $userInfo["role"] == 1) : ?>
            <div class="container profile profile-view" id="profile">
                <div class="row">
                    <div class="col-md-12 alert-col relative">
                        <div class="alert alert-info absolue center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span>Profile save with success</span></div>
                    </div>
                </div>
                <form>
                    <div class="form-row profile-row">
                        <div class="col-md-4 relative">
                            <div class="avatar">
                                <div class="avatar-bg center"></div>
                            </div>
                                <br>
                                <input type="file" class="form-control" name="profile_photo_file">
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
                </form>
            </div>
        <?PHP endif ?>
        
        <?PHP if($userInfo["role"] == 1) : ?>
            <div class="container profile profile-view" id="profile-1">
            <hr>
                <form method="post" action="myprofile.php">
                    <div class="form-row profile-row">
                        <div class="col-md-4 relative">
                            <div class="avatar"></div>
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
                                        <input type="file" class="form-control" name="episode_photo_file">
                                    <hr>    
                                    <button name="postnewepisode" class="btn btn-danger form-btn" data-bs-hover-animate="pulse" type="submit" style="background-color: rgb(73,48,227);margin: 0px;margin-bottom: 0px;">POST</button>
                                    <button class="btn btn-primary form-btn" data-bs-hover-animate="pulse" type="reset" style="background-color: rgb(255,0,0);margin-bottom: 0px;">CANCEL</button>
                                </div>
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
                </form>
                <div class="card shadow">
    <div class="card-header py-3">
        <p class="text-primary m-0 font-weight-bold">User Info</p>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="text-md-left dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search" /></label></div>
            </div>
        </div>
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
            <table class="table dataTable my-0" id="dataTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Posts</th>
                        <th>Comments</th>
                        <th>User Since</th>
                        <th>Modify</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img class="rounded-circle mr-2" width="30" height="30" src="avatars/avatar1.jpeg" />Airi Satou</td>
                        <td>Tokyo</td>
                        <td>33</td>
                        <td>2008/11/28</td>
                        <td>$162,700</td>
                    </tr>
                    <tr>
                        <td><img class="rounded-circle mr-2" width="30" height="30" src="avatars/avatar2.jpeg" />Angelica Ramos</td>
                        <td>London</td>
                        <td>47</td>
                        <td>2009/10/09<br /></td>
                        <td>$1,200,000</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-6 align-self-center">
                <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
            </div>
            <div class="col-md-6">
                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
            </div>
        <?PHP endif ?>
    </main>
<?PHP
    require('requires/footer.php');
?>