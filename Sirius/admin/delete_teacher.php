<?php
session_start();
$admin_id = $_SESSION['f_name'] ?? 'Guest';
if (isset($_SESSION['admin_id']) && isset($_SESSION['usert']) && isset($_GET['teacher_id'])) {
    if ($_SESSION['usert'] == '1') {

        include "../dbConnection.php";
        include "../admin/data/teachers.php";

        $teacher_id = $_GET['teacher_id'];
        if (DeleteTeachers($teacher_id, $conct)) {
            $sm = "Teacher is Deleted";
            header("Location: teacher.php?success=" . urlencode($sm));
            exit;
        } else {
            $sm = "Error Occurred";
            header("Location: teacher.php?success=" . urlencode($sm));
            exit;

        }


    }


} else {
    header("Location: teacher.php");
    exit;
}