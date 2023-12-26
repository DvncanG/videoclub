<?php

require_once __DIR__ . '/../../db/DB.php';

class ActoresModel {

    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function getAll() {

        $query = $this->db->query('SELECT * FROM ACTORES');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
