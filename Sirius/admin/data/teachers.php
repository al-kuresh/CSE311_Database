<?php
function getAllTeachers($conct){
    $sql = "SELECT * FROM teacher";
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