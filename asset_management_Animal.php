<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="asset_management.css">
</head>

<body>
    <?php include('navbar.php'); ?>
    <?php
    
    include('db.php');

    $action = isset($_GET['action']) ? $_GET['action'] : '';

    switch ($action) {
        case 'insert':
            echo "<p>Inserting action on Animal</p>";
            displayAnimalInsertForm();
        
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $ID = mysqli_real_escape_string($conn, $_POST['ID']);
                $status = mysqli_real_escape_string($conn, $_POST['Status']);
                $birthYear = mysqli_real_escape_string($conn, $_POST['BirthYear']);
                $buildingID = mysqli_real_escape_string($conn, $_POST['BuildingID']);
                $enclosureID = mysqli_real_escape_string($conn, $_POST['EnclosureID']);
                $speciesID = mysqli_real_escape_string($conn, $_POST['SpeciesID']);
        
                $sql = "INSERT INTO animal (ID, status1, BirthYear, BuildingID, EnclosureID, SpeciesID)
                        VALUES ('$ID', '$status', '$birthYear', '$buildingID', '$enclosureID', '$speciesID')";
        
                if (mysqli_query($conn, $sql)) {
                    echo "<p>Animal inserted successfully.</p>";
                } else {
                    echo "<p>Error: " . mysqli_error($conn) . "</p>";
                }
            }
            break;
        
        case 'update':
            echo "<p>Updating action on Animal</p>";
        
            if (isset($_GET['id'])) {
                $animalID = mysqli_real_escape_string($conn, $_GET['id']);
        
                $query = "SELECT * FROM animal WHERE ID = '$animalID'";
                $result = mysqli_query($conn, $query);
        
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
        
                    displayAnimalUpdateForm($row);
        
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $status = mysqli_real_escape_string($conn, $_POST['Status']);
                        $birthYear = mysqli_real_escape_string($conn, $_POST['BirthYear']);
                        $buildingID = mysqli_real_escape_string($conn, $_POST['BuildingID']);
                        $enclosureID = mysqli_real_escape_string($conn, $_POST['EnclosureID']);
                        $speciesID = mysqli_real_escape_string($conn, $_POST['SpeciesID']);
        
                        $updateQuery = "UPDATE animal SET 
                                        status1 = '$status', 
                                        BirthYear = '$birthYear', 
                                        BuildingID = '$buildingID', 
                                        EnclosureID = '$enclosureID', 
                                        SpeciesID = '$speciesID' 
                                        WHERE ID = '$animalID'";
        
                        if (mysqli_query($conn, $updateQuery)) {
                            echo "<p>Animal updated successfully.</p>";
                            echo "<script>
                                setTimeout(function() {
                                    window.location.href = 'asset_Management_Animal.php?action=view';
                                }, 1000);
                            </script>";
                        } else {
                            echo "<p>Error updating animal: " . mysqli_error($conn) . "</p>";
                        }
                    }
                } else {
                    echo "<p>Error fetching animal data: " . mysqli_error($conn) . "</p>";
                }
            } else {
                echo "<p>No animal ID provided for update.</p>";
            }
            break;
            
        case 'view':
            echo "<div class='container mt-4'>";
            echo "<h1 class='text-center'>View Animals</h1>";


            $result = mysqli_query($conn, "SELECT * FROM animal");

            if ($result) {
                echo "<table class='table table-bordered table-hover mt-3'>";
                echo "<thead>";
                echo "<tr><th>ID</th><th>Status</th><th>Birth Year</th><th>Building ID</th><th>Enclosure ID</th><th>Species ID</th><th>Action</th></tr>";
                echo "</thead>";
                echo "<tbody>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['ID']}</td>";
                    echo "<td>{$row['status1']}</td>";
                    echo "<td>{$row['BirthYear']}</td>";
                    echo "<td>{$row['BuildingID']}</td>";
                    echo "<td>{$row['EnclosureID']}</td>";
                    echo "<td>{$row['SpeciesID']}</td>";
                    echo "<td><a href='asset_management_Animal.php?action=update&id={$row['ID']}' class='btn btn-primary'>Update</a></td>";
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

    function displayAnimalInsertForm()
    {
        echo "<form method='post' class = 'insert' action='asset_management_animal.php?action=insert'>
            <label for='ID'>ID:</label>
            <input type='number' id='ID' name='ID' required>
            
            <label for='Status'>Status:</label>
            <select name='Status' id='Status'>
                <option value='Healthy'>Healthy</option>
                <option value='Sick'>Sick</option>
                <option value='Injured'>Injured</option>
            </select>
            
            <label for='BirthYear'>Birth Year:</label>
            <input type='date' id='BirthYear' name='BirthYear' required>
            
            <label for='BuildingID'>Building ID:</label>
            <input type='number' id='BuildingID' name='BuildingID' required>

            <label for='EnclosureID'>Enclosure ID:</label>
            <input type='number' id='EnclosureID' name='EnclosureID' required>

            <label for='SpeciesID'>Species ID:</label>
            <input type='number' id='SpeciesID' name='SpeciesID' required>

            <input type='submit' value='Insert Animal'>
            <p><a href='asset_management.php'>Back</a></p>
          </form>";
    }
    function displayAnimalUpdateForm($animalData) {
        echo "<form method='post' action='asset_management_animal.php?action=update&id={$animalData['ID']}' style='max-width: 400px; margin: auto;'>
            <h2>Update Animal</h2>
            
            <input type='hidden' name='ID' value='{$animalData['ID']}'>
            
            <label for='Status'>Status:</label>
            <select name='Status' id='Status'>
                <option value='Healthy' " . ($animalData['status1'] == 'Healthy' ? 'selected' : '') . ">Healthy</option>
                <option value='Sick' " . ($animalData['status1'] == 'Sick' ? 'selected' : '') . ">Sick</option>
                <option value='Injured' " . ($animalData['status1'] == 'Injured' ? 'selected' : '') . ">Injured</option>
            </select>
            
            <label for='BirthYear'>Birth Year:</label>
            <input type='date' id='BirthYear' name='BirthYear' value='{$animalData['BirthYear']}' required>
            
            <label for='BuildingID'>Building ID:</label>
            <input type='number' id='BuildingID' name='BuildingID' value='{$animalData['BuildingID']}' required>

            <label for='EnclosureID'>Enclosure ID:</label>
            <input type='number' id='EnclosureID' name='EnclosureID' value='{$animalData['EnclosureID']}' required>

            <label for='SpeciesID'>Species ID:</label>
            <input type='number' id='SpeciesID' name='SpeciesID' value='{$animalData['SpeciesID']}' required>

            <input type='submit' value='Update Animal' class='button'>
          </form>";
    }

    ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>