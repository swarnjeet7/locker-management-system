<?php
    class DB {
        private $pdo;
        private $host = 'localhost';
        private $db_name = 'piggiBank';
        private $username = 'root';
        private $password = '';

        public function __construct() {
            try {
                $pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name.';charset=utf8', $this->username, $this->password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo = $pdo;
            } catch(PDOException $e) {echo "hello";
                echo 'Connection Error: ' . $e->getMessage();
            }
        }
        
        public function query($query, $params = array()) {
            $statement = $this->pdo->prepare($query);
            $statement->execute($params);
            if(explode(' ', $query)[0] == 'SELECT') {
                $data = $statement->fetchAll();
                return $data;
            }
        }
    }
?>