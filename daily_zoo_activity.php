<!DOCTYPE html>
<html>
<head>
    <title>Daily Zoo Activity</title>
</head>
<body>
    <h2>Daily Zoo Activity</h2>

    <?php
    // Handle user actions (entry/view)
    $action = isset($_GET['action']) ? $_GET['action'] : '';

    switch ($action) {
        case 'entry':
            // Code for entering daily activities and revenue
            // ...
            break;

        case 'view':
            // Code for viewing daily activities and revenue
            // ...
            break;

        default:
            echo "<p>Please select an action from the menu.</p>";
            break;
    }
    ?>

    <p><a href='index.php'>Back to Menu</a></p>
</body>
</html>
