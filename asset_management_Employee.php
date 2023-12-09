<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
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
        displayEmployeeInsertForm();
    
        // Process the form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validate and sanitize input data
            $ID = mysqli_real_escape_string($conn, $_POST['ID']);
            $startDate = mysqli_real_escape_string($conn, $_POST['startDate']);
            $jobtype = mysqli_real_escape_string($conn, $_POST['jobtype']);
            $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
            $minit = mysqli_real_escape_string($conn, $_POST['minit']);
            $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
            $street = mysqli_real_escape_string($conn, $_POST['street']);
            $city = mysqli_real_escape_string($conn, $_POST['city']);
            $state = mysqli_real_escape_string($conn, $_POST['state']);
            $zip = mysqli_real_escape_string($conn, $_POST['zip']);
            $SuperID = ($_POST['SuperID'] !== '') ? mysqli_real_escape_string($conn, $_POST['SuperID']) : 'NULL';
            $Hourly_rate_ID = mysqli_real_escape_string($conn, $_POST['Hourly_rate_ID']);
            $ConcRevenueTypesID = mysqli_real_escape_string($conn, $_POST['ConcRevenueTypesID']);
            $ZARevenueTypesID = mysqli_real_escape_string($conn, $_POST['ZARevenueTypesID']);
            $sql = "INSERT INTO employee VALUES ($ID, '$startDate', '$jobtype', '$first_name', '$minit', '$last_name', '$street', '$city', '$state', $zip, $SuperID, $Hourly_rate_ID, $ConcRevenueTypesID, $ZARevenueTypesID)";
            if (mysqli_query($conn, $sql)) {
                echo "<p>Employee inserted successfully</p>";
            } else {
                echo "<p>Error: " . mysqli_error($conn) . "</p>";
            }
        }
    
        break;
    

    case 'update':
        echo "<h2>Update Employee</h2>";
    
        if (isset($_GET['id'])) {
            $employeeID = mysqli_real_escape_string($conn, $_GET['id']);
    
            $query = "SELECT * FROM employee WHERE ID = '$employeeID'";
            $result = mysqli_query($conn, $query);
    
            if ($result) {
                $row = mysqli_fetch_assoc($result);
    
                displayEmployeeUpdateForm($row);
    
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Validate and sanitize input data
                    $startDate = mysqli_real_escape_string($conn, $_POST['startDate']);
                    $jobtype = mysqli_real_escape_string($conn, $_POST['jobtype']);
                    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
                    $minit = mysqli_real_escape_string($conn, $_POST['minit']);
                    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
                    $street = mysqli_real_escape_string($conn, $_POST['street']);
                    $city = mysqli_real_escape_string($conn, $_POST['city']);
                    $state = mysqli_real_escape_string($conn, $_POST['state']);
                    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
                    $SuperID = mysqli_real_escape_string($conn, $_POST['SuperID']);
                    $Hourly_rate_ID = mysqli_real_escape_string($conn, $_POST['Hourly_rate_ID']);
                    $ConcRevenueTypesID = mysqli_real_escape_string($conn, $_POST['ConcRevenueTypesID']);
                    $ZARevenueTypesID = mysqli_real_escape_string($conn, $_POST['ZARevenueTypesID']);
    
                    // Perform the SQL update
                    $updateQuery = "UPDATE employee SET 
                                    startDate = '$startDate', 
                                    jobtype = '$jobtype', 
                                    first_name = '$first_name', 
                                    minit = '$minit', 
                                    last_name = '$last_name', 
                                    street = '$street', 
                                    city = '$city', 
                                    state = '$state', 
                                    zip = '$zip', 
                                    SuperID = " . ($SuperID !== '' ? $SuperID : 'NULL') . ",
                                    Hourly_rate_ID = '$Hourly_rate_ID', 
                                    ConcRevenueTypesID = '$ConcRevenueTypesID', 
                                    ZARevenueTypesID = '$ZARevenueTypesID' 
                                    WHERE ID = '$employeeID'";
    
                    if (mysqli_query($conn, $updateQuery)) {
                        echo "<p>Employee updated successfully.</p>";
                        echo "<script>
                            setTimeout(function() {
                                window.location.href = 'asset_management_employee.php?action=view';
                            }, 1000);
                        </script>";
                    } else {
                        echo "<p>Error updating employee: " . mysqli_error($conn) . "</p>";
                    }
                }
            } else {
                echo "<p>Error fetching employee data: " . mysqli_error($conn) . "</p>";
            }
        } else {
            echo "<p>No employee ID provided for update.</p>";
        }
        break;
        

    case 'view':
        echo "<div class='container mt-4'>";
        echo "<h1 class='text-center'>View Employees</h1>";
    
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
function displayEmployeeInsertForm() {
    echo "<form method='post' action='asset_management_employee.php?action=insert' style='max-width: 400px; margin: auto;'>
        <h2>Insert Employee</h2>
        
        <!-- Form fields for employee details -->
        <label for='ID'>Employee ID:</label>
        <input type='text' id='ID' name='ID' required>

        <label for='startDate'>Start Date:</label>
        <input type='date' id='startDate' name='startDate' required>
        
        <label for='jobtype'>Job Type:</label>
        <select id='jobtype' name='jobtype' required>
            <option value='Vet'>Vet</option>
            <option value='ACS'>ACS</option>
            <option value='Maint'>Maint</option>
            <option value='CS'>CS</option>
            <option value='TS'>TS</option>
        </select>
        
        <label for='first_name'>First Name:</label>
        <input type='text' id='first_name' name='first_name' required>
        
        <label for='minit'>Middle Initial:</label>
        <input type='text' id='minit' name='minit'>
        
        <label for='last_name'>Last Name:</label>
        <input type='text' id='last_name' name='last_name' required>
        
        <label for='street'>Street:</label>
        <input type='text' id='street' name='street'>
        
        <label for='city'>City:</label>
        <input type='text' id='city' name='city'>
        
        <label for='state'>State:</label>
        <input type='text' id='state' name='state'>
        
        <label for='zip'>zip Code:</label>
        <input type='number' id='zip' name='zip' title='Enter a valid 5-digit zip code' required>

        <label for='SuperID'>Supervisor ID:</label>
        <input type='number' id='SuperID' name='SuperID' default=null>
        
        <label for='Hourly_rate_ID'>Hourly Rate ID:</label>
        <input type='number' id='Hourly_rate_ID' name='Hourly_rate_ID'>
        
        <label for='ConcRevenueTypesID'>Concession Revenue Type ID:</label>
        <input type='number' id='ConcRevenueTypesID' name='ConcRevenueTypesID'>
        
        <label for='ZARevenueTypesID'>Zoo Admission Revenue Type ID:</label>
        <input type='number' id='ZARevenueTypesID' name='ZARevenueTypesID'>

        <input type='submit' value='Insert Employee' class='button'>
    </form>";
}
function displayEmployeeUpdateForm($employeeData) {
    echo "<form method='post' action='asset_management_employee.php?action=update&id={$employeeData['ID']}' style='max-width: 400px; margin: auto;'>
        <h2>Update Employee</h2>
        
        <label for='startDate'>Start Date:</label>
        <input type='date' id='startDate' name='startDate' value='{$employeeData['startDate']}' required>
        
        <label for='jobtype'>Job Type:</label>
        <select id='jobtype' name='jobtype' required>
            <option value='Vet' " . ($employeeData['jobtype'] == 'Vet' ? 'selected' : '') . ">Vet</option>
            <option value='ACS' " . ($employeeData['jobtype'] == 'ACS' ? 'selected' : '') . ">ACS</option>
            <option value='Maint' " . ($employeeData['jobtype'] == 'Maint' ? 'selected' : '') . ">Maint</option>
            <option value='CS' " . ($employeeData['jobtype'] == 'CS' ? 'selected' : '') . ">CS</option>
            <option value='TS' " . ($employeeData['jobtype'] == 'TS' ? 'selected' : '') . ">TS</option>
        </select>
        
        <label for='first_name'>First Name:</label>
        <input type='text' id='first_name' name='first_name' value='{$employeeData['first_name']}' required>
        
        <label for='minit'>Middle Initial:</label>
        <input type='text' id='minit' name='minit' value='{$employeeData['minit']}'>
        
        <label for='last_name'>Last Name:</label>
        <input type='text' id='last_name' name='last_name' value='{$employeeData['last_name']}' required>
        
        <label for='street'>Street:</label>
        <input type='text' id='street' name='street' value='{$employeeData['street']}'>
        
        <label for='city'>City:</label>
        <input type='text' id='city' name='city' value='{$employeeData['city']}'>
        
        <label for='state'>State:</label>
        <input type='text' id='state' name='state' value='{$employeeData['state']}'>
        
        <label for='zip'>zip Code:</label>
        <input type='number' id='zip' name='zip' title='Enter a valid 5-digit zip code' value='{$employeeData['zip']}' required>

        <label for='SuperID'>Supervisor ID:</label>
        <input type='number' id='SuperID' name='SuperID' value='{$employeeData['SuperID']}'>

        <label for='Hourly_rate_ID'>Hourly Rate ID:</label>
        <input type='number' id='Hourly_rate_ID' name='Hourly_rate_ID' value='{$employeeData['Hourly_rate_ID']}'>
        
        <label for='ConcRevenueTypesID'>Concession Revenue Type ID:</label>
        <input type='number' id='ConcRevenueTypesID' name='ConcRevenueTypesID' value='{$employeeData['ConcRevenueTypesID']}'>
        
        <label for='ZARevenueTypesID'>Zoo Admission Revenue Type ID:</label>
        <input type='number' id='ZARevenueTypesID' name='ZARevenueTypesID' value='{$employeeData['ZARevenueTypesID']}'>
        
        <input type='submit' value='Update Employee' class='button'>
    </form>";
}

?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>

