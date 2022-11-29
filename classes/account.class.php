<?php

require_once 'database.php';

class Accounts{
    //attributes

    public $id;
    public $username;
    public $password;
    public $type;
    public $firstname;
    public $lastname;
    public $old_username;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    function validate(){
        $sql = "SELECT * FROM user WHERE username=:username and password=:password ;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function add(){
        $sql = "INSERT INTO user (firstname, lastname, type, username, password) VALUES
        (:firstname, :lastname, :type, :username, :password);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':type', $this->type);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);

        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }
    function show(){
        $sql = "SELECT * FROM user;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }


}

?>