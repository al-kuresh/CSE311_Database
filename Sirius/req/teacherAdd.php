<?php
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['usert'])) {

    if ($_SESSION['usert'] == '1') {

        if (
            isset($_POST['teacher_id']) && isset($_POST['f_name']) && isset($_POST['l_name']) && isset($_POST['username']) &&
            isset($_POST['Address']) && isset($_POST['subject_code']) && isset($_POST['class_code']) &&
            isset($_POST['password'])
        ) {

            include '../dbConnection.php';
            include "../data/teachers.php";
            include "../admin/data/subject.php";

            function unameIsUnique($username, $conct)
            {
                $sql = "SELECT COUNT(*) FROM teacher WHERE username = ?";
                $stmt = $conct->prepare($sql);
                $stmt->execute([$username]);
                $count = $stmt->fetchColumn();
                return $count == 0;
            }
            $teacher_id = $_POST["teacher_id"];
            $fname = $_POST['f_name'];
            $lname = $_POST['l_name'];
            $uname = $_POST['username'];
            $pass = $_POST['password'];
            $subject_code = $_POST['subject_code'];
            $class_code = $_POST['class_code'];
            $address = $_POST['Address'];


            $data = 'username=' . urlencode($uname) .
                '&teacher_id=' . urlencode($teacher_id) .
                '&f_name=' . urlencode($fname) .
                '&l_name=' . urlencode($lname) .
                '&Address=' . urlencode($address) .
                '&subject_code=' . urlencode($subject_code) .
                '&class_code=' . urlencode($class_code);
            // '&subject=' . urlencode($subject);

            if (empty($teacher_id)) {
                $em = "ID is required";
                header("Location:  ../admin/addTeacher.php?error=" . urlencode($em) . "&$data");
                exit;

            } else if (empty($fname)) {
                $em = "First name is required";
                header("Location:  ../admin/addTeacher.php?error=" . urlencode($em) . "&$data");
                exit;
            } else if (empty($lname)) {
                $em = "Last name is required";
                header("Location: ../admin/addTeacher.php?error=" . urlencode($em) . "&$data");
                exit;
            } else if (empty($uname)) {
                $em = "Username is required";
                header("Location: ../admin/addTeacher.php?error=" . urlencode($em) . "&$data");
                exit;
            } else if (!unameIsUnique($uname, $conct)) {
                $em = "Username is taken! Try another";
                header("Location: ../admin/addTeacher.php?error=" . urlencode($em) . "&$data");
                exit;
            } else if (empty($pass)) {
                $em = "Password is required";
                header("Location: ../admin/addTeacher.php?error=" . urlencode($em) . "&$data");
                exit;
            } else if (empty($address)) {
                $em = "Address is required";
                header("Location: ../admin/addTeacher.php?error=" . urlencode($em) . "&$data");
                exit;
            } else if (empty($subject_code)) {
                $em = "Subject code is required";
                header("Location: ../admin/addTeacher.php?error=" . urlencode($em) . "&$data");
                exit;
            } else if (empty($class_code)) {
                $em = "Class code is required";
                header("Location: ../admin/addTeacher.php?error=" . urlencode($em) . "&$data");
                exit;
            } else {

                $pass = password_hash($pass, PASSWORD_DEFAULT);


                $sql = "INSERT INTO teacher (teacher_id,f_name, l_name, username, Address, password, subject_code, class_code) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conct->prepare($sql);
                $stmt->execute([$teacher_id, $fname, $lname, $uname, $address, $pass, $subject_code, $class_code]);


                $sm = "New teacher registered successfully";
                header("Location: ../admin/addTeacher.php?success=" . urlencode($sm));
                exit;
            }
        } else {
            $em = "All fields are required";
            header("Location: ../admin/addTeacher.php?error=" . urlencode($em));
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