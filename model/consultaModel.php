<?php

class ConsultaModel{
    private $conn;

    public function __construct() {
        // Inicializar la conexión a la base de datos
        $this->db();
    }

    // Función para inicializar la conexión a la base de datos
    public function db() {
        // Establecer la conexión a la base de datos
        $this-> conn = conectaDb();
    }

    public function ConsultAr(){
 
        $sql=$this->conn->prepare("SELECT * FROM knowledge_area");
        $sql -> execute();
        $consultaarea = $sql -> fetchAll(PDO::FETCH_ASSOC);
        return  $consultaarea;
    }

    public function consulproyect($idarea) {

        $sql = $this -> conn -> prepare("SELECT * FROM project WHERE id_knowledge_area_proj = $idarea");
        $sql -> execute();
        $consulta_proyecto = $sql -> fetchAll(PDO::FETCH_ASSOC);
        return $consulta_proyecto;
        return $idarea;
    }

    public function consultarFichaModel($idproyect) {

        $sql = $this -> conn -> prepare("SELECT * FROM file WHERE id_proj_file  = $idproyect");
        $sql -> execute();
        $consulta_ficha = $sql -> fetchAll(PDO::FETCH_ASSOC);
        return $consulta_ficha;
        return $idproyect;
    }

}