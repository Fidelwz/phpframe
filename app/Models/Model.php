<?php

namespace App\Models;

// use PDO;
use mysqli;

class Model{
    
        protected $db_host = DB_HOST;
        protected $db_user = DB_USER;
        protected $db_pass = DB_PASS;
        protected $db_name = DB_NAME;
        protected $connection;
        protected $query;
        

        public function __construct(){
            $this->connection();
        }


        //conection using PDO sql
        public function connection(){
     
         

                $this->connection = new mysqli($this->db_host, $this->db_user,$this->db_pass, $this->db_name);
                if($this->connection->connect_error){
                    die('Error database '. $this->connection->connect_error);
                }
                
                //    try {
                            // $this->connection = new PDO('mysql:host=localhost;dbname=Dbtest;', 'root', 'Passwordxd');
                        
                        
                //         } catch ( $e) {
                //             print "¡Error!: " . $e->getMessage() . "<br/>";
                //             die();
                    
                //         }
    }



    public function query($sql){
                    
        $this->query =  $this->connection->query($sql);
        return $this;
    }

    public function first(){
        return $this->query->fetch_assoc();
    }

    public function get(){
        return $this->query->fetch_all(MYSQLI_ASSOC);
    }


    public function limit(){
        $sql = "SELECT * FROM {$this->table} ORDER BY id ASC  LIMIT 1";
        $this->query($sql);
        return $this->query->fetch_assoc();
    }

    //consultas preparadas 
    public function all(){
        $sql  = "SELECT * FROM {$this->table}";
        return $this->query($sql)->get();
    }



    public function findOrFail($id){

        $sql  = "SELECT * FROM {$this->table} WHERE id = {$id}";
        return $this->query($sql)->first();

    }


    public function where($column, $operador ,$value = null){

        if($value == null){
            $value = $operador;
            $operador = '=';
        }

        $sql  = "SELECT * FROM {$this->table} WHERE {$column}{$operador} '{$value}'";
        $this->query($sql);
        return $this;
    }

    public function create($data){

        $columns = array_keys($data);
        $columns = implode(',', $columns);
        $values = array_values($data);
        $values =  "'" .implode("','", $values ) . "'";

        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$values})";
        $this->query($sql);
        $insert_id =  $this->connection->insert_id;
        return $this->findOrFail($insert_id);
        
    }

    public function create2($data) {
        $columns = array_keys($data);
        $values = array_values($data);
    
        // Preparar placeholders para los valores
        $placeholders = implode(',', array_fill(0, count($values), '?'));
        
        // Construir la consulta preparada
        $sql = "INSERT INTO {$this->table} (" . implode(',', $columns) . ") VALUES ({$placeholders})";
    
        // Preparar la consulta
        $stmt = $this->connection->prepare($sql);
    
        if ($stmt) {
            // Pasar los valores a la consulta preparada
            $stmt->bind_param(str_repeat('s', count($values)), ...$values);
    
            // Ejecutar la consulta
            $stmt->execute();
    
            // Obtener el ID del último inserto
            $insert_id = $stmt->insert_id;
    
            // Cerrar la consulta
            $stmt->close();
    
            // Devolver el resultado
            return $this->findOrFail($insert_id);
        } else {
            // Manejar el error de preparación de consulta
            // Puedes lanzar una excepción, loguear el error, etc.
            return false;
        }
    }

    public function update($id,$data){

        $set = [];

        foreach($data as $key => $value){

            $set[] ="{$key}= '{$value}' ";
        }
        $set = implode(', ',$set);

        $sql = "UPDATE {$this->table} SET {$set} WHERE id = {$id}";
        $this->query($sql);
        return $this->findOrFail($id);

    }
    public function delete($id){
        $sql = "DELETE FROM  {$this->table} WHERE id = {$id}";
        $this->query($sql);
        return "200";
    }
}