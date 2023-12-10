<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include("db.php");
include("navbar.php");
echo "<div class='container mt-4 text-center'>";
echo "<h2>Attendance Report</h2>";

$result = mysqli_query($conn, "
    SELECT
        r.TYPE AS AttendanceType,
        SUM(e.Revenue) AS TotalRevenue,
        SUM(e.TicketSold) AS TotalTicketsSold
    FROM
        RevenueEvents e
    INNER JOIN
        RevenueTypes r ON e.Revenue_types_ID = r.ID
    WHERE
        r.TYPE IN ('AS', 'ZA', 'Conc')
    GROUP BY
        r.TYPE;
");

if ($result) {
    echo "<table class='table table-bordered table-hover mx-auto mt-3'>";
    echo "<thead>";
    echo "<tr><th>Attendance Type</th><th>Total Revenue</th><th>Total Tickets Sold</th></tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['AttendanceType']}</td>";
        echo "<td>{$row['TotalRevenue']}</td>";
        echo "<td>{$row['TotalTicketsSold']}</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p class='text-danger text-center mt-3'>Error fetching attendance data: " . mysqli_error($conn) . "</p>";
}

echo "</div>";


echo "</div>";
?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
