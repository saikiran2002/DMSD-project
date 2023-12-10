<!DOCTYPE html>
<html>
<head>
    <title>Management and Reporting</title>
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
    <?php include('navbar.php');?>
    <div class="container mt-4">
        <h1 class="text-center">Management Reporting</h1>

        <div class="d-flex flex-column align-items-center mt-3">
            <a href="functions.php?action=daily_revenue_report" class="btn btn-primary mb-2">Daily Revenue Report</a>
            <a href="functions.php?action=animal_population_report" class="btn btn-primary mb-2">Animal Population Report</a>
            <a href="functions.php?action=top_attractions_report" class="btn btn-primary mb-2">Top Attractions Report</a>
            <a href="functions.php?action=best_days_report" class="btn btn-primary mb-2">Best Days Report</a>
            <a href="functions.php?action=average_revenue_report" class="btn btn-primary mb-2">Average Revenue Report</a>
        </div>
    </div>
    <?php
    ?>

    <p><a href='index.php'>Home</a></p>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
