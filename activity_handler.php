<!-- activity_handler.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Zoo Activity Handler</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        /* Add your custom styles here */
    </style>
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container mt-4">
        <h1 class="text-center">Daily Zoo Activity Handler</h1>

        <?php
        include('db.php');

        $entity = isset($_GET['part']) ? $_GET['part'] : '';
        $action = isset($_GET['action']) ? $_GET['action'] : '';

        switch ($entity) {
            case 'attraction':
                include('attraction_handler.php');
                break;

            // Add cases for other entities like 'concession' and 'attendance' here

            default:
                echo "<p class='text-danger'>Invalid entity selected.</p>";
                break;
        }
        ?>
    </div>

    <!-- Include Bootstrap JS library -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>