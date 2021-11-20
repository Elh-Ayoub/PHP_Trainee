<?php
    spl_autoload_register(function ($class_name) {
        include "./Models/" . $class_name . '.php';
    });
    class CategoryController{

        public static function index(){
            $categories = Category::all();
            include "./Posts/categories.php";
        }

        public static function showPosts(){
            $id = $_GET['id'];
            $category = Category::find($id);
            $posts = [];
            if($category){
                $all_posts = Post::all();
                foreach($all_posts as $post){
                    if(str_contains($post->categories, $category->title)){
                        array_push($posts, $post);
                    }
                }
                include "./Posts/posts.php";
            }else{
                throw new Exception('Category not found!');
            }
        }
    }