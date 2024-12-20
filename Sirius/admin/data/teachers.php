<?php
function getAllTeachers($conct)
{
    $sql = "SELECT * FROM teacher";
    $sql = "SELECT 
    teacher.teacher_id,
    teacher.f_name,
    teacher.l_name,
    teacher.username,
    teacher.Address,
    teacher.class_code,
    subjects.subject

FROM 
    teacher
LEFT JOIN 
    subjects 
ON 
    teacher.subject_code = subjects.subject_code order by teacher_id";
    $stmt = $conct->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $teacher = $stmt->fetchAll();
        return $teacher;
    } else {
        return 0;
    }
}

function DeleteTeachers($teacher_id, $conct)
{
    $sql = "DELETE FROM teacher where teacher_id =?";
    $stmt = $conct->prepare($sql);
    $del = $stmt->execute([$teacher_id]);
    if ($del) {
        return true;
    } else {
        return false;
    }
}

function getTeachersID($teacher_id, $conct)
{
    $sql = "SELECT * FROM teacher WHERE teacher_id = ?";
    $stmt = $conct->prepare($sql);
    $stmt->execute([$teacher_id]);

    if ($teacher = $stmt->fetch()) {
        return $teacher;
    } else {
        return null;
    }
}

function getTeachers($conct)
{
    $sql = "SELECT 
        teacher.teacher_id,teacher.f_name,teacher.l_name,teacher.username,teacher.Address,teacher.class_code,teacher_profiles.profile_picture,
        class.class_name 

    FROM 
        teacher
    LEFT JOIN 
        teacher_profiles ON teacher.teacher_id = teacher_profiles.teacher_id
    LEFT JOIN 
        class ON teacher.class_code = class.class_code 
    ORDER BY 
        teacher.teacher_id";

    $stmt = $conct->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $teachers;
    } else {
        return 0;
    }
}
?>