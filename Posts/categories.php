<?php 
    session_start();
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <style>.inner{ background: linear-gradient(45deg, rgba(70, 69, 69, 0.8), rgba(73, 67, 67)); border-radius: 10px;} .inner a{color: white; text-decoration: none;}</style>
    <title>Home</title>
</head>
<body>
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader">
            <img class="loader" src="./img/logo.png" alt="preloader">
        </div>
        <!-- Sidebar -->
        <?php include './layouts/sidebar.php';?>
        <!-- navbar -->
        <?php include './layouts/navbar.php';?>
        <!-- Posts list -->
        <div class="container posts-content">
            <h2 class="page-title">Categories</h2>
            <div class="card">
                <div class="card-body pb-0">
                    <div class="row justify-content-start">
                        <?php if ($categories && $categories != []): ?>
                            <?php foreach($categories as $category): ?>
                                <div class="col-lg-3 col-6 d-flex align-items-stretch flex-column">
                                    <div class="small-box categories flex-fill">
                                        <div class="inner p-2 my-3">
                                            <a href="<?php echo $configs['App_url'] . Route::route('categories.posts')->action . "?id=" . $category->id ?>" class="link-dark link-muted">
                                            <h3 class="title"><?php echo $category->title ?></h3>
                                            <? if($category->description): ?>
                                                <p><?php echo $category->description ?></p>
                                            <? else: ?>
                                                <p>No description</p>
                                            <? endif; ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
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
    <script>
        $('.post-categories').each((i, obj) => {
            let arr = $(obj).data('categories').split(' ')
            arr.forEach((e) => {
                $(obj).append('<div class="category my-1">' + e +'</div>') 
            })
        })
        
        $('.dropdown-container').each((i, obj) => {
            $(obj).find('.dropdown-btn').click(function(){
                if($(obj).find('.dropdown-menu').is(":visible")){
                    $(obj).find('.dropdown-menu').fadeOut();
                }else{
                    $(obj).find('.dropdown-menu').fadeIn();
                }
            })
        })
    </script>
</body>
</html>

