<?php

class ActoresModel {
    
    private $db;
    
    public function __construct($db) {
        $this->db = new DB();
    }
    
    public function getAll() {
        
        $query = $this->db->query('SELECT * FROM ACTORES');
        return $query->fetchAll(PDO::FETCH_ASSOC);
        
    }
    
}

