<?php 
function getClassbyCode($class_code, $conn){
    $sql = "SELECT * FROM class
            WHERE class_code=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$class_code]);
 
    if ($stmt->rowCount() == 1) {
      $class_code = $stmt->fetch();
      return $class_code;
    }else {
        return 0;
    }
 }

?>