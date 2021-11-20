<?php
    
    spl_autoload_register(function ($class_name) {
        include $class_name . '.php';
    });
    class Post extends Model{

        public $table_name = 'posts';

        public $id;
        public $author;
        public $title;
        public $content;
        public $images;
        public $categories;
        public $created_at;
        public $updated_at;

        public function insertQuery($db_name){
            return "INSERT INTO " . $db_name . ".". $this->table_name ." (author, title, content, images, categories) ".
            "VALUES (\"" . $this->author . "\", \"" . str_replace('"', '\"', $this->title) . "\", \"" . str_replace('"', '\"', $this->content) . "\", \"" . $this->images . "\", \"" . str_replace('"', '\"', $this->categories) . "\");";
        }

        public function updateQuery($db_name, $id){
            return "UPDATE " . $db_name . ".". $this->table_name ." set ".
            "title=\"" . str_replace('"', '\"', $this->title) . "\", content=\"" . str_replace('"', '\"', $this->content) . "\", images=\"" . $this->images . "\", categories=\"" . str_replace('"', '\"', $this->categories) . "\" ".
            "where (id=". $id.");";
        }

    }
    
