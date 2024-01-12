<?php

class Tag {
    private $db;
    private $tableName = __CLASS__;

    public function __construct() {
        $this->db = new Database;

        $this->db->query("SHOW TABLES LIKE '$this->tableName'");
        $result = $this->db->single();
       

        if (empty($result)) {
            $this->createTable();
        }
    }
    public function createTable() {
         // Define your table creation SQL here
         $createTableSQL = "
         CREATE TABLE `Tag`
         (
             `idtag`   INT PRIMARY KEY AUTO_INCREMENT,
             `name` varchar(255) NOT NULL ,
             `create_at`   timestamp(0) NOT NULL DEFAULT NOW(),
             `edit_at`     timestamp(0) NULL 
         );     
     ";
         
         // Execute the table creation query
         $this->db->query($createTableSQL);
         $this->db->execute();
    }
    public function getallTag(){
        $this->db->query(" SELECT * FROM $this->tableName");       
        $result = $this->db->resultSet();
        return $result;
    }
    public function getTagById($data){
        $this->db->query(" SELECT `name` FROM $this->tableName where `idtag`=:idTag"); 
        $this->db->bind(':idtag', $data['idtag']);      
        $result = $this->db->resultSet();
        return $result;
    }
   
    public function insetTag($data){
        $this->db->query("INSERT INTO $this->tableName ( `name`) VALUES (:name)");
        $this->db->bind(':name', $data['name']);
        if( $this->db->execute()){
            return true;
           }else{
            return false;
           }

    }
    public function uniqueName($name){
        $this->db->query("select * from $this->tableName where name = :name");
        $this->db->bind(':name', $name);
        $row =$this->db->single();
        if( $this->db->rowcount() >0 ){
            return true;
        }else{
             return false;
        }
    }
    public function updatTag($data){
        $this->db->query("UPDATE `tag` SET `name`= :name,`edit_at`= :edit_at WHERE idtag = :idtag");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':edit_at', date('Y-m-d H:i:s'));
        $this->db->bind(':idtag', $data['idtag']);
            if( $this->db->execute()){
            return true;
           }else{
            return false;
           }
    }
    public function deleteTag($data){
        $this->db->query("DELETE FROM $this->tableName WHERE idtag = :idtag ");
        $this->db->bind(':idtag', $data['idtag']);
        if( $this->db->execute()){
            return true;
           }else{
            return false;
           }
    }
}