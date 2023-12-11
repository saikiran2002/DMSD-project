<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
        }

        .animal-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            max-width: 300px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .animal-container h3 {
            color: #555;
            margin-bottom: 10px;
        }

        .animal-info {
            margin-bottom: 15px;
        }

        .animal-info p {
            margin: 0;
            color: #777;
        }

        hr {
            border-top: 1px solid #eee;
        }
    </style>
</head>
<body>

<?php
    include("db.php");
    $sql = "SELECT species.NAME AS animal_name, COUNT(observes.visitor_ID) AS observation_count
            FROM observes
            JOIN animal ON observes.animal_ID = animal.ID
            JOIN species ON animal.SpeciesID = species.ID
            GROUP BY species.NAME
            ORDER BY observation_count DESC
            LIMIT 3";

    $result = $conn->query($sql);

    $topAnimals = array();

    while ($row = $result->fetch_assoc()) {
        $topAnimals[] = $row;
    }
    echo "<h2>Menu:</h2>";
    echo "<ol>";
    echo "<li><a href='asset_management.php'>Asset Management</a></li>";
    echo "<li><a href='daily_zoo_activity.php'>Daily Zoo Activity</a></li>";
    echo "<li><a href='management_reporting.php'>Management and Reporting</a></li>";
    echo "</ol>";
?>
<div class="animal_container">
    <?php if (!empty($topAnimals)): ?>
        <h3>Top 3 Most Popular Animals:</h3>
        <?php foreach ($topAnimals as $animal): ?>
            <div class="animal-info">
                <p><?= $animal['animal_name'] ?></p>
            </div>
            <hr>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No results</p>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>