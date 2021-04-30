<?php
class models{

    private $db_host = "localhost";
    private $db_user = "coeus";
    private $db_pass = "Arslan@coeus123";
    private $db_name = "EMS_System";
    
    private $mysqli = "";
    private $result = array();
    private $conn = false;

    // create database connection
    
    public function __construct(){
   
        if (!$this->conn){
            $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            $this->conn=true;
            if($this->conn->connect_error){
                array_push($this->result,$this->conn->connect_error);
                return false;
            }else{
                
                return true;
            }

        }else{
            return true;
        }

    }

    // insert data into db
    public function insert($table,$tbl_data){
        print_r ($tbl_data[0]);
        $sql = "INSERT INTO  $table(name, Author_name, book_isbn, cover_image) VALUES('$tbl_data[0]','$tbl_data[1]','$tbl_data[2]','$tbl_data[3]')";
        $tableInDb = $this->mysqli->query($sql);

        if ($tableInDb){
            echo "data inserted successfully<br>";
            }else{
                echo "data insertion error <br>";
            }
    }
    
    // To Update record in a db
    public function update($table,$table_id,$table_value){
         $sql = "UPDATE $table SET name='$table_value' WHERE id='$table_id'";
         $updateTable = $this->mysqli->query($sql);
         if ($updateTable){
            echo "data updated successfully <br>";
        }else{
            echo "data updation error <br>";
        }      

    }
    
    // Fucntion to delete table or row from databse
    public function delete($table,$table_id){
        $sql = "DELETE FROM $table WHERE id=$table_id";
        $deleteTable = $this->mysqli->query($sql);
        if ($deleteTable){
            echo "delete success <br>";
        }else{
            echo "delete error <br>";
        }
    }
    
    // fucntion To Select from database
    public function select($table){

        $sql = "SELECT * FROM $table";
        $tableInDb = $this->mysqli->query($sql);
        
        if ($tableInDb){
            if($tableInDb->num_rows >0){
                foreach($tableInDb as $x){
                    echo $x['name'];
                }
                echo "<br>";
            }

        }else{

            echo "table  does not exits <br>";
            return false;
        }
        
    }

    // Authenticate login
    public function authenticate_login($table,$credentials){
        
        $email=$credentials['email'];
        $password=$credentials['password'];

        $sql = "SELECT * FROM $table WHERE email='$email'";
        $tableInDb = $this->mysqli->query($sql);
        $user = $tableInDb->fetch_object();
        session_start();
        if ($tableInDb){
            if($tableInDb->num_rows == 1){
               if ($email ===  $user->email){
                   if(password_verify($password, $user->password));
                   $_SESSION['name']=$user->name;
                   $_SESSION['id']=$user->id;
                   $_SESSION['email']=$user->email;

                //    print_r($_SESSION);
                //    die();

                   header("Location: ../views/dashboard.php");
               }
               else{echo "failed";}
            }

        }else{
            header("Location: ../index.php?error=user does not exist");
            return false;
        }
        
    }

    // logout 
    function logout(){
        try{
            unset($_SESSION["name"]);
            header("Location: ../index.php?error=Your are logout");
        }
        catch(Exception $e){
            echo "error";
            die();
        }
           
        
    }

    // marke attendance 
    function mark_attendance($attendance){

        $check_in_time= $attendance['checkin'];
        $check_out_time = $attendance['checkout'];
        $user_id = $attendance['user'];

        $sql = "INSERT INTO attendance(user_id,checkin,checkout) VALUES('$user_id','$check_in_time',' $check_out_time')";
        $tableInDb = $this->mysqli->query($sql);



        return true;

    }



    // close connection
    public function __destruct(){
        if ($this->conn){
            if ( $this->mysqli->close()){
                $this->conn = false;
                return true;
            }

        }else{
            return true;
        }
        $this->conn->exit();
    }
}

?>