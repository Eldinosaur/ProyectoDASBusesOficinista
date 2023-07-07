<?php
$id_usuario = $_GET['id_usuario'];
$id_coop = $_GET['id_coop'];
session_start();
$_SESSION['id_usuario'] = $id_usuario;
$_SESSION['id_coop'] = $id_coop;
require_once "controllers/controlleroficinista.php";
require_once "servicios/modeloficinista.php";

$mvc = new MvcController();

$mvc -> plantillaoficinista(); 

?>