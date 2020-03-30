<!--------------------------------------------------
    Final Project: Big Brother Social Network      -
    Name: Josh Lavallee                            -
    Course: WEBD-2006 Section 1                    -
    Date: March 21st/2020                          -
    Description: Fantasy Page                      -
---------------------------------------------------->

<?PHP
    $title = 'Fantasy';

    session_start();
    require('requires/header.php');
?>
    <main>
        <div class="features-clean">
            <div class="container">
                <div class="intro">
                    <h2 class="text-center">Fantasy Big Brother</h2>
                    <p class="text-center">Under Construction!</p>
                </div>
                <div class="row features">
                    <div class="col-sm-6 col-lg-4 item">
                        <i class="fa fa-map-marker icon"></i>
                        <h3 class="name">All Countries</h3>
                        <p class="description">Play BB Fantasy in for any season in any country! USA, Canada, Austrailia, Etc.</p>
                    </div>
                    <div class="col-sm-6 col-lg-4 item">
                        <i class="fa fa-money icon"></i>
                        <h3 class="name">Win Real Money</h3>
                        <p class="description">Set league buy-in or play weekly for a chance to win money based on your players preformances.</p>
                    </div>
                    <div class="col-sm-6 col-lg-4 item">
                        <i class="fa fa-list-alt icon"></i>
                        <h3 class="name">Customizable</h3>
                        <p class="description">Create your own league with up to 8 friends, or join an public league with strangers.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?PHP
    require('requires/footer.php');
?>