<?php
    
    spl_autoload_register(function ($class_name) {
        include $class_name . '.php';
    });
    
    class User extends Model{

        public $table_name = 'users';

        public $id;
        public $username;
        public $full_name;
        public $email;
        public $password;
        public $rating = 0;
        public $profile_picture;
        public $created_at;
        public $updated_at;

        public function insertQuery($db_name){
            return "INSERT INTO " . $db_name . ".". $this->table_name ." (username, full_name, email, password, profile_picture) ".
            "VALUES (\"" . $this->username . "\", \"" . $this->full_name . "\", \"" . $this->email . "\", \"" . $this->password . "\", \"" . $this->profile_picture . "\");";
        }

        public function updateQuery($db_name, $id){
            return "UPDATE " . $db_name . ".". $this->table_name ." set ".
            "username=\"" . $this->username . "\", full_name=\"" . $this->full_name . "\", email=\"" . $this->email . "\", password=\"" . $this->password . "\", profile_picture=\"" . $this->profile_picture . "\" ".
            "where (id=". $id.");";
        }
    }
    
