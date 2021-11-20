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
            <h2 class="page-title">Home</h2>
            <a class="d-flex justify-content-center create-post align-items-center px-2 py-1" style="text-decoration : none" href="<? if(isset($_SESSION['auth'])): ?> /posts/create <? else: ?> /auth/login <?endif; ?>">
                <img src="./img/default.png" class="img-fluid img-circle" alt="User" width="30" height="30" style="border-radius: 50%;">
                <span class="mx-1">What's in your mind? Create a post?</span>
            </a>
            <?php if ($posts && $posts != []): ?>
            <?php foreach($posts as $post): ?>
                <?php $author =  User::find($post->author) ?>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-7">
                        <div class="card mb-4">
                        <div class="card-body">
                            <div class="media mb-3 d-flex justify-content-between">
                                <div>
                                    <img src="<?php echo $author->profile_picture ?>" class="d-block ml-1 ui-w-40 rounded-circle" alt="">
                                    <div class="media-body ml-1">
                                        <?php echo $author->username ?>
                                        <div class="text-muted small"><?php echo $post->created_at ?></div>
                                    </div>
                                </div>
                                <? if($post->author === $_SESSION['auth']->id): ?>
                                    <div class="dropdown">
                                        <a style="font-size: x-large; cursor: pointer;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>...</b> </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="<?php echo $configs['App_url'] . Route::route('edit.post')->action . "?id=" . $post->id ?>">Edit</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-delete-post-<?php echo $post->id?>">Delete</a>
                                        </div>
                                    </div>
                                <? endif; ?>
                            </div>
                            <p class="text-center"><b><?php echo htmlentities($post->title) ?></b></p>
                            <p>
                                <?php echo htmlentities($post->content) ?>
                            </p>
                            <?php if ($post->images): ?>
                                <img class="brand-image img-fluid" src="<?php echo $post->images ?>">
                            <?php endif; ?>
                            <div class="post-categories d-flex flex-wrap" data-categories="<?php echo $post->categories ?>">
                                
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="d-inline-block text-muted text-decoration-none">
                                <strong>123</strong> Likes</small>
                            </a>
                            <a href="#" class="d-inline-block text-muted mx-3 text-decoration-none">
                                <strong>0</strong> Dislikes</small>
                            </a>
                            <a href="#" class="d-inline-block text-muted text-decoration-none">
                                <strong>12</strong> Comments</small>
                            </a>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal-delete-post-<?php echo $post->id?>">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content text-light bg-danger">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-delete-userLabel">Delete post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>You are about to delete a post. Are you sure?</p>
                            </div>
                            <form action="<?php echo $configs['App_url'] . Route::route('delete.post')->action ?>" method="POST" class="modal-footer">
                                <input type="text" name="post_id" class="d-none" value="<?php echo $post->id?>">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline-light">Confirm</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php endif; ?>
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

