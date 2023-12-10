<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Building Management</title>
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
        echo "<h2>Inserting action on Building</h2>";
        displayBuildingInsertForm();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $ID = mysqli_real_escape_string($conn,$_POST['ID']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $type = mysqli_real_escape_string($conn, $_POST['type']);

            $sql = "INSERT INTO building VALUES ('$ID','$name', '$type')";

            if (mysqli_query($conn, $sql)) {
                echo "<p>Building inserted successfully</p>";
            } else {
                echo "<p>Error: " . mysqli_error($conn) . "</p>";
            }
        }

        break;

    case 'update':
        echo "<h2>Building</h2>";
        if (isset($_GET['id'])) {
            $buildingID = mysqli_real_escape_string($conn, $_GET['id']);

            $query = "SELECT * FROM building WHERE ID = '$buildingID'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);

                displayBuildingUpdateForm($row);

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = mysqli_real_escape_string($conn, $_POST['name']);
                    $type = mysqli_real_escape_string($conn, $_POST['type']);
                    
                    $updateQuery = "UPDATE building SET 
                                    NAME = '$name', 
                                    Type = '$type'
                                    WHERE ID = '$buildingID'";

                    if (mysqli_query($conn, $updateQuery)) {
                        echo "<p>Building updated successfully.</p>";
                        echo "<script>
                            setTimeout(function() {
                                window.location.href = 'asset_Management_building.php?action=view';
                            }, 1000);
                        </script>";
                    } else {
                        echo "<p>Error updating building: " . mysqli_error($conn) . "</p>";
                    }
                }
            } else {
                echo "<p>Error fetching building data: " . mysqli_error($conn) . "</p>";
            }
        } else {
            echo "<p>No building ID provided for update.</p>";
        }
        break;


    case 'view':
        echo "<h2>View action on Building</h2>";
        echo "<div class='container mt-4'>";
            echo "<h1 class='text-center'>View Animals</h1>";

            $result = mysqli_query($conn, "SELECT * FROM building");

            if ($result) {
                echo "<table class='table table-bordered table-hover mt-3'>";
                echo "<thead>";
                echo "<tr><th>ID</th><th>Name</th><th>Type</th><th>Action</th></tr>";
                echo "</thead>";
                echo "<tbody>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['ID']}</td>";
                    echo "<td>{$row['NAME']}</td>";
                    echo "<td>{$row['Type']}</td>";
                    echo "<td><a href='asset_management_Building.php?action=update&id={$row['ID']}' class='btn btn-primary'>Update</a></td>";
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
        echo "<p>Invalid action.</p>";
        break;
}

function displayBuildingInsertForm() {
    echo "<form method='post' action='asset_Management_building.php?action=insert'>
            <label for='ID'>ID:</label>
            <input type='number' id='ID' name='ID' required>
            <label for='name'>Name:</label>
            <input type='text' id='name' name='name' required>
            
            <label for='type'>Type:</label>
            <input type='text' id='type' name='type' required>

            <input type='submit' value='Insert Building'>
          </form>";
}
function displayBuildingUpdateForm($BuildingData) {
    echo "<form method='post' action='asset_management_Building.php?action=update&id={$BuildingData['ID']}' style='max-width: 400px; margin: auto;'>
        <h2>Update Building</h2>
        
        <input type='hidden' name='ID' value='{$BuildingData['ID']}'>
        
        
        <label for='name'>Name:</label>
        <input type='text' id='name' name='name' value='{$BuildingData['NAME']}' required>
        
        <label for='type'>Type:</label>
        <input type='text' id='type' name='type' value='{$BuildingData['Type']}' required>

        <input type='submit' value='Update Building' class='button'>
      </form>";
}
?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>
