
<?php

class User {
    private $db;
    private $tableName = 'user';

    public function __construct() {
        $this->db = new Database;

        $this->db->query("SHOW TABLES LIKE 'user'");
        $result = $this->db->single();
       

        if (empty($result)) {
            $this->createTable();
        }
    }
       
       
    
      
       public function signIn($email,$password){
        $this->db->query("SELECT * from $this->tableName WHERE email=:email");
        $this->db->bind(':email', $email);

        $row=$this->db->single();
        $hashed_password = $row->password;
        if(password_verify($password,$hashed_password)){
        return $row;
       }else{
        return false;
       }
       }
    
       public function signUp($data){
        $isFirstUser = $this->isFirstUser();

        $query = $isFirstUser ?
            "INSERT INTO $this->tableName (`name`, email, `password`, role) VALUES (:name, :email, :password, TRUE)" :
            "INSERT INTO $this->tableName (`name`, email, `password`) VALUES (:name, :email, :password)";
    
        $this->db->query($query);
    //    bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
               // Execute the query
               if( $this->db->execute()){
                return true;
               }else{
                return false;
               }
       }
       private function isFirstUser() {
        // Check if the user table is empty
        $this->db->query("SELECT COUNT(*) as count FROM $this->tableName");
        $result = $this->db->single();
     
        return $result->count == 0;
    }
   
       private function createTable() {
           // Define your table creation SQL here
           $createTableSQL = "
           
           CREATE TABLE $this->tableName (
               userId INT PRIMARY KEY AUTO_INCREMENT,
               name VARCHAR(255) NOT NULL,
               email VARCHAR(255) NOT NULL,
               password VARCHAR(255) NOT NULL,
               role BOOL NOT NULL DEFAULT FALSE
           );       
       ";
           
           // Execute the table creation query
           $this->db->query($createTableSQL);
           $this->db->execute();
       }
    public function FindUserbyEmail($email){
        $this->db->query("select * from $this->tableName where email = :email");
        $this->db->bind(':email', $email);
        $row =$this->db->single();
        if( $this->db->rowcount() >0 ){
            return true;
        }else{
             return false;
        }
    }
    


    public function getUser() {
        try {
            $this->db->query("SELECT * FROM " . $this->tableName . " WHERE userId <> :userId");
            $this->db->bind(':userId', $_SESSION["user_id"]);
           
            $result = $this->db->resultSet();
          
            return $result;
        } catch (Exception $e) {
            // Log or handle the exception appropriately
            return false;
        }
    }
    public function getUserByID($id){
        $this->db->query("select name,email from $this->tableName where userId = :id");
        $this->db->bind(':id', $id);
        $row =$this->db->single();
        if( $this->db->rowcount() >0 ){
            return $row;
        }else{
             return false;
        }
    }
    public function deleteuserById($data){
        $this->db->query("DELETE FROM  $this->tableName WHERE userId=:id");
        $this->db->bind(':id',$data); 
        if($this->db->execute()){
            return true;
          } else {
            return false;
          }

    }
   

   
}