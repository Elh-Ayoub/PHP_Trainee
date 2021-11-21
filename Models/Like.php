<?php
    
    spl_autoload_register(function ($class_name) {
        include $class_name . '.php';
    });
    
    class Like extends Model{

        public $table_name = 'likes';

        public $id;
        public $author;
        public $type;
        public $post_id = null;
        public $comment_id = null;
        public $created_at;
        public $updated_at;

        public function insertQuery($db_name){
            
            return "INSERT INTO " . $db_name . ".". $this->table_name ." (author, type, post_id, comment_id) ".
            "VALUES (\"" . $this->author . "\", \"" . $this->type . "\", " . (($this->post_id) ? ($this->post_id):("NULL")) . " , " . (($this->comment_id) ? ($this->comment_id):("NULL")) . ");";
        }

        public function updateQuery($db_name, $id){
            return "UPDATE " . $db_name . ".". $this->table_name ." set ".
            "type=\"" . $this->type . "\"".
            "where (id=". $id.");";
        }
    }
    
