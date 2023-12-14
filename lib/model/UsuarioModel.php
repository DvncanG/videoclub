<?php

class UsuarioModel{
    
    private $db;
    
    public function __construct($db) {
        $this->db = new DB();
    }
    
    public function getAll(){
        $query = $this->db->query("SELECT * FROM USUARIOS");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
