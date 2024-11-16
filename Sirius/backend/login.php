<?php
session_start();
session_regenerate_id(true);

if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["usert"])) {
    $user = trim(filter_var($_POST["username"], FILTER_SANITIZE_STRING));
    $pass = trim($_POST["password"]);
    $type = trim($_POST["usert"]);

    include "../dbConnection.php";

    // Check for empty inputs
    if (empty($user)) {
        $em = urlencode("Give a valid Username");
        header("Location: ../login.php?error=$em");
        exit;
    } elseif (empty($pass)) {
        $em = urlencode("Give a valid Password");
        header("Location: ../login.php?error=$em");
        exit;
    } elseif (empty($type)) {
        $em = urlencode("There is a problem in your information");
        header("Location: ../login.php?error=$em");
        exit;
    }

    // Determine the user type and corresponding SQL query
    if ($type == '1') { // Admin
        $sql = "SELECT * FROM admin WHERE LOWER(username) = LOWER(?)";
    } elseif ($type == '2') { // Student
        $sql = "SELECT * FROM student WHERE LOWER(username) = LOWER(?)";
    } elseif ($type == '3') { // Teacher
        $sql = "SELECT * FROM teacher WHERE LOWER(username) = LOWER(?)";
    } else {
        error_log("Invalid user type: $type for username: $user");
        $em = urlencode("Invalid user type");
        header("Location: ../login.php?error=$em");
        exit;
    }

    // Execute the query
    $stmt = $conct->prepare($sql);
    $stmt->execute([$user]);

    // Check if user exists
    if ($stmt->rowCount() == 1) {
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $dbPassword = $userRow["password"]; // Hashed password from DB
        $fname = $userRow["f_name"];
        $id = $userRow["admin_id"] ?? $userRow["student_id"] ?? $userRow["teacher_id"];

        // Debugging fetched data
        error_log("Fetched Password Hash: $dbPassword for user: $user");

        // Verify password
        if (password_verify($pass, $dbPassword)) {
            // Store session variables
            $_SESSION['id'] = $id;
            $_SESSION['f_name'] = $fname;
            $_SESSION['usert'] = $type;

            error_log("User $user successfully logged in as type $type.");
            header("Location: ../Home-Page.php");
            exit;
        } else {
            error_log("Password verification failed for user: $user. Input: $pass, Stored Hash: $dbPassword");
            $em = urlencode("Invalid Username or Password");
            header("Location: ../login.php?error=$em");
            exit;
        }
    } else {
        error_log("No user found for username: $user in table corresponding to user type $type.");
        $em = urlencode("Invalid Username or Password");
        header("Location: ../login.php?error=$em");
        exit;
    }
} else {
    header("Location: ../login.php");
    exit;
}
?>
