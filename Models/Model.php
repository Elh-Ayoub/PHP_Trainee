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
            return $model;
        }
        // ---- Update ----
        public function update($params){
            if(!is_array($params)){
                throw new ErrorException('This function parametre must be an associative array');
            }
            foreach($params as $key => $value){
                $this->$key = $value;
            }
            return $this;
        }
        // ---- Unset/clear all fields ----
        public function delete(){
            foreach($this as $key => $value){
                unset($this->$key);
            }
        }
        
        public function __toString(){
            return json_encode($this);
        }

    }