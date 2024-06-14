<?php
 function conectaDb() {
    try 
       {
        $conn = new PDO('mysql:host=localhost;dbname=programador2', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
       }

    catch(PDOException $e){
        echo "Error: en la conexion ".$e->getMessage();
    }
 }