<?php
require_once "autoloader.php";

$patient = new GestionPatient("data_patient.csv");

if (count($_POST) > 0) {
    $patient->insert($_POST);
    header("location: index_patient.php"); 
}     
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add visits</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 5%;
        padding: 20px;
        background-color: #34495e;
    }

    h1 {
        font-family: Arial, sans-serif;
        font-size: 35px;
        text-align: center;
        color:white;    
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        background-color: wheat;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    input,
    select {
        width: 100%;
        padding: 10px; 
        margin-bottom: 16px;
        box-sizing: border-box;
        border: 1px solid #ddd; 
        border-radius: 4px; 
    }

    button {
        background-color: #e74c3c;
        color: white;
        padding: 12px 20px; /
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        background-color: red;
    }

    </style>
</head>

<body>
    <h1>Add Patient</h1>
    <form id="form_x" class="class_x" method="post" action="add_patient.php?">
        <label for="Id">Id:</label>
        <input type="text" id="Id" name="Id" value="" >

        <label for="Name">Name:</label>
        <input type="text" id="Name" name="Name" value="">

        <label for="Town">Town:</label>
        <input type="text" id="Town" name="Town" value="">

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="">


        <button type="submit">Submit</button>
    </form>
</body>

</html>
