<?php
    
    spl_autoload_register(function ($class_name) {
        include $class_name . '.php';
    });
    
    class User extends Model{

        public $file_name = 'Auth/users.txt';

        public $id;
        public $username;
        public $full_name;
        public $email;
        public $password;
        public $rating = 0;
        public $profile_picture;
        public $created_at;

    }
    
