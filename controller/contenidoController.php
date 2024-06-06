<?php
include_once "../conexion/conexion.php";

class ContenidoController{

  public function view1(){
    include '../view/headerContenido.php';
  }

    public function view2(){
      include "../view/sideBar.php";
    }

        public function view3(){
          include "../view/Registros/perfil.php";
        }

          public function view4(){
            include "../view/Registros/registro.php";
          }

              public function view5(){
                include "../view/prueba.php";
              }
}