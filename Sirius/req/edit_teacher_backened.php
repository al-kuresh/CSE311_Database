<?php
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['usert'])) {

    if ($_SESSION['usert'] == '1') {

        if (
            isset($_POST['teacher_id']) && isset($_POST['f_name']) && isset($_POST['l_name']) && isset($_POST['username']) &&
            isset($_POST['Address']) && isset($_POST['subject_code']) && isset($_POST['class_code']) &&
            isset($_POST['subject'])
        ) {

            include '../dbConnection.php';
            include "../data/teachers.php";
            include "../admin/data/subject.php";
            function unameIsUnique($username, $conct, $teacher_id)
            {
                $teacher = getTeachersID($teacher_id, $conct);
                $sql = "SELECT * FROM teacher WHERE username = ?";
                $stmt = $conct->prepare($sql);
                $stmt->execute([$username]);

                if ($teacher_id == 0) {
                    if ($stmt->rowCount() >= 1) {
                        return 0;
                    } else {
                        return 1;
                    }
                } else {

                    if ($stmt->rowCount() >= 1) {
                        $teacher_id = $stmt->fetch();
                        if ($teacher['teacher_id'] == $teacher_id) {
                            return 1;
                        } else {
                            return 0;
                        }
                    } else {
                        return 1;
                    }
                }

            }
            $teacher_id = $_POST["teacher_id"];
            $fname = $_POST['f_name'];
            $lname = $_POST['l_name'];
            $uname = $_POST['username'];
            $subject_code = $_POST['subject_code'];
            $class_code = $_POST['class_code'];
            $address = $_POST['Address'];
            //  $subject = $_POST['subject'];

            // Check if fields are empty
            $data = 'username=' . urlencode($uname) .
                '&teacher_id=' . urlencode($teacher_id) .
                '&f_name=' . urlencode($fname) .
                '&l_name=' . urlencode($lname) .
                '&Address=' . urlencode($address) .
                '&subject_code=' . urlencode($subject_code) .
                '&class_code=' . urlencode($class_code) .
                '&subject=' . urlencode($subject);

            if (empty($teacher_id)) {
                $em = "ID is required";
                header("Location:  ../admin/edit_teacher.php?error=" . urlencode($em) . "&$data");
                exit;

            } else if (empty($fname)) {
                $em = "First name is required";
                header("Location:  ../admin/edit_teacher.php?error=" . urlencode($em) . "&$data");
                exit;
            } else if (empty($lname)) {
                $em = "Last name is required";
                header("Location: ../admin/edit_teacher.php?error=" . urlencode($em) . "&$data");
                exit;
            } else if (empty($uname)) {
                $em = "Username is required";
                header("Location: ../admin/edit_teacher.php?error=" . urlencode($em) . "&$data");
                exit;
            } else if (!unameIsUnique($uname, $conct, $teacher_id)) {
                $em = "Username is taken! Try another";
                header("Location: ../admin/edit_teacher.php?error=" . urlencode($em) . "&$data");
                exit;
            } else if (empty($address)) {
                $em = "Address is required";
                header("Location: ../admin/edit_teacher.php?error=" . urlencode($em) . "&$data");
                exit;
            } else if (empty($subject_code)) {
                $em = "Subject code is required";
                header("Location: ../admin/edit_teacher.php?error=" . urlencode($em) . "&$data");
                exit;
            } else if (empty($class_code)) {
                $em = "Class code is required";
                header("Location: ../admin/edit_teacher.php?error=" . urlencode($em) . "&$data");
                exit;
            } else {
                $sql = "UPDATE teacher SET username = ?, f_name=?, l_name=?, Address=?, subject_code=?, class_code=? WHERE teacher_id = ? ";
                $stmt = $conct->prepare($sql);
                $stmt->execute([$teacher_id, $fname, $lname, $uname, $address, $subject_code, $class_code]);
                $sm = "successfully information Updated";
                header("Location: ../admin/edit_teacher.php?success=" . urlencode($sm));
                exit;
            }
        } else {
            $em = "All fields are required";
            header("Location: ../admin/edit_teacher.php?error=" . urlencode($em));
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