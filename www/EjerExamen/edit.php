<?php
require_once "autoloader.php";
$visita = new GestionVisits("data.csv");
$id = isset($_GET['id']) ? $_GET['id'] : null;
$visit = $visita->getClient($id);
if (count($_POST) > 0) {
    $visita ->update($_POST);
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update visit</title>
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
    <h1>Update visit</h1>
    <form id="form_x" class="class_x" method="post" action="edit.php?id=<?= $id ?>">
        <label for="Patient">Id:</label>
        <input type="text" id="Patient" name="Patient" value="<?= $visit->getPatient(); ?>" readonly>

        <label for="Amount">Account:</label>
        <input type="number" id="Amount" name="Amount" value="<?= $visit->getAmount(); ?>">

        <label for="Date">Date:</label>
        <input type="Date" id="Date" name="Date" value="<?= $visit->getDate(); ?>">

        <label for="Paid">Active:</label>
        <select id="Paid" name="Paid">

        <option value="True" <?= $visit->getPaid() == 'True' ? 'selected' : ''; ?>>Yes</option>
        <option value="False" <?= $visit->getPaid() == 'False' ? 'selected' : ''; ?>>No</option>
        </select>

        <button type="submit">Guardar Cambios</button>
    </form>
</body>

</html>
