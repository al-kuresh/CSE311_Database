<?php
session_start();
$admin_id = $_SESSION['f_name'] ?? 'Guest';
if (isset($_SESSION['admin_id']) && isset($_SESSION['usert'])) {
    if ($_SESSION['usert'] == '1') {
        include "../dbConnection.php";
        include "../admin/data/students.php";
        include "../admin/data/class.php";

        if (isset($_GET['delete_id'])) {
            $student_id = $_GET['delete_id'];


            if (deleteStudent($student_id, $conct)) {
                $sm = "Student deleted successfully";
                header("Location: student.php?success=" . urlencode($sm));
                exit;
            } else {
                $em = "Error occurred while deleting the student";
                header("Location: student.php?error=" . urlencode($em));
                exit;
            }
        }


        $students = getAllStudents($conct);
    }

    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin - Students</title>
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
                            <a class="nav-link" aria-current="page" href="teacher.php">Teacher</a>
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

        <?php if ($students != 0) { ?>
            <div class="container" style="margin-top: 50px;">
                <a href="addStudent.php" class="add-teacher-btn">
                    Add New Student
                </a>
                </a>
                <a href="students_payment.php" class="add-teacher-btn">
                    Payments of Students
                </a>
            </div>

            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert"><?= $_GET['error'] ?></div>
            <?php } ?>
            <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-info" role="alert"><?= $_GET['success'] ?></div>
            <?php } ?>

            <div class="table-responsive" style="margin: 50px;">
                <table class="table table-striped table-hover table-bordered mt- <table class=" table table-striped table-hover
                    table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Class Code</th>
                            <th>Address</th>
                            <th>Configure</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student) { ?>
                            <tr>
                                <td><?= htmlspecialchars($student['student_id']) ?></td>
                                <td><?= htmlspecialchars($student['username']) ?></td>
                                <td><?= htmlspecialchars($student['f_name']) ?></td>
                                <td><?= htmlspecialchars($student['l_name']) ?></td>
                                <td><?= htmlspecialchars($student['class_code']) ?></td>
                                <td><?= htmlspecialchars($student['Address']) ?></td>
                                <td>
                                    <a href="edit_student.php?student_id=<?= $student['student_id'] ?>"
                                        class="btn btn-dark">Edit</a>
                                    <a href="?delete_id=<?= $student['student_id'] ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <div class="alert alert-warning" role="alert">No students found.</div>
        <?php } ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
    <?php
} else {
    header("Location: ../login.php");
    exit();
}
?>