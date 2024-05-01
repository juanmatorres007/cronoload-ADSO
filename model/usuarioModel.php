<?php

class UsuarioModel{


  private $conn;

    public function __construct(){
        $this->db();
    }

    public function db(){
        $this->conn = conectaDb();
    }

  public function update(){

  }
}