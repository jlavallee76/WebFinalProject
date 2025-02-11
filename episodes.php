<!--------------------------------------------------
    Final Project: Big Brother Social Network      -
    Name: Josh Lavallee                            -
    Course: WEBD-2006 Section 1                    -
    Date: March 21st/2020                          -
    Description: Episodes Page                     -
---------------------------------------------------->

<?PHP
    $title = 'Episodes';

    session_start();
    require('requires/header.php');

    $getEpisodesQuery = "SELECT *
                         FROM episodes
                         ORDER BY dateposted DESC";

    $getEpisodesStatement = $db->prepare($getEpisodesQuery);
    $getEpisodesStatement->execute();
    $episodeInfo = $getEpisodesStatement->fetchAll();

    $episodenumber = count($episodeInfo);
?>
    <main>
        <?PHP foreach($episodeInfo as $episode) : ?>       
            <div class="border-danger shadow-lg highlight-phone" style="margin-bottom: 25px;background-color: rgba(105,105,105,0.06);margin-top: 25px;padding: 40px;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="intro">
                                <h2 style="color: rgb(22,23,25);font-size: 38px;">Episode <?=" " . $episodenumber . ": " . $episode["episodename"] ?></h2>
                                <p style="height: 68px;color: rgb(22,23,25);font-size: 21px;">Air Date: <?= $episode["airdate"] ?><br>Events: <?= $episode["event"] ?><br></p>
                            </div>

                                <button class="btn btn-primary btn-lg border rounded" data-bs-hover-animate="pulse" type="button" style="width: 130px;height: 50px;background-color: rgb(218,4,3);margin: 0px;margin-right: 10px;" onclick="location.href='/WebFinalProject/discussion.php?episode=<?= $episode['episodeID']?>'">View Posts</button>
                            
                            <?PHP if(isset($_SESSION["LoggedIn"])) : ?>
                                    <button name="makecomment" class="btn btn-primary btn-lg border rounded" data-bs-hover-animate="pulse" type="button" style="width: 130px;height: 50px;background-color: rgb(218,4,3);" onclick="location.href='/WebFinalProject/createpost.php?episode=<?= $episode['episodeID']?>'">Comment</button>
                            <?PHP endif ?>
                        </div>
                            <div class="col-sm-4">
                                <div>
                                    <img class="device" src="assets/img/episodepics/<?= $episode['episode_photo'] ?>" alt="episdepic">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            <?PHP $episodenumber-- ?>
        <?PHP
            endforeach 
        ?>
    </main>
<?PHP
    require('requires/footer.php');
?>