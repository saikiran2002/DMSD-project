<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .page{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        h1 {
            color: #007BFF;
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
            width: 80%;
            max-width: 600px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        .button {
            display: inline-block;
            padding: 10px 15px;
            margin: 5px;
            text-decoration: none;
            color: #fff;
            background-color: #007BFF;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #0056b3;
        }
        p {
            text-align: center;
            margin-top: 20px;
        }

        p a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }

        p a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
<?php include('navbar.php'); ?>
<div class='page'>
    <h1>Asset Management</h1>

    <?php
    // Function to generate buttons for each entity
    function generateEntityButtons($entity) {
        return "<td><a href='asset_management_$entity.php?entity=$entity&action=insert' class='button'>Insert</a> 
                <a href='asset_management_$entity.php?entity=$entity&action=view' class='button'>View</a></td>";
                //  <a href='asset_management_$entity.php?entity=$entity&action=update' class='button'>Update</a> 
    }

    // Display table with buttons for each entity
    $entities = ['Animal', 'Building', 'Attraction', 'Employee', 'Employee_Hourly_Wage'];

    echo "<table>";
    echo "<tr><th>Table Name</th><th>Actions</th></tr>";

    foreach ($entities as $entity) {
        echo "<tr><td>$entity</td>" . generateEntityButtons($entity) . "</tr>";
    }

    echo "</table>";
    echo "<p><a href='index.php'>Home</a></p>"
    ?>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
