<?php
session_start();
$admin_id = $_SESSION['f_name'] ?? 'Guest';

if (isset($_SESSION['admin_id']) && isset($_SESSION['usert']) && $_SESSION['usert'] == '1') {
    include "../dbConnection.php";


    $order = isset($_GET['sortOrder']) ? $_GET['sortOrder'] : 'ASC';

    $sql = "SELECT 
            t.teacher_id,
            t.username,
            c.class_name,
            SUM(c.`teacher's_Payment`) + (COUNT(s.student_id) * 100) AS total_payment
            FROM 
            teacher t
            LEFT JOIN 
            class c ON t.class_code = c.class_code
            LEFT JOIN 
            student s ON c.class_code = s.class_code
            GROUP BY 
            t.teacher_id, t.username
            ORDER BY total_payment $order;";

    $stmt = $conct->prepare($sql);
    $stmt->execute();
    $payments = $stmt->fetchAll();
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Teachers Payment</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="..\Css\Front.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body class="image_for_teacher">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="Front_nav">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="..\image\icon.webp" width="40">
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
                            <a class="nav-link" aria-current="page" href="teacher.php">Teachers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#contactModal">Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#contactModal">Class</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#contactModal">Message</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#contactModal">Settings</a>
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

        <div class="container mt-5">
            <h2 class="text-center">Teacher Payments</h2>

            <form method="GET" class="mb-4">
                <label for="sortOrder">Sort by Total Payment:</label>
                <select name="sortOrder" id="sortOrder" onchange="this.form.submit()">
                    <option value="ASC" <?= (isset($_GET['sortOrder']) && $_GET['sortOrder'] == 'ASC') ? 'selected' : '' ?>>
                        Low to High</option>
                    <option value="DESC" <?= (isset($_GET['sortOrder']) && $_GET['sortOrder'] == 'DESC') ? 'selected' : '' ?>>
                        High to Low</option>
                </select>
            </form>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Teacher ID</th>
                        <th>Username</th>
                        <th>Class Name</th>
                        <th>Total Payment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($payments as $payment): ?>
                        <tr>
                            <td><?= htmlspecialchars($payment['teacher_id']) ?></td>
                            <td><?= htmlspecialchars($payment['username']) ?></td>
                            <td><?= htmlspecialchars($payment['class_name']) ?></td>
                            <td><?= htmlspecialchars($payment['total_payment']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>

    </html>
    <?php
} else {
    header("Location: ../index.php");
    exit();
}
?>