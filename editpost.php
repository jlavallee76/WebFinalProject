<!--------------------------------------------------
    Final Project: Big Brother Social Network      -
    Name: Josh Lavallee                            -
    Course: WEBD-2006 Section 1                    -
    Date: March 21st/2020                          -
    Description: Create Post                         -
---------------------------------------------------->

<?PHP
    $title = 'Edit Post';

    session_start();
    require('requires/header.php');

    $episode = $_GET['episode'];
    $comment = $_GET['comment'];

    if($_POST && $_POST['command'] === "Delete")
    {
        //Delete Query
        $deleteQuery = "DELETE FROM comments
                        WHERE commentID = :commentID 
                        LIMIT 1";
        
        $commentID = filter_input(INPUT_GET, 'comment', FILTER_SANITIZE_NUMBER_INT);
        
        $deleteStatement = $db->prepare($deleteQuery);
        $deleteStatement->bindValue(':commentID', $commentID, PDO::PARAM_INT);
        
        $deleteStatement->execute();
        
        header("Location: discussion.php?episode=$episode");
        
        exit;
    }

    if($_POST && $_POST['command'] === "Update")
	{
        $userID = $_SESSION["UserID"];

        $updateQuery = "UPDATE comments 
                        SET subject = :subject, message = :message
                        WHERE commentID = :commentID";

        $commentID = filter_input(INPUT_GET, 'comment', FILTER_SANITIZE_NUMBER_INT);
		$subject= filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $updateStatement = $db->prepare($updateQuery);
        $updateStatement->bindValue(':commentID', $commentID, PDO::PARAM_INT);
        $updateStatement->bindValue(':subject', $subject);
        $updateStatement->bindValue(':message', $message);
        
        $updateStatement->execute();

        header("Location: discussion.php?episode=$episode");
        
        exit;
    }

    $editPostQuery = "SELECT * 
    FROM comments 
    WHERE commentID = :commentID
    LIMIT 1";

    $commentIdentity = filter_input(INPUT_GET, 'comment', FILTER_SANITIZE_NUMBER_INT);

    $editPostStatement = $db->prepare($editPostQuery);
    $editPostStatement->bindValue('commentID', $commentIdentity, PDO::PARAM_INT);
    $editPostStatement->execute();
    $comment = $editPostStatement->fetch();

?>
    <main>  
        <section class="td-form" style="width: 821px;">
            <div class="row td-form-wrapper" style="width: 882px;margin: 25px;">
                <div class="col td-glass" style="width: 876px;color: rgb(255,255,255);background-color: rgba(218,3,3,0);opacity: 1;">
                    <form name="newpost" method="post" action="editpost.php?episode=<?= $episode ?>&comment=<?= $comment['commentID'] ?>" class="td-form-wrapper" style="background-color: rgba(255,255,255,0.98);color: rgb(0,0,0);">
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
                                    <input class="form-control" type="text" autocomplete="off" value="<?= $comment['subject'] ?>" name="subject" required="" style="background-color: rgba(0,0,0,0.1); color:black;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><label for="message">Message Details *</label>
                                <div class="d-flex td-input-container">
                                    <i class="icon ion-android-create align-self-center"></i>
                                    <textarea class="form-control" placeholder="Elaborate on your opinion!" name="message" rows="6" cols="50" style="background-color: rgba(0,0,0,0.1); color:black;"><?= $comment['message'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                            <p>
                            <input type="submit" name="command" value="Update" />
                            <input type="submit" name="command" value="Delete" onclick="return confirm('Are you sure you wish to delete this post?')" />
                        </p>
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