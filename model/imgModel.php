<?php

class ImgModel{
  private $conn;

    public function __construct(){
        $this->db();
    }

    public function db(){
        $this->conn = conectaDb();
    }

    public function veriImg($rutaImg){
      $sql = $this->conn->prepare("INSERT INTO img (name_img) VALUES (?)");

        $sql -> bindParam(1,$rutaImg);

        $rta_img = $sql -> execute();

        return $rta_img;
  }
  
  public function getImg($rutaImagen){
    $sql = $this -> conn -> prepare("SELECT * FROM img WHERE name_img=?");
         $sql -> bindParam(1,$rutaImagen);
         $sql -> execute();

         $img = $sql ->fetchAll(PDO::FETCH_ASSOC);

         return $img;
  }
}