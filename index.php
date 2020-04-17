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
        <div class="features-clean">
            <div class="container">
                <img src="assets/img/cast.jpg" alt="">
                <h1>Big Brother Canada Special Statement Regarding End of Production</h1>
                <p>Global and Insight Productions announced today that, in light of developments in Ontario on the fight against COVID-19, 
                    effective today Big Brother Canada Season 8 has ended production.
                </p>
                <p>
                    “Big Brother Canada is a labour of love for so many, and even though it hurts to say goodbye to the season, 
                    it’s the right thing to do,” said Big Brother Canada Host Arisa Cox. “On behalf of the incredible people who 
                    put this show together, thank you to everyone who started this journey with us. Please take care and be safe!”
                </p>
                <p>
                    At this time, Big Brother Canada has no plans to resume production at a later date. After a truly unprecedented 
                    season, the show will take its final bow over two episodes Wednesday, March 25 at 7 p.m. ET/PT and Wednesday, 
                    April 1 at 7 p.m. ET/PT.  
                </p>
            </div>
        </div>
    </main>
<?PHP
    require('requires/footer.php');
?>