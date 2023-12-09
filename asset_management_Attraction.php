<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attractions</title>
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
        echo "<div class='container mt-4'>";
        echo "<h1 class='text-center'>Insert Attraction</h1>";
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            handleInsertAttraction();
        } else {
            displayInsertForm();
        }
    
        echo "</div>";
    
        break;

    case 'update':

        if (isset($_GET['id'])) {
            $revenueTypeID = mysqli_real_escape_string($conn, $_GET['id']);
    
            $query = "SELECT * FROM animal_show WHERE Revenue_type_ID = '$revenueTypeID'";
            $result = mysqli_query($conn, $query);
    
            if ($result) {
                $row = mysqli_fetch_assoc($result);
    
                displayAnimalShowUpdateForm($row);
    
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    handleAnimalShowUpdate($revenueTypeID);
                }
            } else {
                echo "<p>Error fetching Animal Show data: " . mysqli_error($conn) . "</p>";
            }
        } else {
            echo "<p>No Revenue Type ID provided for update.</p>";
        }
    
        break;

    case 'view':
        echo "<div class='container mt-4'>";
        echo "<h1 class='text-center'>View Attractions</h1>";
    
        $result = mysqli_query($conn, "SELECT * FROM animal_show");
    
        if ($result) {
            echo "<table class='table table-bordered table-hover mt-3'>";
            echo "<thead>";
            echo "<tr><th>Attraction ID</th><th>Senior Price($)</th><th>Adult Price($)</th><th>Child Price($)</th><th>Number Per Day(Events)</th><th>Action</th></tr>";
            echo "</thead>";
            echo "<tbody>";
    
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['Revenue_type_ID']}</td>";
                echo "<td>{$row['SeniorPrice']}</td>";
                echo "<td>{$row['AdultPrice']}</td>";
                echo "<td>{$row['ChildPrice']}</td>";
                echo "<td>{$row['No_perday']}</td>";
                echo "<td><a href='asset_management_attraction.php?action=update&id={$row['Revenue_type_ID']}' class='btn btn-primary'>Update</a></td>";
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
function handleInsertAttraction() {
    global $conn;

    $revenueTypeID = mysqli_real_escape_string($conn, $_POST['revenueTypeID']);
    $seniorPrice = mysqli_real_escape_string($conn, $_POST['seniorPrice']);
    $adultPrice = mysqli_real_escape_string($conn, $_POST['adultPrice']);
    $childPrice = mysqli_real_escape_string($conn, $_POST['childPrice']);
    $numberPerDay = mysqli_real_escape_string($conn, $_POST['numberPerDay']);

    $sql = "INSERT INTO Animal_show (Revenue_type_ID, SeniorPrice, AdultPrice, ChildPrice, No_perday) 
            VALUES ('$revenueTypeID', '$seniorPrice', '$adultPrice', '$childPrice', '$numberPerDay')";

    if (mysqli_query($conn, $sql)) {
        echo "<p class='text-success'>Animal Show inserted successfully</p>";
    } else {
        echo "<p class='text-danger'>Error: " . mysqli_error($conn) . "</p>";
    }
}
function displayInsertForm() {
    echo "<form method='post' action='asset_management_Attraction.php?action=insert'>";
    echo "<div class='form-group'>";
    echo "<label for='revenueTypeID'>Revenue Type ID:</label>";
    echo "<input type='text' class='form-control' name='revenueTypeID' required>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<label for='seniorPrice'>Senior Price:</label>";
    echo "<input type='text' class='form-control' name='seniorPrice' required>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<label for='adultPrice'>Adult Price:</label>";
    echo "<input type='text' class='form-control' name='adultPrice' required>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<label for='childPrice'>Child Price:</label>";
    echo "<input type='text' class='form-control' name='childPrice' required>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<label for='numberPerDay'>Number Per Day:</label>";
    echo "<input type='text' class='form-control' name='numberPerDay' required>";
    echo "</div>";
    echo "<button type='submit' class='btn btn-primary'>Insert Animal Show</button>";
    echo "</form>";
}
function displayAnimalShowUpdateForm($animalShowData) {
    echo "<form method='post' action='asset_management_Attraction.php?action=update&id={$animalShowData['Revenue_type_ID']}' style='max-width: 400px; margin: auto;'>
        <h2>Update Animal Show</h2>

        <input type='hidden' name='revenueTypeID' value='{$animalShowData['Revenue_type_ID']}'>
        
        <label for='seniorPrice'>Senior Price:</label>
        <input type='text' id='seniorPrice' name='seniorPrice' value='{$animalShowData['SeniorPrice']}' required>

        <label for='adultPrice'>Adult Price:</label>
        <input type='text' id='adultPrice' name='adultPrice' value='{$animalShowData['AdultPrice']}' required>

        <label for='childPrice'>Child Price:</label>
        <input type='text' id='childPrice' name='childPrice' value='{$animalShowData['ChildPrice']}' required>

        <label for='numberPerDay'>Number Per Day:</label>
        <input type='text' id='numberPerDay' name='numberPerDay' value='{$animalShowData['No_perday']}' required>

        <input type='submit' value='Update Animal Show' class='button'>
    </form>";
}
function handleAnimalShowUpdate($revenueTypeID) {
    global $conn;

    $seniorPrice = mysqli_real_escape_string($conn, $_POST['seniorPrice']);
    $adultPrice = mysqli_real_escape_string($conn, $_POST['adultPrice']);
    $childPrice = mysqli_real_escape_string($conn, $_POST['childPrice']);
    $numberPerDay = mysqli_real_escape_string($conn, $_POST['numberPerDay']);

    $updateQuery = "UPDATE animal_show SET 
                    SeniorPrice = '$seniorPrice', 
                    AdultPrice = '$adultPrice', 
                    ChildPrice = '$childPrice', 
                    No_perday = '$numberPerDay'
                    WHERE Revenue_type_ID = '$revenueTypeID'";

    if (mysqli_query($conn, $updateQuery)) {
        echo "<p class='text-success'>Animal Show updated successfully.</p>";
        echo "<script>
            setTimeout(function() {
                window.location.href = 'asset_management_Attraction.php?action=view';
            }, 1000);
        </script>";
    } else {
        echo "<p class='text-danger'>Error updating Animal Show: " . mysqli_error($conn) . "</p>";
    }
}

?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>