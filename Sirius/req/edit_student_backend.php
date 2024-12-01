<?php
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['usert'])) {
    if ($_SESSION['usert'] == '1') {
        if (isset($_POST['student_id'], $_POST['f_name'], $_POST['l_name'], $_POST['username'], $_POST['Address'], $_POST['class_code'])) {

            include '../dbConnection.php';
            include '../admin/data/students.php';
            include "../admin/data/class.php";

            function unameIsUnique($username, $conct, $student_id)
            {
                $student = getStudentById($student_id, $conct);
                $sql = "SELECT * FROM student WHERE username = ?";
                $stmt = $conct->prepare($sql);
                $stmt->execute([$username]);

                if ($student_id == 0) {
                    return $stmt->rowCount() < 1;
                } else {
                    if ($stmt->rowCount() >= 1) {
                        $existing_student = $stmt->fetch();
                        return $student['student_id'] == $existing_student['student_id'];
                    }
                    return true;
                }
            }

            function validateRequiredFields($fields)
            {
                foreach ($fields as $field => $error_message) {
                    if (empty($_POST[$field])) {
                        return $error_message;
                    }
                }
                return null;
            }

            $data = http_build_query([
                'student_id' => $_POST["student_id"],
                'f_name' => $_POST['f_name'],
                'l_name' => $_POST['l_name'],
                'username' => $_POST['username'],
                'Address' => $_POST['Address'],
                'class_code' => $_POST['class_code']
            ]);

            $requiredFields = [
                'student_id' => 'ID is required',
                'f_name' => 'First name is required',
                'l_name' => 'Last name is required',
                'username' => 'Username is required',
                'Address' => 'Address is required',
                'class_code' => 'Class code is required'
            ];

            $error = validateRequiredFields($requiredFields);
            if ($error) {
                header("Location: ../admin/edit_student.php?error=" . urlencode($error) . "&$data");
                exit;
            }

            if (!unameIsUnique($_POST['username'], $conct, $_POST['student_id'])) {
                $em = "Username is taken! Try another";
                header("Location: ../admin/edit_student.php?error=" . urlencode($em) . "&$data");
                exit;
            }

            $student_id = $_POST["student_id"];
            $fname = $_POST['f_name'];
            $lname = $_POST['l_name'];
            $uname = $_POST['username'];
            $address = $_POST['Address'];
            $class_code = $_POST['class_code'];
            $password = isset($_POST['password']) ? trim($_POST['password']) : '';

            $student = getStudentById($student_id, $conct);
            if ($student == null) {
                $em = "Student ID does not exist";
                header("Location: ../admin/edit_student.php?error=" . urlencode($em) . "&$data");
                exit;
            }

            if (!empty($password)) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $sql = "UPDATE student SET username = ?, f_name = ?, l_name = ?, address = ?, class_code = ?, password = ? WHERE student_id = ?";
                $stmt = $conct->prepare($sql);
                $stmt->execute([$uname, $fname, $lname, $address, $class_code, $hashedPassword, $student_id]);
                $sm = "Successfully updated information";
                header("Location: ../admin/edit_student.php?success=" . urlencode($sm));
                exit;
            } else {
                $sql = "UPDATE student SET username = ?, f_name = ?, l_name = ?, Address = ?, class_code = ? WHERE student_id = ?";
                $stmt = $conct->prepare($sql);
                $stmt->execute([$uname, $fname, $lname, $address, $class_code, $student_id]);
                $sm = "Successfully updated information";
                header("Location: ../admin/edit_student.php?success=" . urlencode($sm));
                exit;
            }

        } else {
            $em = "All fields are required";
            header("Location: ../admin/edit_student.php?error=" . urlencode($em));
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