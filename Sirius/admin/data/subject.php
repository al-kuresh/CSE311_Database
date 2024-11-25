<?php 

function getAllSubjects($conct){
   $sql = "SELECT * FROM subjects";
   $stmt = $conct->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $subjects = $stmt->fetchAll();
     return $subjects;
   }else {
   	return 0;
   }
}
function getSubjectByCode($subject_code, $conn){
   $sql = "SELECT * FROM subjects
           WHERE subject_code=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$subject_code]);

   if ($stmt->rowCount() == 1) {
     $subject = $stmt->fetch();
     return $subject;
   }else {
   	return 0;
   }
}

 ?>