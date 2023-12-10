<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Wages Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            width:50%;
            margin-left:25%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .table-hover tbody tr:hover {
            background-color: black;
        }
        .table thead th {
            background-color: #007BFF; 
            color: #fff; 
        }
        .insert {
            background-color: #e6f2ff;
        }

        h2 {
            color: #007BFF;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 10px;
        }
        td{
            text-align: center;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type='submit'] {
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
        }

        input[type='submit']:hover {
            background-color: #0056b3;
        }
        p {
            text-align: center;
            margin-top: 20px;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
<?php include('navbar.php'); ?>
<?php

include('db.php');

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'insert':
        displayEmployeeHourlyWageInsertForm();
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = mysqli_real_escape_string($conn, $_POST['id']);
            $rate = mysqli_real_escape_string($conn, $_POST['rate']);
    
            $sql = "INSERT INTO hourly_rate (ID, Rate) VALUES ('$id', '$rate')";
    
            if (mysqli_query($conn, $sql)) {
                echo "<p>Employee Hourly Wage inserted successfully</p>";
            } else {
                echo "<p>Error: " . mysqli_error($conn) . "</p>";
            }
        }
    
        break;
    
    

    case 'update':
        if (isset($_GET['id'])) {
            $employeeID = mysqli_real_escape_string($conn, $_GET['id']);
    
            $query = "SELECT * FROM hourly_rate WHERE ID = '$employeeID'";
            $result = mysqli_query($conn, $query);
    
            if ($result) {
                $row = mysqli_fetch_assoc($result);
    
                displayEmployeeHourlyWageUpdateForm($row);
    
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $rate = mysqli_real_escape_string($conn, $_POST['rate']);
    
                    $updateQuery = "UPDATE hourly_rate SET Rate = '$rate' WHERE ID = '$employeeID'";
    
                    if (mysqli_query($conn, $updateQuery)) {
                        echo "<p>Employee Hourly Wage updated successfully.</p>";
                        echo "<script>
                                setTimeout(function() {
                                    window.location.href = 'asset_management_Employee_Hourly_Wage.php?action=view';
                                }, 1000);
                                </script>";
                    } else {
                        echo "<p>Error updating Employee Hourly Wage: " . mysqli_error($conn) . "</p>";
                    }
                }
            } else {
                echo "<p>Error fetching Employee Hourly Wage data: " . mysqli_error($conn) . "</p>";
            }
        } else {
            echo "<p>No Employee ID provided for update.</p>";
        }
        break;
        

    case 'view':
        echo "<div class='container mt-4'>";
        echo "<h1 class='text-center'>View Employee Hourly Wages</h1>";

        $result = mysqli_query($conn, "SELECT * FROM hourly_rate");

        if ($result) {
            echo "<div class='container d-flex justify-content-center'>";
            echo "<table class='table table-bordered table-hover mt-3' style='max-width: 300px;'>";
            echo "<thead>";
            echo "<tr><th>ID</th><th>Rate</th><th>Action</th></tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['ID']}</td>";
                echo "<td>{$row['Rate']}</td>";
                echo "<td><a href='asset_management_Employee_Hourly_Wage.php?action=update&id={$row['ID']}' class='btn btn-primary'>Update</a></td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            echo "</div>";


        } else {
            echo "<p class='text-danger text-center mt-3'>Error fetching data: " . mysqli_error($conn) . "</p>";
        }
        $result = mysqli_query($conn, "SELECT * FROM employee");
    
        if ($result) {
            echo "<table class='table table-bordered table-hover mt-3'>";
            echo "<thead>";
            echo "<tr><th>Employee ID</th><th>Start Date</th><th>Job Type</th><th>First Name</th><th>Middle Initial</th><th>Last Name</th><th>Street</th><th>City</th><th>State</th><th>zip Code</th><th>Supervisor ID</th><th>Hourly Rate ID</th><th>Concession Revenue Type ID</th><th>Zoo Admission Revenue Type ID</th><th>Action</th></tr>";
            echo "</thead>";
            echo "<tbody>";
    
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['ID']}</td>";
                echo "<td>{$row['startDate']}</td>";
                echo "<td>{$row['jobtype']}</td>";
                echo "<td>{$row['first_name']}</td>";
                echo "<td>{$row['minit']}</td>";
                echo "<td>{$row['last_name']}</td>";
                echo "<td>{$row['street']}</td>";
                echo "<td>{$row['city']}</td>";
                echo "<td>{$row['state']}</td>";
                echo "<td>" . str_pad($row['zip'], 5, '0', STR_PAD_LEFT) . "</td>";
                echo "<td>" . ($row['SuperID'] !== null ? $row['SuperID'] : '-') . "</td>";
                echo "<td>{$row['Hourly_rate_ID']}</td>";
                echo "<td>{$row['ConcRevenueTypesID']}</td>";
                echo "<td>{$row['ZARevenueTypesID']}</td>";
                echo "<td><a href='asset_management_Employee.php?action=update&id={$row['ID']}' class='btn btn-primary'>Update</a></td>";
                echo "</tr>";
            }
    
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p class='text-danger text-center mt-3'>Error fetching data: " . mysqli_error($conn) . "</p>";
        }

        echo "</div>";

        break;


    default:
        echo "Invalid action.";
        break;
}
function displayEmployeeHourlyWageInsertForm() {
    echo "<form method='post' action='asset_management_Employee_Hourly_Wage.php?action=insert' style='max-width: 400px; margin: auto;'>
        <h2>Insert Employee Hourly Wage</h2>
        
        <label for='id'>ID:</label>
        <input type='text' id='id' name='id' required>
        
        <label for='rate'>Rate:</label>
        <input type='text' id='rate' name='rate' required>
        
        <input type='submit' value='Insert' class='button'>
    </form>";
}
function displayEmployeeHourlyWageUpdateForm($employeeHourlyWageData) {
    echo "<form method='post' action='asset_management_Employee_Hourly_Wage.php?action=update&id={$employeeHourlyWageData['ID']}' style='max-width: 400px; margin: auto;'>
            <h2>Update Employee Hourly Wage</h2>

            <label for='rate'>Hourly Rate:</label>
            <input type='text' id='rate' name='rate' value='{$employeeHourlyWageData['Rate']}' required>

            <input type='submit' value='Update Employee Hourly Wage' class='button'>
          </form>";
}

?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>

