<?php
    spl_autoload_register(function ($class_name) {
        include "Models/" . $class_name . '.php';
    });
    $posts = [];
    if(file_exists('Posts/posts.txt')){
       $fposts = file('Posts/posts.txt');
        $posts = [];
        foreach($fposts as $post){
            $row  = json_decode($post, true);
            array_push($posts, Post::create($row));
        } 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
        <!-- navbar -->
        <?php include './layouts/navbar.php';?>
        <!-- Sidebar -->
        <?php include './layouts/sidebar.php';?>
        <!-- Posts list -->
        <div class="container posts-content">
            <h2 class="page-title">Home</h2>
            <a class="d-flex justify-content-center create-post align-items-center px-2 py-1" href="/Posts/create-post.php">
                <img src="./img/default.png" class="img-fluid img-circle" alt="User" width="30" height="30" style="border-radius: 50%;">
                <span class="mx-1">What's in your mind? Create a post?</span>
            </a>
            <?php if ($posts && $posts != []): ?>
            <?php foreach($posts as $post): ?>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="card mb-4">
                    <div class="card-body">
                        <div class="media mb-3 d-flex justify-content-between">
                            <div>
                              <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="d-block ui-w-40 rounded-circle" alt="">
                                <div class="media-body ml-3">
                                    <?php echo $post->author ?>
                                    <div class="text-muted small"><?php echo $post->created_at ?></div>
                                </div>
                            </div>
                            <div class="dropdown-container">
                                <a class="link-muted p-1 dropdown-btn" style="text-decoration: none; font-size: x-large; color: black; cursor: pointer;"><b>...</b></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                    
                                </div>
                            </div>
                        </div>
                        <p class="text-center"><b><?php echo $post->title ?></b></p>
                        <p>
                            <?php echo $post->content ?>
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
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <?php include './layouts/footer.php';?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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

