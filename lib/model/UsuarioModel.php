<?php

require_once __DIR__ . '/../../db/DB.php';

class UsuarioModel {

    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function getAll() {
        $query = $this->db->query("SELECT * FROM USUARIOS");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerUsuarioPorNombre($nombreUsuario) {
        $query = $this->db->query("SELECT * FROM USUARIOS WHERE username = :username");
        $query->bindParam(':username', $nombreUsuario, PDO::PARAM_STR);
        $query->execute();

        $resultado = $query->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            return new Usuarios($resultado['id'], $resultado['username'], $resultado['password'], $resultado['rol']);
        } else {
            return null;
        }
    }
}
