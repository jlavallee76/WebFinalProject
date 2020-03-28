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
        <div class="team-boxed">
            <div class="container">
                <div class="intro">
                    <h2 class="text-center">Big Brother Canada Season 8 Houseguests</h2>
                    <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae.</p>
                </div>
                <div class="row d-flex flex-row people">
                    <div class="col-md-6 col-lg-4 item">
                        <div class="border rounded border-danger shadow-lg box"><img class="rounded-circle" src="assets/img/1.jpg">
                            <h3 class="text-danger name">Name</h3>
                            <p class="text-dark title">HomeTown</p>
                            <p class="description">Occupation:<br>Age:<br>Days in House:<br>Finish:</p>
                            <div class="social"><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?PHP
    require('requires/footer.php');
?>