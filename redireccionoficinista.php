<?php
session_start();
require_once "controllers/controlleroficinista.php";
require_once "servicios/modeloficinista.php";

$mvc = new MvcController();

$mvc -> plantillaoficinista(); 

?>