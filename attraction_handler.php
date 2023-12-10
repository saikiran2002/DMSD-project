<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attraction Handler</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include('navbar.php'); ?>
    <?php include('db.php');?>
    <div class="container mt-4">
        <h1 class="text-center">Attraction Revenue</h1>

        <?php
    
        $action = isset($_GET['action']) ? $_GET['action'] : '';

        switch ($action) {
            case 'revenue':
                global $conn;

                $query = "
                    SELECT
                        r.Date_time,
                        r.Revenue,
                        r.TicketSold
                    FROM
                        revenueevents r
                    INNER JOIN
                        revenuetypes rt ON r.Revenue_types_ID = rt.ID
                    WHERE
                        rt.TYPE = 'AS'
                ";

                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo "<div class='container mt-4 d-flex align-items-center justify-content-center'>";
                    echo "<table class='table table-bordered'>";
                    echo "<thead class='thead-dark'>";
                    echo "<tr><th>Date</th><th>Revenue</th><th>Tickets Sold</th></tr>";
                    echo "</thead><tbody>";

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['Date_time']}</td>";
                        echo "<td>{$row['Revenue']}</td>";
                        echo "<td>{$row['TicketSold']}</td>";
                        echo "</tr>";
                    }

                    echo "</tbody></table>";
                    echo "</div>";

                } else {
                    echo "<p class='text-danger'>Error fetching revenue events: " . mysqli_error($conn) ."</p>";

                }
                break;

            default:
                echo "<p class='text-danger'>Invalid action selected.</p>";
                break;
        }
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>