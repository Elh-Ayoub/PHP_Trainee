<?php
    
    spl_autoload_register(function ($class_name) {
        include $class_name . '.php';
    });
    class Post extends Model{

        public $file_name = './Posts/posts.txt';

        public $id;
        public $author;
        public $title;
        public $content;
        public $images;
        public $categories;
        public $created_at;

    }
    
