<?php 
    require_once "autoloader.php";
    $patient = new GestionPatient('data_patient.csv');
    $patient->delete(isset($_GET['id']) ? $_GET['id'] : null);
    header("location: index_patient.php");
?>