<?php
session_start();
$admin_id = $_SESSION['f_name'] ?? 'Guest';

if (isset($_SESSION['admin_id']) && isset($_SESSION['usert']) && $_SESSION['usert'] == '1') {
    include "../dbConnection.php";
    include "../admin/data/students.php";
    include "../admin/data/class.php";
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin - Class</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../Css/Front.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body class="image_for_teacher">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="Front_nav">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../image/icon.webp" width="40">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="teacher.php">Teacher</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="student.php">Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="class.php">Class</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="message.php">Message</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="settings.php">Settings</a>
                        </li>
                    </ul>
                    <ul>
                        <li class="navbar-nav me-auto mb-2 mb-lg-0">
                            <a class="nav-link" href="../logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container" style="margin-top: 50px;">
            <h2 class="text-center">Select a Class</h2>
            <div class="text-center">
                <a href="class_details.php?class_name=9" class="add-teacher-btn">Class 9</a>
                <a href="class_details.php?class_name=10" class="add-teacher-btn">Class 10</a>
                <a href="class_details.php?class_name=11" class="add-teacher-btn">Class 11</a>
                <a href="class_details.php?class_name=12" class=" add-teacher-btn">Class 12</a>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
    <?php
} else {
    header("Location: ../login.php");
    exit();
}
?>