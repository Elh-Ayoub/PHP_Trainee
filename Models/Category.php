<?php
    
    spl_autoload_register(function ($class_name) {
        include $class_name . '.php';
    });
    
    class Category extends Model{

        public $table_name = 'categories';

        public $id;
        public $title;
        public $description;
        public $created_at;
        public $updated_at;

        public function insertQuery($db_name){
            return "INSERT INTO " . $db_name . ".". $this->table_name ." (title, description) ".
            "VALUES (\"" . $this->title . "\", \"" . $this->description . "\");";
        }

        public function updateQuery($db_name, $id){
            return "UPDATE " . $db_name . ".". $this->table_name ." set ".
            "title=\"" . $this->title . "\", description=\"" . $this->description.
            "where (id=". $id.");";
        }
    }
    
