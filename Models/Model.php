<?php
    include_once "./Database/DBConnection.php";
    class Model extends DBConnection{

        // ---- create an instance of model child----
        public static function create($params) {
            $configs = include './config.php';
            if(!is_array($params)){
                throw new ErrorException('This function parametre must be an associative array');
            }
            $model = new static();
            foreach($params as $key => $value){
                $model->$key = $value;
            }
            // add to database
            $statement = (new self)->connect()->prepare($model->insertQuery($configs['DB_NAME']));
            $statement->execute();
            return $model;
        }

        public static function find($id){
            $configs = include './config.php';
            $statement = (new self)->connect()->query("SELECT * FROM " . $configs['DB_NAME']. "." . (new static)->table_name . " where id = " . $id);
            if($row = $statement->fetch()){
                $model = new static();
                foreach($row as $key => $value){
                    $model->$key = $value;
                }
                return $model;
            }
            return null;
        }
        public static function all(){
            $models = [];
            $configs = include './config.php';
            $statement = (new self)->connect()->query("SELECT * FROM " . $configs['DB_NAME']. "." . (new static)->table_name);
            
            while($row = $statement->fetch()){
                $m = new static();
                foreach($row as $key => $value){
                    $m->$key = $value;
                }
                array_push($models, $m);
            }
            return $models;
        }

        public static function where($params){
            if(!is_array($params)){
                throw new ErrorException('This function parametre must be an associative array');
            }
            $models = [];
            $configs = include './config.php';
            
            $query = [];
            foreach($params as $key => $value){
                array_push($query, $key . "=\"" . $value . "\"");
            }
            
            $statement = (new self)->connect()->query("SELECT * FROM ". $configs['DB_NAME']. "." . (new static)->table_name . " where " . implode(" AND ", $query));
            while($row = $statement->fetch()){
                $m = new static();
                foreach($row as $key => $value){
                    $m->$key = $value;
                }
                array_push($models, $m);
            }
            return $models;
        }

        // ---- Update ----
        public function update($params){
            $configs = include './config.php';
            if(!is_array($params)){
                throw new ErrorException('This function parametre must be an associative array');
            }
            foreach($params as $key => $value){
                $this->$key = $value;
            }
            // update in database
            $statement = $this->connect()->prepare($this->updateQuery($configs['DB_NAME'], $this->id));
            $statement->execute();
            return $this;
        }
        // ---- delete ----
        public static function destroy($id){
            $configs = include './config.php';
            $model = new static();
            $statement = (new self)->connect()->prepare("DELETE FROM " . $configs['DB_NAME'] . "." . $model->table_name . " where id=" . $id);
            $statement->execute();
        }
        
        public function __toString(){
            return json_encode($this);
        }

        //delete this
        public function update_file($model){
            $fmodels = file($model->file_name);
            $result = '';
            foreach($fmodels as $ele){
                $row  = json_decode($ele, true);
                if((int)$row['id'] === $model->id){
                    $result .= $model->__toString()."\n";
                }else{
                    $result .= $ele;
                }
            }
            file_put_contents($model->file_name, $result);
        }

    }