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
        <div class="container profile profile-view" id="profile">
            <div class="row">
                <div class="col-md-12 alert-col relative">
                    <div class="alert alert-info absolue center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span>Profile save with success</span></div>
                </div>
            </div>

            <form>
                <div class="form-row profile-row">
                    <div class="col-md-4 relative">
                        <div class="avatar">
                            <div class="avatar-bg center">
                                <img class="rounded-circle" src="">
                            </div>
                        </div>
                            <input type="file" class="form-control" name="avatar-file" />
                        </div>
                    <div class="col-md-8">
                        <h1>Profile </h1>
                        <hr />
                        <div class="form-row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group"><label>Firstname </label><input class="form-control" type="text" name="firstname" /></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group"><label>Lastname </label><input class="form-control" type="text" name="lastname" /></div>
                            </div>
                        </div>
                        <div class="form-group"><label>Email </label><input class="form-control" type="email" autocomplete="off" required name="email" /></div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group"><label>Password </label><input class="form-control" type="password" name="password" autocomplete="off" required /></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group"><label>Confirm Password</label><input class="form-control" type="password" name="confirmpass" autocomplete="off" required /></div>
                            </div>
                        </div>
                        <hr />
                        <div class="form-row">
                            <div class="col-md-12 content-right"><button class="btn btn-primary form-btn" type="submit">SAVE </button><button class="btn btn-danger form-btn" type="reset">CANCEL </button></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
<?PHP
    require('requires/footer.php');
?>