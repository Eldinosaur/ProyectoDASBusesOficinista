<?php
class EnlacesPaginas
{
    public static function enlacesPaginasModelOficinista($enlacesModel)
    {
        if($enlacesModel == "buses" ||
            $enlacesModel == "frequencies" ||
            $enlacesModel == "sales" ||
            $enlacesModel == "validation" ||
            $enlacesModel == "newbus" ||
            $enlacesModel == "newsale" ||
            $enlacesModel == "validationform" ||
            $enlacesModel == "userprofile" ||
            $enlacesModel == "newpassword" ||
            $enlacesModel == "userform" ||
            $enlacesModel == "updatebus" ||
            $enlacesModel == "updatefrequency" ||
            $enlacesModel == "trips" ||
            $enlacesModel == "tripsform"||
            $enlacesModel == "socios" ||
            $enlacesModel == "newsocio" ||
            $enlacesModel == "seats" ||
            $enlacesModel == "parada"){
                $module = "views/modules/".$enlacesModel."oficinista.php";
            }else{
            $module = "views/modules/home.php";
        }
        return $module;
    }
}
?>