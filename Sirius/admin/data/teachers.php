<?php
function getAllTeachers($conct){
    $sql = "SELECT * FROM teacher";
    $stmt = $conct->prepare($sql);
    $stmt->execute();

    iif ($stmt->rowCount()>=1){
        $teacher = $stmt -> fetchAll();
        return $tecaher;
    } else {
        return 0;
    }
}
?>