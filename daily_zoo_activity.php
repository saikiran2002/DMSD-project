<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Zoo Activity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="page">
        <h1>Daily Zoo Activity</h1>

        <table>
            <tr>
                <th>Table Name</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td>Attraction</td>
                <td>
                    <a href='asset_management_Animal.php?action=insert' class='button'>Entry</a>
                    <a href='asset_management_Animal.php?action=view' class='button'>View</a>
                    <a href='attraction_handler.php?action=revenue' class='button'>Revenue</a>
                </td>
            </tr>
            <tr>
                <td>Concession</td>
                <td>
                    <a href='concession_handler.php?action=insert' class='button'>Entry</a>
                    <a href='concession_handler.php?action=view' class='button'>View</a>
                    <a href='concession_handler.php?action=revenue' class='button'>Revenue</a>
                </td>
            </tr>
            <tr>
                <td>Attendance</td>
                <td>
                    <a href='attendance_handler.php?action=revenue' class='button'>Revenue</a>
                </td>
            </tr>
        </table>

        <p><a href='index.php'>Home</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>