<?php

function getAllStudents($conct)
{
    $sql = "SELECT 
                student.student_id,
                student.username,
                student.f_name,
                student.l_name,
                student.class_code,
                student.Address,
                class.class_name
            FROM 
                student
            LEFT JOIN 
                class ON student.class_code = class.class_code
            ORDER BY 
                student_id";

    $stmt = $conct->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return 0;
    }
}

function getStudentById($student_id, $conct)
{
    $sql = "SELECT * FROM student WHERE student_id = ?";
    $stmt = $conct->prepare($sql);
    $stmt->execute([$student_id]);

    if ($stmt->rowCount() == 1) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        return null;
    }
}

function addStudent($student_id, $username, $f_name, $l_name, $class_code, $address, $password, $conct)
{

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO student (student_id, username, f_name, l_name, class_code, Address, password) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conct->prepare($sql);
    return $stmt->execute([$student_id, $username, $f_name, $l_name, $class_code, $address, $hashedPassword]);
}

function updateStudent($student_id, $username, $f_name, $l_name, $class_code, $address, $password, $conct)
{
    $sql = "UPDATE student SET username = ?, f_name = ?, l_name = ?, class_code = ?, Address = ?";


    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql .= ", password = ?";
        $stmt = $conct->prepare($sql . " WHERE student_id = ?");
        return $stmt->execute([$username, $f_name, $l_name, $class_code, $address, $hashedPassword, $student_id]);
    } else {
        $stmt = $conct->prepare($sql . " WHERE student_id = ?");
        return $stmt->execute([$username, $f_name, $l_name, $class_code, $address, $student_id]);
    }
}

function deleteStudent($student_id, $conct)
{
    $sql = "DELETE FROM student WHERE student_id = ?";
    $stmt = $conct->prepare($sql);
    return $stmt->execute([$student_id]);
}

function getStudents($conct)
{
    $sql = "SELECT 
        student.student_id,student.f_name,student.l_name,student.username,student.Address,student.class_code,student_profiles.profile_picture,
        class.class_name 

    FROM 
        student
    LEFT JOIN 
        student_profiles ON student.student_id = student_profiles.student_id
    LEFT JOIN 
        class ON student.class_code = class.class_code 
    ORDER BY 
        student.student_id";

    $stmt = $conct->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $students;
    } else {
        return 0;
    }
}
?>