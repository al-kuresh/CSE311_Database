<?php
session_start();
$admin_id = $_SESSION['f_name'] ?? 'Guest';
if (isset($_SESSION['admin_id']) && isset($_SESSION['usert'])) {
    if ($_SESSION['usert'] == '1') {
        include "../dbConnection.php";
        include "../admin/data/teachers.php";
        include "../admin/data/subject.php";
        $teacher = getAllTeachers($conct);
        $f_name='';
        $l_name='';
        $username='';
        $Address='';
        $subjects='';
        $subject_code='';
        $class_code='';


        function generateRandomPassword($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
            $password = '';
            for ($i = 0; $i < $length; $i++) {
                $password .= $characters[random_int(0, strlen($characters) - 1)];
            }
            return $password;
        }
        $password = generateRandomPassword(10);

    }

    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin - Add New Teacher</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="..\Css\Front.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="Front_nav">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="..\image\icon.webp" width="40">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#aboutModal">Teachers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#contactModal">Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#contactModal">Class</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#contactModal">Message</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#contactModal">Settings</a>
                        </li>
                    </ul>
                    <ul>
                        <li class="navbar-nav me-auto mb-2 mb-lg-0">
                            <a class="nav-link" href="../logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="container" style="margin-top: 50px;">
            <a href="teacher.php" class="btn btn-dark">Go Back</a>
        </div>
        
        <form  method="post" class="shadow p-3"action="" style="margin: 50px;">
                    <div class="login-header" action="req/addTeacher.php">
                        <h3>Add New Teacher</h3>
                        <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
           <?=$_GET['error']?>
          </div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert">
           <?=$_GET['success']?>
          </div>
        <?php } ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control"  value="<?=$f_name?>" name="f_name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control"  value="<?=$l_name?>"  name="l_name">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control"  value="<?=$username?>"name="username">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control"  value="<?=htmlspecialchars($Address)?>"name="Address">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password (By Default)</label>
                        <input type="text" class="form-control" name="password" value="<?= htmlspecialchars($password) ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Subject Code</label>
                        <input type="number" class="form-control"  value="<?=$subject_code?>"name="subject_code">
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Class Code</label>
                        <input type="text" class="form-control"  value="<?=$class_code?>"name="class_code">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Subject</label>
                        <select class="form-control" id="usert" name="usert">
                        <option value="" disabled selected>Choose an option</option>
                        <option value="1">Physics</option>
                            <option value="2">Chemistry</option>
                            <option value="3">Mathematics</option>
                            <option value="3">Biology</option>
                        </select>
                    </div>


                    <center><button type="submit" class="log-button">Submit</button></center>  
                </form>
       
      
    </div>

        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
       
</div>



       
    </body>

    </html>
    <?php

} else {
    header("Location: ../login.php");
    exit;
}
?>