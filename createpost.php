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

    $episode = $_GET['episode'];

    if($_POST && (!empty($_POST['subject']) && (!empty($_POST['message']))))
	{
        /*$getInfoQuery = "SELECT *
                         FROM users
                         WHERE username = :username";

        $getInfoStatement = $db->prepare($getInfoQuery);
        $getInfoStatement->bindValue(':username', $_SESSION["Username"], PDO::PARAM_STR);
        $getInfoStatement->execute();
        $userInfo = $getInfoStatement->fetch();*/

        $userID = $_SESSION["UserID"];

        $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_FULL_SPECIAL_CHARS);   
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $createPostQuery = "INSERT INTO comments (userID, episodeID, subject, message, dateposted) 
                            VALUES (:userID, :episodeID, :subject, :message, NOW())";


        $createPostStatement = $db->prepare($createPostQuery);
        $createPostStatement->bindValue(':userID', $userID);
        $createPostStatement->bindValue(':episodeID', $episode);
        $createPostStatement->bindValue(':subject', $subject);
        $createPostStatement->bindValue(':message', $message);

        $createPostStatement->execute();

        header("Location: discussion.php?episode=$episode");
        exit;  
    }

?>
    <main>  
        <section class="td-form" style="width: 821px;">
            <div class="row td-form-wrapper" style="width: 882px;margin: 25px;">
                <div class="col td-glass" style="width: 876px;color: rgb(255,255,255);background-color: rgba(218,3,3,0);opacity: 1;">
                    <form name="newpost" method="post" action="createpost.php?episode=<?= $episode ?>" class="td-form-wrapper" style="background-color: rgba(255,255,255,0.98);color: rgb(0,0,0);">
                        <h1 class="text-center" style="font-family: Lora, serif;color: #000000;">New Post</h1>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="d-flex"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><label for="subject">Subject: * </label>
                                <div class="d-flex td-input-container">
                                    <i class="icon ion-ios-information align-self-center"></i>
                                    <input class="form-control" type="text" autocomplete="off" placeholder="What's your opinion?" name="subject" required="" style="background-color: rgba(0,0,0,0.1); color:black;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><label for="message">Message Details *</label>
                                <div class="d-flex td-input-container">
                                    <i class="icon ion-android-create align-self-center"></i>
                                    <textarea class="form-control" placeholder="Elaborate on your opinion!" name="message" rows="6" cols="50" style="background-color: rgba(0,0,0,0.1); color:black;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-lg border rounded" data-bs-hover-animate="pulse" type="submit" style="width: 95px;height: 50px;background-color: rgb(218,4,3);margin: 10px;margin-right: 6px;margin-top: 5px;">Post</button>
                                <button class="btn btn-primary btn-lg border rounded" data-bs-hover-animate="pulse" type="button" style="width: 95px;height: 50px;background-color: rgb(218,4,3);margin: 10px;margin-right: 6px;margin-top: 5px;">Edit</button>
                                <button class="btn btn-primary btn-lg border rounded" data-bs-hover-animate="pulse" type="button" style="width: 95px;height: 50px;background-color: rgb(218,4,3);margin: 10px;margin-right: 6px;margin-top: 5px;">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
<?PHP
    require('requires/footer.php');
?>