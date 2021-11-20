<?php
    spl_autoload_register(function ($class_name) {
        include "./Models/" . $class_name . '.php';
    });
    session_start();
    class PostController{

        // posts list
        public static function index(){
            $posts = Post::all();
            include "./Posts/posts.php";
        }

        //create post form
        public static function create(){
            if(isset($_SESSION['auth'])){
                include "./Posts/create-post.php";
            }else{
                throw new Exception('You must log in first!!');
            }
            
        }

        //edit post form
        public static function edit(){
            $id = (int)$_GET['id'];
            $post = Post::find($id);
            if($post && $_SESSION['auth']->id === $post->author){
                include "./Posts/edit-post.php";
            }else{
                throw new Exception('Post deleted or not yours.');
            }
        }

        //Store post
        public static function store(){
            $configs = include "./config.php";
            if(isset($_REQUEST) && isset($_REQUEST['title']) && $_REQUEST['content'] != "" && $_REQUEST['categories'] != ""){
                $target_dir = $configs['post-images'];
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                $urls = null;
        
                $target_file = $target_dir . basename($_FILES["images"]['name']);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                if(move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)){
                    $urls = $configs['App_url'] . $configs['post-images'] .basename($_FILES["images"]['name']) . " ";
                }
                foreach($_REQUEST['categories'] as $category){
                    Category::create([
                        'title' => $category,
                    ]);
                }
                $post = Post::create([
                    'author' => $_SESSION['auth']->id,
                    'title' => $_REQUEST['title'],
                    'content' => $_REQUEST['content'],
                    'categories' => implode(' ',$_REQUEST['categories']),
                    'created_at' => date('d-m-y h:i:s'),
                    'images' => $urls,
                ]);

                echo "<script>alert('Post created succesfully!')</script>";
                echo "<script type='text/javascript'>location.href = '/';</script>";
            }
        }
        //Update post
        public static function update(){
            $configs = include "./config.php";
            if(isset($_REQUEST) && isset($_REQUEST['title']) && $_REQUEST['content'] != "" && $_REQUEST['categories'] != ""){
                $post = Post::find($_REQUEST['post_id']);
                if($post && $_SESSION['auth']->id === $post->author){
                    $post_image = $post->images;
                    if($_FILES['images']){
                        $target_dir = "./Posts/post-images/";
                        $target_file = $target_dir . basename($_FILES["images"]['name']); 
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        if(move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)){
                            $post_image = $configs['App_url'] . $configs['post-images'] .basename($_FILES["images"]['name']) . " ";
                        }
                    }
                    $post->update([
                        'title' => $_REQUEST['title'],
                        'content' => $_REQUEST['content'],
                        'categories' => $_REQUEST['categories'],
                        'images' => $post_image,
                    ]);
                    echo "<script>alert('Post Updated succesfully!')</script>";
                    echo "<script type='text/javascript'>location.href = '/';</script>";
                }else{
                    throw new Exception('Post deleted or not yours.');
                }
            }
        }
        //Delete post
        public static function destroy(){
            if(isset($_REQUEST['post_id'])){
                $id = $_REQUEST['post_id'];
                $post = Post::find($id);
                if($post){
                    //delete image if exist
                    $post_img = parse_url($post->images, PHP_URL_PATH);
                    $path =  trim($post_img, '/');
                    unlink(trim($path));
                    //delete post
                    Post::destroy($id);
                    echo "<script>alert('Post deleted succesfully!')</script>";
                    echo "<script type='text/javascript'>location.href = '/';</script>";
                }
            }else{
                throw new Exception('Something went wrong!');
            }
        }
    }
