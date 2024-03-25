<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add visits</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin-top: 20px;
            padding: 8px;
            text-align: left;
        }

        table {
            border: 2px solid #A40808;
            background-color: #EEE7DB;
            width: 100%;
            border-radius: 8px;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #A40808;
            color: white;
        }

        a {
            font-size: 30px;
            color: red;
            text-decoration: underline;
            font-size: 15px;
            margin: 10px;
        }

        button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            color: #ffffff;
            background-color: #EEE7DB;
            border: 2px solid red;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: salmon;
        }

        button:active {
            background-color: salmon;
        }

        .container {
            width: 80%;
            margin: 0px auto;
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
</head>

<body>
    <header>
        <div class="container">
            <h1>Clinica Saca-Muelas </h1>
            <nav>
                <ul>
                    <li><a href="index.php">Visit</a></li>
                    <li><a href="index_patient.php">Patient</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <?php
    require_once "autoloader.php";

    $patientId = '';

    $gestion = new GestionVisits("data.csv");
    $visits = $gestion->getVisit();
    
    $totalInvoices = 0;
    $totalPaidAmount = 0;
    $totalUnpaidAmount = 0;
    $totalBalance = 0;
    $totalPaidVisits = 0;
    $totalUnpaidVisits = 0;
    $totalPatients = 0;
    $totalFullyPaidPatients = 0;
    $totalPartiallyPaidPatients = 0;

    foreach ($gestion->visit as $visit) {
        $totalInvoices += $visit->getAmount();

        if ($visit->getPaid() == 'True') {
            $totalPaidAmount += $visit->getAmount();
            $totalPaidVisits++;
        } else {
            $totalUnpaidAmount += $visit->getAmount();
            $totalUnpaidVisits++;
        }
    
    
        $totalBalance = $totalUnpaidAmount-$totalPaidAmount;
 
        $totalPatients++;

        $allVisitsPaid = true;
        foreach ($gestion->visit as $visit) {
            if ($visit->getPatient() == $patientId  && $visit->getPaid() == 'False') {
                $allVisitsPaid = false;
                break;
            }
        }
        if ($allVisitsPaid) {
            $totalFullyPaidPatients++;
        } else {
            $totalPartiallyPaidPatients++;
        }
    }
    
    ?>

    <table>
        <tr>
            <th>Description</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Total € in invoices</td>
            <td><?php echo $totalInvoices; ?></td>
        </tr>
        <tr>
            <td>Total € of paid visits</td>
            <td><?php echo $totalPaidAmount; ?></td>
        </tr>
        <tr>
            <td>Total € of unpaid visits</td>
            <td><?php echo $totalUnpaidAmount; ?></td>
        </tr>
        <tr>
            <td>Total balance</td>
            <td><?php echo $totalBalance; ?></td>
        </tr>
        <tr>
            <td>Number of paid visits</td>
            <td><?php echo $totalPaidVisits; ?></td>
        </tr>
        <tr>
            <td>Number of unpaid visits</td>
            <td><?php echo $totalUnpaidVisits; ?></td>
        </tr>
        <tr>
            <td>Total patients</td>
            <td><?php echo $totalPatients; ?></td>
        </tr>
        <tr>
            <td>Total patients with all visits paid</td>
            <td><?php echo $totalFullyPaidPatients; ?></td>
        </tr>
        <tr>
            <td>Total patients with some visits unpaid</td>
            <td><?php echo $totalPartiallyPaidPatients; ?></td>
        </tr>
    </table>
    <br>
</body>

</html>
