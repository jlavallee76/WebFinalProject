<!--------------------------------------------------
    Final Project: Big Brother Social Network      -
    Name: Josh Lavallee                            -
    Course: WEBD-2006 Section 1                    -
    Date: March 21st/2020                          -
    Description: Houseguests Page                  -
---------------------------------------------------->

<?PHP
    $title = 'Houseguests';

    session_start();
    require('requires/header.php');
?>
    <main>
        <div class="features-clean">
            <div class="container">
                <div class="intro">
                    <h2 class="text-center">Houseguest History</h2>
                    <p class="text-center">
                        Search a history of Big Brother Canada houseguests by season by toggling the season switches, or search a houseguest by name, age, or place finshed!
                    </p>
                </div>
            <div>   
            <hr class="my-4 rgba-white-light">
            <form method="POST">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-danger" type="button" id="searchButton">Search</button>
                    </div>                
                    <input type="text" class="form-control" placeholder="Search for a Community Centre..." id="searchedCC" aria-label="Example text with button addon" aria-describedby="button-addon1">
                </div>
                
                <div class="row" style="width: 100%; ; justify-content: space-around;">

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="switchArena">
                        <label class="custom-control-label" for="switchArena">S1</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="switchLibrary">
                        <label class="custom-control-label" for="switchLibrary">S2</label>
                    </div>
        
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="switchFitnessCentre">
                        <label class="custom-control-label" for="switchFitnessCentre">S3</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="switchSkatePark">
                        <label class="custom-control-label" for="switchSkatePark">S4</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="switchSprayPad">
                        <label class="custom-control-label" for="switchSprayPad">S5</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="switchWadingPool">
                        <label class="custom-control-label" for="switchWadingPool">S6</label>
                    </div>
                    
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="switchIndoorPool">
                        <label class="custom-control-label" for="switchIndoorPool">S7</label>
                    </div>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="switchOutdoorPool">
                        <label class="custom-control-label" for="switchOutdoorPool">S8</label>
                    </div>
                </div>
            </form>
        </div>
        <hr>
        <div class="team-boxed" style="background-color: rgb(255,255,255);">
            <div class="container">
                <div class="row d-flex flex-row people">
                    <?PHP for($i=0; $i < 10; $i++) : ?>
                    <div class="col-md-6 col-lg-4 item">
                        <div class="border rounded border-danger shadow-lg box"><img class="rounded-circle" src="assets/img/1.jpg">
                            <h3 class="text-danger name">Name</h3>
                            <p class="text-dark title">HomeTown</p>
                            <p class="description">Occupation:<br>Age:<br>Days in House:<br>Finish:</p>
                            <div class="social"><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                        </div>
                    </div>
                    <?PHP endfor ?>
                </div>
            </div>
        </div>
    </main>
<?PHP
    require('requires/footer.php');
?>