<?php
require_once "autoloader.php";
$visita = new GestionVisits("data.csv");

$patientId = isset($_GET['patientId']) ? $_GET['patientId'] : null;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
    <title>Clinica Saca-Muelas</title>

</head>
	<style>
   body {
    font-family: Arial, sans-serif;
    margin: 10px;

}

.container {
    width: 80%;
    margin: 10px auto;
    overflow: hidden;
}

header {
    background-color: #333;
    color: #fff;
    margin-bottom: 10px;
    padding: 20px 0;
}

header h1 {
    margin: 0;
    padding: 0;
    float: left;
}

nav {
    float: right;
}

nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    display: inline-block;
    margin-left: 20px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 20px;
}

nav ul li a:hover {
    color: #ccc;
}



</style>
<body>
<header>
    <div class="container">
        <h1>Clinica Saca-Muelas </h1>
        <nav>
            <ul>
                <li><a href="index.php">Visit</a></li>
                <li><a href="index_patient.php" >Patient</a></li>
                <li><a href="global_data.php">Global Data</a></li>
            </ul>
        </nav>
    </div>
</header>


<table class="redTable">
    <thead>
        <tr>
            <th>Patient</th>
            <th>Account</th>
            <th>Date</th>
            <th>Paid</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody> 
        <?= $visita->drawListPatient($patientId) ?>
    </tbody> 
    <tfoot>
        <tr>
            <td colspan="5"></td>
        </tr>
    </tfoot>
</table>

	<br>
	<div>





</body>

</html>