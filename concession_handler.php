<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concession Handler</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="asset_management.css">
</head>

<body>
    <?php include('navbar.php'); ?>
    <?php include('db.php');?>
    <div class="container mt-4">

        <?php
        $action = isset($_GET['action']) ? $_GET['action'] : '';

        switch ($action) {
            case 'insert':
                displayConcessionInsertForm();

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $revenueTypeID = mysqli_real_escape_string($conn, $_POST['Revenue_type_ID']);
                    $product = mysqli_real_escape_string($conn, $_POST['Product']);

                    $sql = "INSERT INTO concession (Revenue_type_ID, Product)
                            VALUES ('$revenueTypeID', '$product')";

                    if (mysqli_query($conn, $sql)) {
                        echo "<p>Concession inserted successfully.</p>";
                    } else {
                        echo "<p>Error: " . mysqli_error($conn) . "</p>";
                    }
                }
                break;

            case 'view':
                echo "<div class='container mt-4'>";
                echo "<h2>View Concession</h2>";

                $result = mysqli_query($conn, "SELECT * FROM Concession");

                if ($result) {
                    echo "<div class='container mt-4 d-flex justify-content-center'>";
                    echo "<table class='table table-bordered table-hover mt-3' style='width: 50%;'>";
                    echo "<thead class='thead-dark'>";
                    echo "<tr><th>Revenue Type ID</th><th>Product</th> <th>Action</th></tr>";
                    echo "</thead><tbody>";

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['Revenue_type_ID']}</td>";
                        echo "<td>{$row['Product']}</td>";
                        echo "<td><a href='concession_handler.php?action=update&id={$row['Revenue_type_ID']}' class='btn btn-primary'>Update</a></td>";
                        echo "</tr>";
                    }

                    echo "</tbody></table>";
                    echo "</div>";
                } else {
                    echo "<p class='text-danger text-center mt-3'>Error fetching concession data: " . mysqli_error($conn) . "</p>";
                }

                echo "</div>";
                break;

            case 'update':
                echo "<p>Updating action on Concession</p>";

                if (isset($_GET['id'])) {
                    $concessionID = mysqli_real_escape_string($conn, $_GET['id']);

                    $query = "SELECT * FROM concession WHERE Revenue_type_ID = '$concessionID'";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        $row = mysqli_fetch_assoc($result);

                        displayConcessionUpdateForm($conn, $concessionID);

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $product = mysqli_real_escape_string($conn, $_POST['product']);

                            $updateQuery = "UPDATE concession SET 
                                            Product = '$product'
                                            WHERE Revenue_type_ID = '$concessionID'";

                            if (mysqli_query($conn, $updateQuery)) {
                                echo "<p>Concession updated successfully.</p>";
                                echo "<script>
                                    setTimeout(function() {
                                        window.location.href = 'concession_handler.php?action=view';
                                    }, 1000);
                                </script>";
                            } else {
                                echo "<p>Error updating concession: " . mysqli_error($conn) . "</p>";
                            }
                        }
                    } else {
                        echo "<p>Error fetching concession data: " . mysqli_error($conn) . "</p>";
                    }
                } else {
                    echo "<p>No concession ID provided for update.</p>";
                }
                break;

            case 'revenue':
                global $conn;

                $query = "
                    SELECT
                        r.Date_time,
                        r.Revenue
                    FROM
                        revenueevents r
                    INNER JOIN
                        revenuetypes rt ON r.Revenue_types_ID = rt.ID
                    WHERE
                        rt.TYPE = 'Conc'
                ";

                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo "<div class='container mt-4'>";
                    echo "<table class='table table-bordered'>";
                    echo "<thead class='thead-dark'>";
                    echo "<tr><th>Date</th><th>Revenue</th></tr>";
                    echo "</thead><tbody>";

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['Date_time']}</td>";
                        echo "<td>{$row['Revenue']}</td>";
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
        function displayConcessionInsertForm() {
            echo "<form method='post' action='concession_handler.php?action=insert'>";
            echo "<label for='Revenue_type_ID'>Revenue Type ID:</label>";
            echo "<input type='text' id='Revenue_type_ID' name='Revenue_type_ID' required>";
        
            echo "<label for='Product'>Product:</label>";
            echo "<input type='text' id='Product' name='Product' required>";
        
            echo "<input type='submit' value='Insert Concession' class='btn btn-primary'>";
            echo "</form>";
        }
        function displayConcessionUpdateForm($conn, $concessionID)
        {
            $query = "SELECT * FROM concession WHERE Revenue_type_ID = '$concessionID'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);

                echo "<div class='container mt-4'>";
                echo "<h2>Update Concession</h2>";
                echo "<form method='post' action='concession_handler.php?action=update&id=$concessionID'>";
                
                echo "<label for='product'>Product:</label>";
                echo "<input type='text' id='product' name='product' value='{$row['Product']}' required>";

                echo "<input type='submit' value='Update' class='btn btn-primary'>";
                echo "</form>";
                echo "</div>";
            } else {
                echo "<p class='text-danger'>Error fetching concession data: " . mysqli_error($conn) . "</p>";
            }
        }

        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>