<?php
session_start();
session_regenerate_id(true); // Regenerate session ID for security

if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["usert"])) {
    $user = trim($_POST["username"]);
    $pass = trim($_POST["password"]);
    $type = trim($_POST["usert"]);

    include "../dbConnection.php";

    // Check for empty inputs
    if (empty($user)) {
        $em = urlencode("Please provide a valid username.");
        header("Location: ../login.php?error=$em");
        exit;
    } elseif (empty($pass)) {
        $em = urlencode("Please provide a valid password.");
        header("Location: ../login.php?error=$em");
        exit;
    } elseif (empty($type)) {
        $em = urlencode("User type is missing.");
        header("Location: ../login.php?error=$em");
        exit;
    }

    // Determine the table to query based on user type
    $table = "";
    if ($type == '1') { // Admin
        $table = "admin";
    } elseif ($type == '2') { // Student
        $table = "student";
    } elseif ($type == '3') { // Teacher
        $table = "teacher";
    } else {
        $em = urlencode("Invalid user type.");
        header("Location: ../login.php?error=$em");
        exit;
    }

    // Prepare the SQL query
    $sql = "SELECT * FROM $table WHERE username = ?";
    $stmt = $conct->prepare($sql);
    $stmt->execute([$user]);

    // Check if user exists
    if ($stmt->rowCount() == 1) {
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $dbPassword = $userRow["password"]; // Hashed password from DB
        $fname = $userRow["f_name"];
      

        // Verify password
        if (password_verify($pass, $dbPassword)) {
            // Store session variables
            
            $_SESSION['f_name'] = $fname;
            $_SESSION['usert'] = $type;
            if ($type == '1') { // Admin
                $id = $userRow["admin_id"];
                $_SESSION['admin_id'] = $id;
                header("Location: ../admin/index.php");
                exit;
            } 

           
        } else {
            $em = urlencode("Invalid username or password.");
            header("Location: ../login.php?error=$em");
            exit;
        }
    } else {
        $em = urlencode("Invalid username or password.");
        header("Location: ../login.php?error=$em");
        exit;
    }
} else {
    header("Location: ../login.php");
    exit;
}
?>
