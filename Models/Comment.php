<?php
    
    spl_autoload_register(function ($class_name) {
        include $class_name . '.php';
    });
    
    class Comment extends Model{

        public $table_name = 'comments';

        public $id;
        public $author;
        public $content;
        public $post_id = null;
        public $created_at;
        public $updated_at;

        public function insertQuery($db_name){
            
            return "INSERT INTO " . $db_name . ".". $this->table_name ." (author, content, post_id) ".
            "VALUES (\"" . $this->author . "\", \"" . $this->content . "\", " . $this->post_id . ");";
        }

        public function updateQuery($db_name, $id){
            return "UPDATE " . $db_name . ".". $this->table_name ." set ".
            "content=\"" . $this->content . "\"".
            "where (id=". $id.");";
        }
    }
    
