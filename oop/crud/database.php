<?php

    class Database {
        private $db_server = 'localhost';
        private $db_user = 'root';
        private $db_password = '';
        private $db_name = 'opp_crud';

        private $conn = '';

        public function __construct()
        {
            $this->conn = new mysqli($this->db_server, $this->db_user, $this->db_password, $this->db_name);

            if($this->conn->connect_error){
                return false;
            }
            else {
                return true;
            }
        }

        public function getData($table, $fields = '*', $condition = ''){
            $query = "SELECT $fields FROM $table $condition";
            $result = $this->conn->query($query);

            $data_arr = [];
            while($row = $result->fetch_assoc()){
                array_push($data_arr, $row);
            }

            return $data_arr;
        }

        public function insertData($table, $fields, $values){
            $query = "INSERT INTO `$table`($fields) VALUES ($values)";
            $this->conn->query($query);

            if($this->conn->error){
                return false;
            }
            else {
                return true;
            }
        }

        public function deleteData($table, $condition){
            $query = "DELETE FROM $table $condition";
            $this->conn->query($query);

            if($this->conn->error){
                return false;
            }
            else {
                return true;
            }
        }
    }