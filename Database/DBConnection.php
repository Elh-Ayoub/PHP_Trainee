<?php

    class DBConnection {
        private $host;
        private $db_name;
        private $username;
        private $password;
        private $charset;
        
        public function connect(){
            $configs = include "./config.php";
            $this->host = $configs['DB_HOST'];
            $this->db_name = $configs['DB_NAME'];
            $this->username = $configs['DB_USER'];
            $this->password = $configs['DB_PASSWORD'];
            $this->charset = $configs['DB_CHARSET'];

            try {
                $dsn = "mysql:host=".$this->host.";db_name=".$this->db_name.";charset=".$this->charset;
                $pdo = new PDO($dsn, $this->username, $this->password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            
        }
    }