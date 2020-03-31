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
?>
    <main>
        <div class="container">
            <h2 class="text-center">$Name_Of_Episode</h2>
            
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"><img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid" />
                            <p class="text-secondary text-center">$timeposted</p>
                        </div>
                        <div class="col-md-10">
                            <p>
                                <a class="float-left" href="#"><strong>$PosterUserName</strong></a>
                            </p>
                            
                            <div class="clearfix"></div>
                            
                            <p>$PosterUserComments</p>
                            
                            <p>
                                <a class="float-right btn btn-outline-danger ml-2">
                                    <i class="fa fa-reply"></i> Reply
                                </a>
                                <a class="float-right btn text-white btn-danger">
                                    <i class="fa fa-heart"></i> Like
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="card card-inner">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2"><img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid" />
                                    <p class="text-secondary text-center">$timeposted</p>
                                </div>
                                
                                <div class="col-md-10">
                                    <p><a href="#"><strong>$CommenterUserName</strong></a></p>
                                    <p>$CommenterUserComments</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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