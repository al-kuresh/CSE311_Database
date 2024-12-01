<?php
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['usert'])) {

    if ($_SESSION['usert'] == '1') {

        if (
            isset($_POST['student_id']) && isset($_POST['f_name']) && isset($_POST['l_name']) && isset($_POST['username']) &&
            isset($_POST['Address']) && isset($_POST['class_code']) && isset($_POST['password'])
        ) {

            include '../dbConnection.php';
            include "../admin/data/students.php";

            function unameIsUnique($username, $conct)
            {
                $sql = "SELECT COUNT(*) FROM student WHERE username = ?";
                $stmt = $conct->prepare($sql);
                $stmt->execute([$username]);
                $count = $stmt->fetchColumn();
                return $count == 0;
            }

            $student_id = $_POST["student_id"];
            $fname = $_POST['f_name'];
            $lname = $_POST['l_name'];
            $uname = $_POST['username'];
            $pass = $_POST['password'];
            $class_code = $_POST['class_code'];
            $address = $_POST['Address'];

            $data = 'username=' . urlencode($uname) .
                '&student_id=' . urlencode($student_id) .
                '&f_name=' . urlencode($fname) .
                '&l_name=' . urlencode($lname) .
                '&Address=' . urlencode($address) .
                '&class_code=' . urlencode($class_code);

            if (empty($student_id)) {
                $em = "ID is required";
                header("Location:  ../admin/addStudent.php?error=" . urlencode($em) . "&$data");
                exit;

            } else if (empty($fname)) {
                $em = "First name is required";
                header("Location:  ../admin/addStudent.php?error=" . urlencode($em) . "&$data");
                exit;
            } else if (empty($lname)) {
                $em = "Last name is required";
                header("Location: ../admin/addStudent.php?error=" . urlencode($em) . "&$data");
                exit;
            } else if (empty($uname)) {
                $em = "Username is required";
                header("Location: ../admin/addStudent.php?error=" . urlencode($em) . "&$data");
                exit;
            } else if (!unameIsUnique($uname, $conct)) {
                $em = "Username is taken! Try another";
                header("Location: ../admin/addStudent.php?error=" . urlencode($em) . "&$data");
                exit;
            } else if (empty($pass)) {
                $em = "Password is required";
                header("Location: ../admin/addStudent.php?error=" . urlencode($em) . "&$data");
                exit;
            } else if (empty($address)) {
                $em = "Address is required";
                header("Location: ../admin/addStudent.php?error=" . urlencode($em) . "&$data");
                exit;
            } else if (empty($class_code)) {
                $em = "Class code is required";
                header("Location: ../admin/addStudent.php?error=" . urlencode($em) . "&$data");
                exit;
            } else {

                $pass = password_hash($pass, PASSWORD_DEFAULT);

                $sql = "INSERT INTO student (student_id, f_name, l_name, username, Address, password, class_code) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conct->prepare($sql);
                $stmt->execute([$student_id, $fname, $lname, $uname, $address, $pass, $class_code]);

                $sm = "New student registered successfully";
                header("Location: ../admin/addStudent.php?success=" . urlencode($sm));
                exit;
            }
        } else {
            $em = "All fields are required";
            header("Location: ../admin/addStudent.php?error=" . urlencode($em));
            exit;
        }
    } else {
        header("Location: ../../logout.php");
        exit;
    }
} else {
    header("Location: ../../logout.php");
    exit;
}
?>