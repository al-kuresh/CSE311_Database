<?php
function getAllTeachers($conct){
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
    teacher.subject_code = subjects.subject_code";
    $stmt = $conct->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount()>=1){
        $teacher = $stmt -> fetchAll();
        return $teacher;
    } else {
        return 0;
    }
}
?>