<?php
require_once "autoloader.php";

$patientId = new GestionPatient("data_patient.csv");
$id = isset($_GET['id']) ? $_GET['id'] : null;
$patient = $patientId->getClient($id);
if (count($_POST) > 0) {
    $patientId->update($_POST); 
    header("location: index_patient.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update patient</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 5%;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            font-family: Arial, sans-serif;
            font-size: 35px;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
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
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h1>Update patient</h1>
    <form id="form_x" class="class_x" method="post" action="edit_patient.php?id=<?= $id ?>">
        <label for="Id">Id:</label>
        <input type="text" id="Id" name="Id" value="<?= $patient->getId(); ?>" readonly>

        <label for="Name">Name:</label>
        <input type="text" id="Name" name="Name" value="<?= $patient->getName(); ?>">

        <label for="Town">Town:</label>
        <input type="text" id="Town" name="Town" value="<?= $patient->getTown(); ?>">

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?= $patient->getaddress(); ?>">


        <button type="submit">Submit</button>
    </form>
</body>

</html>
