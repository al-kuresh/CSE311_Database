<?php
session_start();
$admin_id = $_SESSION['f_name'] ?? 'Guest';
if (isset($_SESSION['admin_id']) && isset($_SESSION['usert']) && ($_SESSION['usert'] == '1')) {
    include "../dbConnection.php";
    include "../admin/data/students.php";
    include "../admin/data/class.php";
    $student_id = '';
    $f_name = '';
    $l_name = '';
    $username = '';
    $Address = '';
    $class_code = '';
    $password = '';

    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin - Add New Student</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="..\Css\Front.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body class="add_image_student">
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
                            <a class="nav-link" href="student.php">Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="teacher.php">Teachers</a>
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

        <form method="post" class="shadow p-3" action="../req/addStudent.php">

            <div class="card mx-auto card-custom" style="max-width: 500px; margin-top: 50px;">
                <div class="card-body">
                    <div class="login-header">
                        <h3 class="card-title text-center">Add New Student</h3>
                        <?php if (isset($_GET['error'])) { ?>
                            <div class="alert alert-danger" role="alert"><?= $_GET['error'] ?></div>
                        <?php } ?>
                        <?php if (isset($_GET['success'])) { ?>
                            <div class="alert alert-success" role="alert"><?= $_GET['success'] ?></div>
                        <?php } ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ID</label>
                        <input type="number" class="form-control" value="<?= $student_id ?>" name="student_id">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" value="<?= $f_name ?>" name="f_name">

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" value="<?= $l_name ?>" name="l_name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" value="<?= $username ?>" name="username">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" value="<?= $Address ?>" name="Address">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Class Code</label>
                        <input type="text" class="form-control" value="<?= $class_code ?>" name="class_code">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <center><button type="submit" class="btn btn-primary">Submit</button></center>
                </div>
            </div>
        </form>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
    <?php
} else {
    header("Location: ../../logout.php");
    exit;
}
?>