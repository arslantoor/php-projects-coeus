<?php
class database{

    private $db_host = 'localhost';
    private $db_user = 'coeus';
    private $db_pass = 'Arslan@coeus123';
    private $db_name = 'book_library';
    
    private $mysqli = '';
    private $result = '';
    private $conn = false;

    public function __construct(){
        if (!$this->conn){
            $this->mysqli = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);

            if(!$this->conn->connect_error){
                array_push($this->result,$this->conn->connect_error);
                echo "connections failed";
                return false;

            }
            else{
                return true;
            }
        }else{
            return true;
        }

    }
    
    public function inset(){}
    public function update(){}
    public function delete(){}
    public function select(){}
    
    public function __destruct(){

    }
}

?>