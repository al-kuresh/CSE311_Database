<?php
session_start();
$admin_id = $_SESSION['f_name'] ?? 'Guest';
if (isset($_SESSION['admin_id']) && isset($_SESSION['usert'])) {
    if ($_SESSION['usert'] == '1') {
        include "../dbConnection.php";
        include "../admin/data/teachers.php";
        include "../admin/data/class.php";
        $teacher = getAllTeachers($conct);
    }

    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin - Teachers</title>
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
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#aboutModal">Teachers</a>
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
        <?php

        if ($teacher != 0) {

            ?>
            <div class="container" style="margin-top: 50px;">
                <a href="addTeacher.php" class="add-teacher-btn">
                    Add New Teacher
                </a>
            </div>

            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert"><?= $_GET['error'] ?></div>
            <?php } ?>
            <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-info" role="alert"><?= $_GET['success'] ?></div>
            <?php } ?>


            <div class="table-responsive" style="margin: 50px;">
                <table class="table table-striped table-hover table-bordered mt-5" style="margin: auto;">


                    <thead class="thead-light" style="background: linear-gradient(145deg, #6e7c7c, #9ea7a7); color: white;">
                        <tr>
                            <th scope="col">Teacher_ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Address</th>
                            <th scope="col">Class Code</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Configure</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($teacher as $teacher) { ?>
                            <tr>

                                <td><?= $teacher['teacher_id'] ?></td>
                                <td><?= $teacher['f_name'] ?></td>
                                <td><?= $teacher['l_name'] ?></td>
                                <td><?= $teacher['username'] ?></td>
                                <td><?= $teacher['Address'] ?></td>
                                <td><?= $teacher['class_code'] ?></td>
                                <td><?= $teacher['subject'] ?></td>
                                <td>
                                    <a href="edit_teacher.php?teacher_id=<?= $teacher['teacher_id'] ?>"
                                        class="btn btn-dark">Edit</a>
                                    <a href="delete_teacher.php?teacher_id=<?= $teacher['teacher_id'] ?>"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <div class="alert alert-dark" role="alert">
                Nothing to show!
            </div>
        <?php } ?>
        </div>

        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>
    <?php

} else {
    header("Location: ../login.php");
    exit;
}
?>