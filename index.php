<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            flex-direction: column;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 50vh;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        ol {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }

        li {
            margin: 10px 0;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
            font-size: 18px;
            transition: color 0.3s ease-in-out;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>

<?php
    echo "<h2>Menu:</h2>";
    echo "<ol>";
    echo "<li><a href='asset_management.php'>Asset Management</a></li>";
    echo "<li><a href='daily_zoo_activity.php'>Daily Zoo Activity</a></li>";
    echo "<li><a href='management_reporting.php'>Management and Reporting</a></li>";
    echo "</ol>";
?>

</body>
</html>
