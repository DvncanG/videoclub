<?php

class ActuanModel {
    
    private $db;
    
    public function __construct($db) {
        $this->db = new DB();
    }
    
    public function getAll() {
        
        $query = $this->db->query('SELECT * FROM ACTUAN');
        return $query->fetchAll(PDO::FETCH_ASSOC);
        
    }
    
}

