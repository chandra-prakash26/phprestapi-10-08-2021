<?php

class Category{
    //db stuff
    private $conn;
    private $table = 'categories';

    //category properties
    public $id;
    public $name;
    public $create_at;

    //constructor with db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //getting posts from our database
    public function read(){
        //create query
        $query = "SELECT * from $this->table";

        //prepare statement
        $stmt = $this->conn->prepare($query);
        //execute query
        $stmt->execute();
        return $stmt;
    }
}

