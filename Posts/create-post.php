<?php 
    $configs = include "./config.php";  
    require_once "./routes/router.php";
    require_once "./routes/route.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../img/logo.png"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/chip.css">
    <style>.main-footer{position: absolute; bottom:  0; background:  lightgray; width: 100%;} @media only screen and (max-width: 576px) {.main-footer{position: relative;}}</style>
    <title>Create post</title>
</head>
<body>
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader">
            <img class="loader" src="../img/logo.png" alt="preloader">
        </div>

        <!-- Sidebar -->
        <?php include './layouts/sidebar.php';?>
        <!-- navbar -->
        <?php include './layouts/navbar.php';?>
        
        <!-- Create post -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container">
                <h2 class="mt-3">Create post</h2>
                    <div class="row">
                        <div class="col-12 mt-4">
                            <div class="card">
                                <div class="card-body">
                                    <form id="infoForm" action="<?php echo $configs['App_url'] . Route::route('store.post')->action ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                        <div class="form-group row py-2">
                                            <label for="inputTitle" class="col-sm-2 col-form-label"><b>Title</b></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="title" id="inputTitle" placeholder="Post title">
                                            </div>
                                        </div>
                                        <div class="form-group row py-2">
                                            <label for="inputContent" class="col-sm-2 col-form-label"><b>Content</b></label>
                                            <div class="col-sm-10">
                                                <textarea type="text" class="form-control" id="inputEmail" name="content" placeholder="Post content"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row py-2">
                                            <label for="inputCategories" class="col-sm-2 col-form-label"><b>Categories</b></label>
                                            <div class="col-sm-10">
                                            <div id="res"></div>
                                                <input type="text" id="categories" name="cat" class="form-control" maxlength="30" placeholder="Categoies">
                                            </div>
                                        </div>
                                        <div class="form-group row py-2">
                                            <label for="images" class="col-sm-2 col-form-label"><b>Image: </b></label>
                                            <div class="col-sm-10">
                                                <input type="file" id="images" name="images" class="form-control">
                                            </div>
                                        </div>
                                    </form>
                                    <div class="form-group d-flex justify-content-between my-3">
                                        <div class="offset-sm-2">
                                            <button id="SubmitInfoForm" type="submit" class="btn btn-success">Create</button>
                                        </div>
                                        <a type="button" href="/" class="btn btn-secondary" data-toggle="modal" data-target="#modal-delete-user">Cancel</a>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/16bfaec043.js" crossorigin="anonymous"></script>
    <script src="../js/sidebar.js"></script>
    <script src="../js/chip.js"></script>
    <script>
        $('#SubmitInfoForm').click(function(){
           $('#infoForm').submit()
        })
    </script>
</body>
</html>

