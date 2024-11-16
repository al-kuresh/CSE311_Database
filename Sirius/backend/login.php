<?php

if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["usert"]))
{
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $type = $_POST["usert"];

    if ( empty($user))
    {
        $em = "Give a valid Username";
        header("Location: ../login.php ? error=$em");
        exit;
    }
    elseif ( empty($pass) )
    {
        $em = "Give a valid Password";
        header("Location: ../login.php ? error=$em");
        exit;
    }
    elseif ( empty($type) )
    {
        $em = "There is a problem in your information";
        header("Location: ../login.php ? error=$em");
        exit;
    }
    else
    {
        
    }
}

else
{
    header("Location: ../login.php");
    exit;
}