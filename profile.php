<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/profile.css">
    <title>Profile</title>
</head>
<body>
    <div class="wrapper">
        <!-- navbar -->
        <?php include './layouts/navbar.php';?>
        <!-- Sidebar -->
        <?php include './layouts/sidebar.php';?>
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
                            <img id="profile-pic" class="profile-user-img img-fluid img-circle"
                                src="./img/default.png"
                                alt="User-Avatar">
                            </div>
                            <h3 class="profile-username text-center">Ayoub</h3>
                            <p class="text-muted text-center">Ayoub El haddadi</p>
                            <div class="list-group list-group-unbordered">
                                <form action="#" method="POST" class="form-group row" enctype="multipart/form-data">
                                    <div class="d-flex w-100 justify-content-between align-items-center">
                                        <label class="selectfile" for="choosefile">select picture</label>
                                        <input id="choosefile" type="file" name="image" class="d-none">
                                        <button type="submit" class="btn btn-warning">save</button>
                                    </div>
                                </form>
                                <form action="#" method="POST">
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
                                    <form id="infoForm" action="#" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label for="inputLogin" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="username" id="inputLogin" placeholder="username" value="Ayoub">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="ayoub1998elh@gmail.com">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputfull_name" class="col-sm-2 col-form-label">Full name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputfull_name" name="full_name" placeholder="Full name" value="Ayoub El haddadi">
                                            </div>
                                        </div>
                                    </form>
                                    <div class="form-group d-flex justify-content-between my-3">
                                        <div class="offset-sm-2">
                                        <button id="SubmitInfoForm" type="submit" class="btn btn-success">Save</button>
                                        </div>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-user">Delete</button>
                                    </div>           
                                </div>
                                <div class="tab-pane" id="password">
                                    <form action="#" method="POST">
                                        <div class="form-group row">
                                            <label for="inputCurrPass" class="col-sm-3 col-form-label">Current password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" name="current_password" id="inputCurrPass">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPass" class="col-sm-3 col-form-label">New password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" name="password" id="inputPass">
                                            </div>
                                        </div>
                                        <div class="form-group row">
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
        </div>    
        <?php include './layouts/footer.php';?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"></script>
    <script src="https://kit.fontawesome.com/16bfaec043.js" crossorigin="anonymous"></script>
    <script src="./js/sidebar.js"></script>
    <script>
        $(".tab-btn-settings").click(function(){
            $(this).addClass('active')
            $('#settings').addClass('active')
            $('#password').removeClass('active')
            $(".tab-btn-password").removeClass('active')
        })
        $(".tab-btn-password").click(function(){
            $(this).addClass('active')
            $('#password').addClass('active')
            $('#settings').removeClass('active')
            $(".tab-btn-settings").removeClass('active')
        })
    </script>
</body>
</html>