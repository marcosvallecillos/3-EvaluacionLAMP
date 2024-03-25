<?php 
    require_once "autoloader.php";
    $visita = new GestionVisits('data.csv');
    $visita->delete(isset($_GET['id']) ? $_GET['id'] : null);
    header("location: index.php");
?>