<?php
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">';
include("navbar.php");
include("db.php");
$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'daily_revenue_report':
        echo "<div class='container mt-5'>";
        echo "<div class='row justify-content-center align-items-center'>";
        echo "<div class='col-md-6'>";
        echo "<h2 class='mb-4 text-center'>Daily Revenue Report</h2>";
        echo "<form method='post' action='functions.php?action=daily_revenue_report'>"; 
        echo "<div class='mb-3'>";
        echo "<label for='report_date' class='form-label'>Select a Date:</label>";
        echo "<input type='date' id='report_date' name='report_date' class='form-control' required>";
        echo "</div>";
        echo "<div class='d-grid'>";
        echo "<input type='submit' value='Generate Report' class='btn btn-primary'>";
        echo "</div>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $selectedDate = mysqli_real_escape_string($conn, $_POST['report_date']);
    
            $query = "SELECT r.TYPE AS source, SUM(e.Revenue) AS total_revenue
                      FROM RevenueTypes r
                      LEFT JOIN RevenueEvents e ON r.ID = e.Revenue_types_ID
                      WHERE e.Date_time = '$selectedDate'
                      GROUP BY r.TYPE
                      ORDER BY total_revenue DESC";
    
            $result = mysqli_query($conn, $query);
    
            if ($result) {
                echo "<div class='row justify-content-center mt-4'>";
                echo "<div class='col-md-6'>";
                echo "<div class='container mt-4'>";
                echo "<h2>Daily Revenue Report - $selectedDate</h2>";
                echo "<table class='table table-bordered table-hover mt-3'>";
                echo "<thead>";
                echo "<tr><th>Source</th><th>Total Revenue</th></tr>";
                echo "</thead>";
                echo "<tbody>";
    
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['source']}</td>";
                    echo "<td>{$row['total_revenue']}</td>";
                    echo "</tr>";
                }
    
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "<p class='text-danger text-center mt-3'>Error fetching data: " . mysqli_error($conn) . "</p>";
            }
        }
        echo "</div>";
        break;
    

    case 'animal_population_report':
        echo "<div class='container mt-4'>";
        echo "<h2>Animal Population Report</h2>";

        $result = mysqli_query($conn, "
            SELECT
                s.NAME AS species,
                a.status1 AS status,
                COUNT(*) AS total_population,
                SUM(s.FoodCost) AS total_food_cost,
                (SELECT SUM(h.Rate * 160) FROM employee e JOIN cares_for cf ON e.ID = cf.employee_id JOIN Hourly_rate h ON e.Hourly_rate_ID = h.ID WHERE e.jobtype = 'Vet' AND cf.species_id = s.ID) AS total_veterinarian_cost,
                (SELECT SUM(h.Rate * 160) FROM employee e JOIN cares_for cf ON e.ID = cf.employee_id JOIN Hourly_rate h ON e.Hourly_rate_ID = h.ID WHERE e.jobtype = 'ACS' AND cf.species_id = s.ID) AS total_acs_cost
            FROM
                Species s
            LEFT JOIN
                animal a ON s.ID = a.SpeciesID
            GROUP BY
                s.NAME, a.status1;
        ");

        if ($result) {
            echo "<table class='table table-bordered table-hover mt-3'>";
            echo "<thead>";
            echo "<tr><th>Species</th><th>Status</th><th>Total Population</th><th>Total Food Cost</th><th>Total Veterinarian Cost</th><th>Total ACS Cost</th></tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['species']}</td>";
                echo "<td>{$row['status']}</td>";
                echo "<td>{$row['total_population']}</td>";
                echo "<td>{$row['total_food_cost']}</td>";
                echo "<td>".($row['total_veterinarian_cost']!==null ? $row['total_veterinarian_cost']:'-')."</td>";
                echo "<td>".($row['total_acs_cost']!==null ? $row['total_acs_cost']:'-')."</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p class='text-danger text-center mt-3'>Error fetching data: " . mysqli_error($conn) . "</p>";
        }

        echo "</div>";
        break;

    case 'top_attractions_report':
        echo "<div class='container mt-4'>";
        echo "<h2 class='text-center'>Top Attractions Report</h2>";
        echo "<form method='post' action='functions.php?action=top_attractions_report' class='mx-auto' style='max-width: 300px;'>";
        echo "<div class='mb-3'>";
        echo "<label for='start_date' class='form-label'>Start Date:</label>";
        echo "<input type='date' id='start_date' name='start_date' class='form-control' required>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='end_date' class='form-label'>End Date:</label>";
        echo "<input type='date' id='end_date' name='end_date' class='form-control' required>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<input type='submit' value='Generate Report' class='btn btn-primary'>";
        echo "</div>";
        echo "</form>";
        echo "</div>";


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $startDate = mysqli_real_escape_string($conn, $_POST['start_date']);
            $endDate = mysqli_real_escape_string($conn, $_POST['end_date']);

            $query = "SELECT r.NAME AS attraction, SUM(e.Revenue) AS total_revenue
                    FROM RevenueTypes r
                    LEFT JOIN RevenueEvents e ON r.ID = e.Revenue_types_ID
                    WHERE r.TYPE = 'AS' AND e.Date_time BETWEEN '$startDate' AND '$endDate'
                    GROUP BY r.NAME
                    ORDER BY total_revenue DESC
                    LIMIT 3";

            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<div class='container mt-4'>";
                echo "<h2>Top Attractions Report - $startDate to $endDate</h2>";
                echo "<table class='table table-bordered table-hover mt-3'>";
                echo "<thead>";
                echo "<tr><th>Attraction</th><th>Total Revenue</th></tr>";
                echo "</thead>";
                echo "<tbody>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['attraction']}</td>";
                    echo "<td>{$row['total_revenue']}</td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
                echo "</div>";
            } else {
                echo "<p class='text-danger text-center mt-3'>Error fetching data: " . mysqli_error($conn) . "</p>";
            }
        }
        break;


    case 'best_days_report':
        echo "<div class='container mt-4'>";
        echo "<h2 class='text-center'>Best Days Report</h2>";
        echo "<form method='post' action='functions.php?action=best_days_report' class='mx-auto' style='max-width: 300px;'>";
        echo "<div class='mb-3'>";
        echo "<label for='selected_month' class='form-label'>Select a Month:</label>";
        echo "<input type='month' id='selected_month' name='selected_month' class='form-control' required>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<input type='submit' value='Generate Report' class='btn btn-primary'>";
        echo "</div>";
        echo "</form>";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $selectedMonth = mysqli_real_escape_string($conn, $_POST['selected_month']);

            $query = "
                SELECT DATE_FORMAT(Date_time, '%Y-%m-%d') AS event_date, SUM(Revenue) AS total_revenue
                FROM RevenueEvents e
                JOIN RevenueTypes r ON e.Revenue_types_ID = r.ID
                WHERE DATE_FORMAT(Date_time, '%Y-%m') = '$selectedMonth'
                GROUP BY event_date
                ORDER BY total_revenue DESC
                LIMIT 5
            ";

            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<table class='table table-bordered table-hover mt-3'>";
                echo "<thead>";
                echo "<tr><th>Event Date</th><th>Total Revenue</th></tr>";
                echo "</thead>";
                echo "<tbody>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['event_date']}</td>";
                    echo "<td>{$row['total_revenue']}</td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p class='text-danger text-center mt-3'>Error fetching data: " . mysqli_error($conn) . "</p>";
            }
        }

        echo "</div>";

        break;

    case 'average_revenue_report':
        echo "<div class='container mt-4'>";
        echo "<h2 class='text-center'>Average Revenue Report</h2>";
        echo "<form method='post' action='functions.php?action=average_revenue_report' class='mx-auto' style='max-width: 300px;'>";
        echo "<div class='mb-3'>";
        echo "<label for='start_date' class='form-label'>Start Date:</label>";
        echo "<input type='date' id='start_date' name='start_date' class='form-control' required>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<label for='end_date' class='form-label'>End Date:</label>";
        echo "<input type='date' id='end_date' name='end_date' class='form-control' required>";
        echo "</div>";
        echo "<div class='mb-3'>";
        echo "<input type='submit' value='Generate Report' class='btn btn-primary'>";
        echo "</div>";
        echo "</form>";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $startDate = mysqli_real_escape_string($conn, $_POST['start_date']);
            $endDate = mysqli_real_escape_string($conn, $_POST['end_date']);

            $query = "
                SELECT r.TYPE AS source, ROUND(AVG(e.Revenue),2) AS average_revenue
                FROM RevenueEvents e
                JOIN RevenueTypes r ON e.Revenue_types_ID = r.ID
                WHERE e.Date_time BETWEEN '$startDate' AND '$endDate'
                GROUP BY r.TYPE DESC
            ";

            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<div style='max-width: 500px; margin: auto;'>";
                echo "<table class='table table-bordered table-hover mt-3'>";
                echo "<thead>";
                echo "<tr><th>Source</th><th>Average Revenue($)</th></tr>";
                echo "</thead>";
                echo "<tbody>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['source']}</td>";
                    echo "<td>{$row['average_revenue']}</td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
                echo "</div>";

            } else {
                echo "<p class='text-danger text-center mt-3'>Error fetching data: " . mysqli_error($conn) . "</p>";
            }
        }

        echo "</div>";

        break;

    default:
        echo "<p>Please select an action from the menu.</p>";
        break;
}
echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>';
?>
