
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
    <style>.main-footer{position: absolute; bottom:  0; background:  lightgray; width: 100%;}</style>
    <title>Create post</title>
</head>
<body>
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader">
            <img class="loader" src="../img/logo.png" alt="preloader">
        </div>
        <!-- navbar -->
        <?php include '../layouts/navbar.php';?>
        <!-- Sidebar -->
        <?php include '../layouts/sidebar.php';?>
        <!-- Create post -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container">
                <h2 class="mt-3">Create post</h2>
                    <div class="row">
                        <div class="col-12 mt-4">
                            <div class="card">
                                <div class="card-body">
                                    <form id="infoForm" action="#" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                                                <input type="text" class="form-control" name="categories" id="inputCategories" placeholder="Post categories">
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
        <?php include '../layouts/footer.php';?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/16bfaec043.js" crossorigin="anonymous"></script>
    <script src="../js/sidebar.js"></script>
    <script>
        $('#SubmitInfoForm').click(function(){
           $('#infoForm').submit()
        })
    </script>
</body>
</html>
<?php
    spl_autoload_register(function ($class_name) {
        include "../Models/" . $class_name . '.php';
    });
    if(isset($_POST) && isset($_POST['title']) && $_POST['content'] != "" && $_POST['categories'] != ""){
        $myfile = fopen("posts.txt", "a");
        $target_dir = "post-images/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $urls = null;

        $target_file = $target_dir . basename($_FILES["images"]['name']); 
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)){
            $urls .= 'http://'. $_SERVER['HTTP_HOST'] . '/posts/' .$target_file . " ";
        }
        $post = Post::create($_POST);
        $post->created_at = date('d-m-y h:i:s');
        $post->author = "Post's author";
        $post->images = $urls;
        fwrite($myfile, $post->__toString() . "\n");
        echo "<script>alert('Post created succesfully!')</script>";
        echo "<script type='text/javascript'>location.href = '/';</script>";
    }
?>
