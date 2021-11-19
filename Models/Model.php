<?php

    class Model {

        // ---- create an instance of model child----
        public static function create($params) {
            if(!is_array($params)){
                throw new ErrorException('This function parametre must be an associative array');
            }
            $model = new static();
            foreach($params as $key => $value){
                $model->$key = $value;
            }
            //check...
            $i = 1;
            while(true){
                if(!self::find($i)){
                    $model->id = $i;
                    break;
                }
                $i++;
            }
            ////...
            $model_file = fopen($model->file_name, "a");
            fwrite($model_file, $model->__toString() . "\n");
            return $model;
        }

        public static function find($id){
            $model = new static();
            $fmodels = file($model->file_name);
            if(!$fmodels){
                return null;
            }
            foreach($fmodels as $ele){
                $row  = json_decode($ele, true);
                if((int)$row['id'] === $id){
                    foreach($row as $key => $value){
                        $model->$key = $value;
                    } 
                    return $model;
                }
            }
            return null;
        }
        public static function all(){
            $model = new static();
            $fmodels = file($model->file_name);
            $models = [];
            foreach($fmodels as $ele){
                $row  = json_decode($ele, true);
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
            $model = new static();
            $fmodels = file($model->file_name);
            if(!$fmodels){
                return null;
            }
            $models = [];
            $params_len = count($params);
            foreach($fmodels as $ele){
                $row  = json_decode($ele, true);
                $check = true;
                foreach($params as $param){
                    if(!in_array($param, $row)){
                        $check = false;
                    }
                }
                if($check){
                    $m = new static();
                    foreach($row as $key => $value){
                        $m->$key = $value;
                    }
                    array_push($models, $m);
                }
            }
            return $models;
        }

        // ---- Update ----
        public function update($params){
            if(!is_array($params)){
                throw new ErrorException('This function parametre must be an associative array');
            }
            foreach($params as $key => $value){
                $this->$key = $value;
            }
            $this->update_file($this);
            return $this;
        }
        // ---- Unset/clear all fields ----
        public static function destroy($id){
            $model = new static();
            $fmodels = file($model->file_name);
            $result = '';
            foreach($fmodels as $ele){
                $row  = json_decode($ele, true);
                if((int)$row['id'] === $id){
                    continue;
                }else{
                    $result .= $ele;
                }
            }
            file_put_contents($model->file_name, $result);
        }
        
        public function __toString(){
            return json_encode($this);
        }

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