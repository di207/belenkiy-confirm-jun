<?php
//Class books.php

class books
{

    /* @var db */
    protected $db;
    protected $data;

    public function __construct()
    {
        $this->db = db::instance();
    }

    // add book
    function create($title, $status = '0')
    {
        // posted values
        $title = htmlspecialchars($title);
        $status = (int)$status;
        $status = ((strripos($_SERVER['REQUEST_URI'], 'admin'))) ? '1' : (int)$status;
        $stmt = $this->db->run("INSERT INTO books SET title= ?, status= ?", [$title, $status]);
        return $stmt;
    }

    // find book
    function getBooks($param)
    {
        $param = htmlspecialchars($param);
        $where = (int)$param > 0 ? "id =" : "title =";
        $status = ((strripos($_SERVER['REQUEST_URI'], 'admin'))) ? '(0,1,2)' : '(1)';
        $stmt = $this->db->run("select * from books where {$where} ? and status in {$status} limit 1", [$param]);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // update status book
    function update($id, $status)
    {
        if (strripos($_SERVER['REQUEST_URI'], 'admin')) {
            if (!((int)$id) || !((int)$status)) {
                return false;
            }
            $stmt = $this->db->run("UPDATE books SET `status`= ? WHERE id = ?", [$status, $id]);
            return $stmt;
        }
    }
}

?>