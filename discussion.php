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

    
    $episode = filter_input(INPUT_GET, 'episode', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $episode = filter_var($episode, FILTER_VALIDATE_INT);

    $getDiscussionQuery = "SELECT *
                           FROM comments
                           WHERE episodeID = $episode
                           ORDER BY dateposted DESC";

    $getDiscussionStatement = $db->prepare($getDiscussionQuery);
    $getDiscussionStatement->execute();
    $comments = $getDiscussionStatement->fetchAll();

    $getEpisodesQuery = "SELECT episodename
                         FROM episodes
                         WHERE episodeID = $episode";

    $getEpisodesStatement = $db->prepare($getEpisodesQuery);
    $getEpisodesStatement->execute();
    $episodeInfo = $getEpisodesStatement->fetch();

    
?>
    <main>
        <div class="container">
            <br>
            <h2 class="text-center">Episode <?= $episode ?>: <?= $episodeInfo["episodename"] ?></h2>
            <br>
            <?PHP foreach ($comments as $comment) : ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"><img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid" />
                            <p class="text-secondary text-center"><?= $comment["userID"] ?> <br> on <?= $comment["dateposted"] ?></p>
                        </div>
                        <div class="col-md-10">
                            <p>
                                <strong><?= $comment["subject"] ?></strong>
                            </p>
                            
                            <div class="clearfix"></div>
                            
                            <p><?= $comment["message"] ?></p>
                            
                            <?PHP if(isset($_SESSION["LoggedIn"])) : ?>

                                <?PHP if($_SESSION["LoggedIn"]  && ($comment["userID"] == $_SESSION["UserID"]))  : ?>
                                    <p>
                                        <button name="editcomment" class="float-right btn btn-outline-danger ml-2" data-bs-hover-animate="pulse" type="button" style="width: 130px;height: 50px;background-color: rgb(218,4,3);" onclick="location.href='/WebFinalProject/editpost.php?episode=<?= $episode ?>&comment=<?= $comment['commentID'] ?>'">Edit</button>
                                    </p>
                                <?PHP elseif($_SESSION["LoggedIn"]  && ($comment["userID"] != $_SESSION["UserID"])) : ?>
                                    <p>
                                        <a class="float-right btn btn-outline-danger ml-2">
                                            <i class="fa fa-reply"></i> Reply
                                        </a>
                                    </p>
                                <?PHP endif ?>
                            <?PHP endif ?>
                        </div>
                    </div>
                    <div class="card card-inner">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2"><img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid" />
                                    <p class="text-secondary text-center">$timeposted</p>
                                </div>
                                
                                <div class="col-md-10">
                                    <p><strong>$Subject</strong></p>
                                    <p>$Comments</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?PHP endforeach ?>
            <div>
                <?PHP if(isset($_SESSION["LoggedIn"])) : ?>
                    <a href="createpost.php?episode=<?= $episode ?>">
                        <button class="btn btn-primary btn-block border rounded d-inline-flex flex-shrink-1 flex-fill justify-content-between align-items-center align-content-center justify-content-sm-center align-items-sm-start" data-bs-hover-animate="pulse" type="button" style="background-color: rgb(218,4,3);margin: 0px;margin-top: 10px;margin-bottom: 10px;">Make a Comment!</button>
                    </a>
                <?PHP endif ?>
            </div>
            <div>
                <a href="episodes.php">
                    <button class="btn btn-primary btn-block border rounded d-inline-flex flex-shrink-1 flex-fill justify-content-between align-items-center align-content-center justify-content-sm-center align-items-sm-start" data-bs-hover-animate="pulse" type="button" style="background-color: rgb(218,4,3);margin: 0px;margin-top: 10px;margin-bottom: 10px;">Back To Episodes</button>
                </a>
            </div>
        </div>
        
    </main>
<?PHP
    require('requires/footer.php');
?>