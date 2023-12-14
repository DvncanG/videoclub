<?php

class DB {
    
    protected $db;

    public function __construct() {
        require_once '../config/config.php';

        try {
            $this->db = new PDO("mysql:host={$config['host']};dbname={$config['database']}", $config['user'], $config['password']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function query($sql, $data = []) {
        $query = $this->db->prepare($sql);
        foreach ($data as $field => $value) {
            $query->bindValue($field, $value);
        }
        $query->execute();
        return $query; // Devolvemos el objeto PDOStatement directamente
    }
    
    /**
     * El método bindValue se utiliza en este código para vincular un valor a 
     * una sentencia preparada. En la sentencia SQL preparada, se especifican 
     * marcadores de parámetros (por ejemplo, :field) en lugar de los valores reales, 
     * y luego se utiliza bindValue para especificar el valor real de cada uno de 
     * estos marcadores. Esto se hace para evitar la inyección de SQL, 
     * ya que el valor se procesa de manera segura antes de ser utilizado en la consulta.
     */

}

/**
 * En este código se utiliza prepare para preparar la consulta SQL y se 
 * utiliza bindValue para enlazar los valores de los campos a la consulta. 
 * Esto hace que el código sea más seguro ya que protege contra ataques de inyección SQL. 
 * Además, se ha incluido un parámetro opcional $data que permite pasar los datos a enlazar 
 * a la consulta de manera más sencilla.
 */

