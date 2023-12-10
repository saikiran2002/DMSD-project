<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include('navbar.php'); ?>
<div class='page'>
    <h1>Asset Management</h1>

    <?php
    function generateEntityButtons($entity) {
        return "<td><a href='asset_management_$entity.php?entity=$entity&action=insert' class='button'>Insert</a> 
                <a href='asset_management_$entity.php?entity=$entity&action=view' class='button'>View</a></td>";
                //  <a href='asset_management_$entity.php?entity=$entity&action=update' class='button'>Update</a> 
    }

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
