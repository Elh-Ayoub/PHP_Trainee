<?php
    session_start();
    $configs = include './config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="./img/logo.png"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/profile.css">
    <title>Profile</title>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php include './layouts/sidebar.php';?>
        <!-- navbar -->
        <?php include './layouts/navbar.php';?>
        <!-- Profile -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container">
                    <div class="row">
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                            <img id="profile-pic" class="profile-user-img img-fluid img-thumbnail" style="border-radius: 50%;" width="200px" height="200px"
                                src="<?php echo $_SESSION['auth']->profile_picture ?>"
                                alt="User-Avatar">
                            </div>
                            <h3 class="profile-username text-center"><?php echo $_SESSION['auth']->username ?></h3>
                            <p class="text-muted text-center"><?php echo $_SESSION['auth']->full_name ?></p>
                            <div class="list-group list-group-unbordered">
                                <form action="<?php echo $configs['App_url'] . Route::route('user.avatar')->action ?>" method="POST" class="form-group row" enctype="multipart/form-data">
                                    <div class="d-flex w-100 justify-content-around align-items-center">
                                        <label class="selectfile" for="choosefile">select picture</label>
                                        <input id="choosefile" type="file" name="avatar" class="d-none">
                                        <button type="submit" class="btn btn-warning">save</button>
                                    </div>
                                </form>
                                <form action="<?php echo $configs['App_url'] . Route::route('user.avatar.delete')->action ?>" method="POST">
                                    <div class="d-flex w-100 justify-content-start mx-2">
                                        <button type="submit" class="btn btn-danger">Delete avatar</button>
                                    </div> 
                                </form> 
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active tab-btn-settings" data-target="#settings">Info</a></li>
                                <li class="nav-item"><a class="nav-link tab-btn-password" data-target="#password">Password</a></li>            
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="settings">
                                    <form id="infoForm" action="<?php echo $configs['App_url'] . Route::route('user.update')->action ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                        <div class="form-group row my-2">
                                            <label for="inputLogin" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="username" id="inputLogin" placeholder="username" value="<?php echo $_SESSION['auth']->username ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row my-2">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="<?php echo $_SESSION['auth']->email ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row my-2">
                                            <label for="inputfull_name" class="col-sm-2 col-form-label">Full name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputfull_name" name="full_name" placeholder="Full name" value="<?php echo $_SESSION['auth']->full_name ?>" required>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="form-group d-flex justify-content-between my-3">
                                        <div class="offset-sm-2">
                                        <button id="SubmitInfoForm" type="submit" class="btn btn-success">Save</button>
                                        </div>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-user">Delete account</button>
                                    </div>           
                                </div>
                                <div class="tab-pane" id="password">
                                    <form action="<?php echo $configs['App_url'] . Route::route('user.password.update')->action ?>" method="POST">
                                        <div class="form-group row my-2">
                                            <label for="inputCurrPass" class="col-sm-3 col-form-label">Current password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" name="current_password" id="inputCurrPass">
                                            </div>
                                        </div>
                                        <div class="form-group row my-2">
                                            <label for="inputPass" class="col-sm-3 col-form-label">New password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" name="password" id="inputPass">
                                            </div>
                                        </div>
                                        <div class="form-group row my-2">
                                            <label for="inputConfirmPass" class="col-sm-3 col-form-label">Confirm new password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" name="password_confirmation" id="inputConfirmPass">
                                            </div>
                                        </div>
                                        <div class="form-group d-flex justify-content-start my-3">
                                            <button type="submit" class="btn btn-warning mt-3">Save</button>
                                        </div> 
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
            <div class="modal fade" id="modal-delete-user">
                <div class="modal-dialog" role="document">
                    <div class="modal-content text-light bg-danger">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-delete-userLabel">Delete account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>You are about to delete your account are you sure ?</p>
                        </div>
                        <form action="<?php echo $configs['App_url'] . Route::route('user.delete')->action ?>" method="POST" class="modal-footer">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-light">Confirm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>    
        <?php include './layouts/footer.php';?>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/16bfaec043.js" crossorigin="anonymous"></script>
    <script src="./js/sidebar.js"></script>
    <script src="./js/profile.js"></script>
</body>
</html>