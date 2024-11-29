<?php
session_start();
session_regenerate_id(true);

if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["usert"])) {
    $user = trim($_POST["username"]);
    $pass = trim($_POST["password"]);
    $type = trim($_POST["usert"]);

    include "../dbConnection.php";


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


    $table = "";
    if ($type == '1') {
        $table = "admin";
    } elseif ($type == '2') {
        $table = "student";
    } elseif ($type == '3') {
        $table = "teacher";
    } else {
        $em = urlencode("Invalid user type.");
        header("Location: ../login.php?error=$em");
        exit;
    }


    $sql = "SELECT * FROM $table WHERE username = ?";
    $stmt = $conct->prepare($sql);
    $stmt->execute([$user]);


    if ($stmt->rowCount() == 1) {
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $dbPassword = $userRow["password"];
        $fname = $userRow["f_name"];



        if (password_verify($pass, $dbPassword)) {


            $_SESSION['f_name'] = $fname;
            $_SESSION['usert'] = $type;
            if ($type == '1') {
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