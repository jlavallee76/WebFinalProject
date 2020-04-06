<?PHP
    if(isset($_POST['postnewepisode']) && (!empty($_POST['episodename']) && (!empty($_POST['airdate']))))
    {
        $handle = new \Verot\Upload\Upload($_FILES['image_field']);

        if ($handle->uploaded) 
        {
            $handle->file_new_name_body   = 'episode_pic';
            $handle->image_resize         = true;
            $handle->image_x              = 100;
            $handle->image_ratio_y        = true;
            $handle->process('E:\OneDrive - Red River College\TERM 3\Web Development 2\WebFinalProject\assets\img\episodepics');
            
            if ($handle->processed) 
            {
                $handle->clean();

                $episodename = filter_input(INPUT_POST, 'episodename', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $airdate = filter_input(INPUT_POST, 'airdate', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $event = filter_input(INPUT_POST, 'event', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $episodephoto = $handle->file_dst_name;
                
    
                $createEpisodeQuery = "INSERT INTO episodes (episodename, airdate, event, episode_photo, dateposted) 
                                       VALUES (:episodename, :airdate, :event, :episodephoto, NOW())";
    
    
                $createEpisodeStatement = $db->prepare($createEpisodeQuery);
                $createEpisodeStatement->bindValue(':episodename', $episodename);
                $createEpisodeStatement->bindValue(':airdate', $airdate);
                $createEpisodeStatement->bindValue(':event', $event);
                $createEpisodeStatement->bindValue(':episodephoto', $episodephoto);
    
                $createEpisodeStatement->execute();
            } 
            else 
            {
                echo 'error : ' . $handle->error;
            }
        }
    }

    if(isset($_POST['newprofilepic']))
    {
    
        $handle = new \Verot\Upload\Upload($_FILES['image_field']);

        if ($handle->uploaded) 
        {
            $handle->file_new_name_body   = 'profile_pic';
            $handle->image_resize         = true;
            $handle->image_x              = 100;
            $handle->image_ratio_y        = true;
            $handle->process('E:\OneDrive - Red River College\TERM 3\Web Development 2\WebFinalProject\assets\img\profilepics');
            
            if ($handle->processed) 
            {
                
                $profilephoto = $handle->file_dst_name;
                $username = $userInfo["username"];
                
                $addProfilePic = "UPDATE users
                                  SET `profile_photo` = :profilephoto
                                  WHERE username = :username";

                $addProfilePicStatement = $db->prepare($addProfilePic);
                $addProfilePicStatement->bindValue(':profilephoto', $profilephoto);
                $addProfilePicStatement->bindValue(':username', $username);

                $addProfilePicStatement->execute();

                $handle->clean();
            } 
            else 
            {
                echo 'error : ' . $handle->error;
            }
        }
    }
?>