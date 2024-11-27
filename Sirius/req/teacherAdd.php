
<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['usert'])) {

    if ($_SESSION['usert'] == 'Admin') {
    	

if (isset($_POST['f_name']) &&
    isset($_POST['l_name']) &&
    isset($_POST['username']) &&
    isset($_POST['password']) &&
    isset($_POST['subjects']) )
     {
    
    include '../../dbConnection.php';
    include "../data/teacher.php";

    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $uname = $_POST['username'];
    $pass = $_POST['password'];
    
   
    $subjects = "";
    foreach ($_POST['subjects'] as $subject) {
    	$subjects .=$subject;
    }
    $data = 'username='.$username.'&f_name='.$fname.'&l_name='.$lname;

    if (empty($f_name)) {
		$em  = "First name is required";
		header("Location: ../teacher-add.php?error=$em&$data");
		exit;
	}else if (empty($l_name)) {
		$em  = "Last name is required";
		header("Location: ../teacher-add.php?error=$em&$data");
		exit;
	}else if (empty($username)) {
		$em  = "Username is required";
		header("Location: ../teacher-add.php?error=$em&$data");
		exit;
	}else if (!unameIsUnique($username, $conct)) {
		$em  = "Username is taken! try another";
		header("Location: ../teacher-add.php?error=$em&$data");
		exit;
	}else if (empty($pass)) {
		$em  = "Password is required";
		header("Location: ../teacher-add.php?error=$em&$data");
		exit;
	}else {
    
        $pass = password_hash($password, PASSWORD_DEFAULT);

        $sql  = "INSERT INTO
                 teachers(username, password, f_name, l_name, subjects)
                 VALUES(?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, $password, $f_name, $l_name, $subject]);
        $sm = "New teacher registered successfully";
        header("Location: ../teacher-add.php?success=$sm");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../teacher-add.php?error=$em");
    exit;
  }

  }else {
    header("Location: ../../logout.php");
    exit;
  } 
}else {
	header("Location: ../../logout.php");
	exit;
} 