<?php
class MvcController{
    public function plantillaoficinista(){
        include "views/templateoficinista.php";
    }
    public function enlacesPaginasControllerOficinista(){
        if(isset($_GET["action"])){
            $enlacesController = $_GET ["action"];
        }else{
            $enlacesController = "home.php";
        }
        $respuesta = EnlacesPaginas ::enlacesPaginasModelOficinista($enlacesController);
        include $respuesta;
    }
}
?>