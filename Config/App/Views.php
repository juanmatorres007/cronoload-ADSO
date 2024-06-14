<?php
class Views{

    public function getView($controlador, $vista, $data="")
    {
        $controlador = get_class($controlador);
        if ($controlador == "Home") {
            $vista = "view/".$vista.".php";
        }else{
            $vista = "view/".$controlador."/".$vista.".php";
        }
        require $vista;
    }
}


?>