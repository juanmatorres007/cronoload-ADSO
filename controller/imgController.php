<?php
include_once "../conexion/conexion.php";
include_once "../model/imgModel.php";

class ImgController{

    public function uploadImg($rutaImagen){
        $loadImg = new imgModel();
        $rta_img = $loadImg->veriImg($rutaImagen);
        echo "Img succes";
    }

    public function getImg($rutaImagen){    
        $getImg = new imgModel();
        $get_img = $getImg->getImg($rutaImagen);
        include "../view/pruebaImg.php";
    }   
}