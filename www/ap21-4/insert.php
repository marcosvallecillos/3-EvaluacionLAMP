<?php
require_once "autoloader.php";
$visita = new Cartera();
if (count($_POST) > 0) {
    $visita ->insert($_POST);
    header("location: index.php");
} 
?>
<html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Campos</title>
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
    <h1>Actualizar Campos</h1>
    <form id="form_x" class="class_x" method="post" action="edit.php?id=<?= $id ?>">
        <label for="Id">Id:</label>
        <input type="text" id="Id" name="Id" value="<?= $cliente->getId(); ?>" readonly>

        <label for="company">Company:</label>
        <input type="text" id="company" name="company" value="<?= $cliente->getCompany(); ?>">

        <label for="Investment">Investment:</label>
        <input type="number" id="Investment" name="Investment" value="<?= $cliente->getInvestment(); ?>">

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" value="<?= $cliente->getDate(); ?>">

        <label for="active">Active:</label>
        <select id="active" name="active">
            
        <option value="True" <?= $cliente->getActive() == 'True' ? 'selected' : ''; ?>>Yes</option>
        <option value="False" <?= $cliente->getActive() == 'False' ? 'selected' : ''; ?>>No</option>
        </select>

        <button type="submit">Guardar Cambios</button>
    </form>
</body>

</html>
