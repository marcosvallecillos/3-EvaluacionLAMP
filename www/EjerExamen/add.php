<?php
require_once "autoloader.php";
$visita = new GestionVisits("data.csv");
if (count($_POST) > 0) {
    $visita ->insert($_POST);
    header("location: index.php");
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
    <h1>Add visits</h1>
    
    <form id="form_x" class="class_x" method="post" action="add.php?">
        <label for="Patient">Id:</label>
        <input type="text" id="Patient" name="Patient" value="">

        <label for="Amount">Amount:</label>
        <input type="number" id="Amount" name="Amount" value="">

        <label for="Date">Date:</label>
        <input type="Date" id="Date" name="Date" value="">

        <label for="Paid">Active:</label>
        <select id="Paid" name="Paid">

        <option value="True">Yes</option>
        <option value="False">No</option>
        </select>

        <button type="submit">Guardar Cambios</button>
    </form>
</body>

</html>