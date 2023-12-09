<!-- attraction_handler.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attraction Handler</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        /* Your styles here */
    </style>
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container mt-4">
        <h1 class="text-center">Attraction Handler - <?php echo $_GET['action']; ?></h1>

        <?php
        // Include database connection here
        include('db.php');

        switch ($_GET['action']) {
            case 'insert':
                echo "<p>Insert logic for Attraction goes here.</p>";
                
                // Include form for inserting a new attraction
                include('attraction_insert_form.php');
                break;

            case 'update':
                echo "<p>Update logic for Attraction goes here.</p>";

                // Check if an ID is provided
                if (isset($_GET['id'])) {
                    $attractionID = mysqli_real_escape_string($conn, $_GET['id']);
                    // Fetch and display the existing data for the given ID
                    $query = "SELECT * FROM attraction WHERE ID = '$attractionID'";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        // Display the update form with existing data pre-filled
                        include('attraction_update_form.php');
                    } else {
                        echo "<p class='text-danger'>Error fetching attraction data: " . mysqli_error($conn) . "</p>";
                    }
                } else {
                    echo "<p class='text-danger'>No attraction ID provided for update.</p>";
                }
                break;

            case 'view':
                echo "<p>View logic for Attraction goes here.</p>";

                // Fetch and display rows from the 'attraction' table
                $result = mysqli_query($conn, "SELECT * FROM attraction");

                if ($result) {
                    echo "<table class='table table-bordered table-hover mt-3'>";
                    echo "<thead>";
                    echo "<tr><th>ID</th><th>Name</th><th>Revenue</th><th>Action</th></tr>";
                    echo "</thead>";
                    echo "<tbody>";

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['ID']}</td>";
                        echo "<td>{$row['Name']}</td>";
                        echo "<td>{$row['Revenue']}</td>";
                        echo "<td><a href='attraction_handler.php?action=update&id={$row['ID']}' class='btn btn-primary'>Update</a></td>";
                        echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "<p class='text-danger text-center mt-3'>Error fetching data: " . mysqli_error($conn) . "</p>";
                }

                break;

            default:
                echo "<p class='text-danger'>Invalid action selected.</p>";
                break;
        }
        ?>

        <p><a href="daily_activity.php">Back to Daily Zoo Activity</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>