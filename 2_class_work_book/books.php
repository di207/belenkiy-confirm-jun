<?php
//Class books.php

require_once('DB.php');

class Books {

    // database connection and table name
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    // add book
    function create($title, $status = '0'){
        // posted values
        $title=htmlspecialchars($title);
        $status=(int)$status;
        $status = ((strripos($_SERVER['REQUEST_URI'], 'admin'))) ? '1' : (int)$status;
        $query = "INSERT INTO books SET title=:title, status=:status";
        $stmt = $this->conn->prepare($query);
        // bind values
        $stmt->bindParam(":title",$title);
        $stmt->bindParam(":status", $status);
        return $stmt->execute();
    }

    // find book
    function getBooks($param) {
        $param = htmlspecialchars($param);
        $where = (int)$param > 0 ? "id = :param" : "title = :param";
        $status = ((strripos($_SERVER['REQUEST_URI'], 'admin'))) ? '(0,1,2)' : '(1)';
        $query = "select * from books where {$where} and `status` in {$status} limit 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":param", $param);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // update status book
    function update($id, $status){
        if(strripos($_SERVER['REQUEST_URI'], 'admin')) {
            if (!((int)$id) || !((int)$status)) return false;
            $query = "UPDATE books SET `status`=:status WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            // bind values
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":status", $status);
            return $stmt->execute();
        }
    }
}
?>