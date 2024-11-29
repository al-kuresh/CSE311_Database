<?php
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['usert'])) {
    if ($_SESSION['usert'] == '1') {
        if (isset($_POST['teacher_id'], $_POST['f_name'], $_POST['l_name'], $_POST['username'], $_POST['Address'], $_POST['subject_code'], $_POST['class_code'])) {

            include '../dbConnection.php';
            include '../admin/data/teachers.php';
            include "../admin/data/subject.php";


            function unameIsUnique($username, $conct, $teacher_id)
            {
                $teacher = getTeachersID($teacher_id, $conct);
                $sql = "SELECT * FROM teacher WHERE username = ?";
                $stmt = $conct->prepare($sql);
                $stmt->execute([$username]);


                if ($teacher_id == 0) {
                    return $stmt->rowCount() < 1;
                } else {
                    if ($stmt->rowCount() >= 1) {
                        $existing_teacher = $stmt->fetch();
                        return $teacher['teacher_id'] == $existing_teacher['teacher_id'];
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
                'teacher_id' => $_POST["teacher_id"],
                'f_name' => $_POST['f_name'],
                'l_name' => $_POST['l_name'],
                'username' => $_POST['username'],
                'Address' => $_POST['Address'],
                'subject_code' => $_POST['subject_code'],
                'class_code' => $_POST['class_code'],
                'subject' => $_POST['subject']
            ]);

            $requiredFields = [
                'teacher_id' => 'ID is required',
                'f_name' => 'First name is required',
                'l_name' => 'Last name is required',
                'username' => 'Username is required',
                'Address' => 'Address is required',
                'subject_code' => 'Subject code is required',
                'class_code' => 'Class code is required'
            ];

            $error = validateRequiredFields($requiredFields);
            if ($error) {
                header("Location: ../admin/edit_teacher.php?error=" . urlencode($error) . "&$data");
                exit;
            }

            if (!unameIsUnique($_POST['username'], $conct, $_POST['teacher_id'])) {
                $em = "Username is taken! Try another";
                header("Location: ../admin/edit_teacher.php?error=" . urlencode($em) . "&$data");
                exit;
            }

            $teacher_id = $_POST["teacher_id"];
            $fname = $_POST['f_name'];
            $lname = $_POST['l_name'];
            $uname = $_POST['username'];
            $subject_code = $_POST['subject_code'];
            $class_code = $_POST['class_code'];
            $address = $_POST['Address'];
            $password = isset($_POST['password']) ? trim($_POST['password']) : '';


            $teacher = getTeachersID($teacher_id, $conct);
            if ($teacher == null) {
                $em = "Teacher ID does not exist";
                header("Location: ../admin/edit_teacher.php?error=" . urlencode($em) . "&$data");
                exit;
            }
            if (!empty($password)) {

                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $sql = "UPDATE teacher SET username = ?, f_name = ?, l_name = ?, Address = ?, subject_code = ?, class_code = ?, password = ? WHERE teacher_id = ?";
                $stmt = $conct->prepare($sql);
                $stmt->execute([$uname, $fname, $lname, $address, $subject_code, $class_code, $hashedPassword, $teacher_id]);
                $sm = "Successfully updated information";
                header("Location: ../admin/edit_teacher.php?success=" . urlencode($sm));
                exit;
            } else {

                $sql = "UPDATE teacher SET username = ?, f_name = ?, l_name = ?, Address = ?, subject_code = ?, class_code = ? WHERE teacher_id = ?";
                $stmt = $conct->prepare($sql);
                $stmt->execute([$uname, $fname, $lname, $address, $subject_code, $class_code, $teacher_id]);
                $sm = "Successfully updated information";
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