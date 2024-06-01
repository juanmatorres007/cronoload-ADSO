<?php

include "../controller/imgController.php";

extract($_REQUEST);

$imgController = new ImgController();

if(isset($_POST["submit"])){
  $targetDir = "../img/imgPrueba/";
  $targetFile = $targetDir. basename($_FILES["photo"]["name"]);
  $uploadOk = 1;
  $imgFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  if($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg" && $imgFileType != "gif" 
  && $imgFileType != "jfif"
  ){
    echo "Lo sentimos, solo se permiten archivos JPG, JPEG, PNG Y GIF";
    $uploadOk = 0;
  }  

if($uploadOk == 0){
  echo "Lo sentimos, tu archivo no fue subido correctamente";
}else{
  if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
    echo "El archivo ". basename( $_FILES["photo"]["name"]). " ha sido subido correctamente";
    $rutaImagen = $targetDir . basename($_FILES["photo"]["name"]);

  } else {
    echo "El archivo ". basename( $_FILES["photo"]["name"]). " no ha podido ser subido";
  }
} 

$imgController->uploadImg($rutaImagen);
$imgController->getImg($rutaImagen);

}