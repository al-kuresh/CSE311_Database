<?php
session_start();
$admin_id = $_SESSION['f_name'] ?? 'Guest';
if (isset($_SESSION['admin_id']) && isset($_SESSION['usert'])) {
    if ($_SESSION['usert']=='1') {}
    
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sirius - Home Page</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="..\Css\Front.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body >
   
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="Front_nav">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <img src="..\image\icon.webp" width="40" >
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="navLinks">
                                <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#" >Welcome to Sirius, <?= htmlspecialchars($_SESSION['f_name']) ?>!</a>
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
                <div class="container mt-5">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 text-center">
        <a href="#" class="col btn btn-dark m-2 py-3">
        <i class="fa fa-users" aria-hidden="true"></i><br>
            Teachers
        </a>
        <a href="#" class="col btn btn-dark m-2 py-3">
        <i class="fa fa-graduation-cap" aria-hidden="true"></i><br>
            Students
        </a>
        <a href="#" class="col btn btn-dark m-2 py-3">
        <i class="fa fa-leanpub" aria-hidden="true"></i>
        <br>
            Class
        </a>
        <a href="#" class="col btn btn-dark m-2 py-3">
        <i class="fa fa-book" aria-hidden="true"></i>
        <br>
            Subjects
        </a>
        <a href="#" class="col btn btn-dark m-2 py-3">
        <i class="fa fa-clock-o" aria-hidden="true"></i>
        <br>
            Schedule
        </a>
        <a href="#" class="col btn btn-dark m-2 py-3">
        <i class="fa fa-commenting" aria-hidden="true"></i>
        <br>
            Message
        </a>
        <a href="#" class="col btn btn-dark m-2 py-3">
        <i class="fa fa-cogs" aria-hidden="true"></i>
        <br>
            Settings
        </a>
        <a href="#" class="col btn btn-dark m-2 py-3">
        <i class="fa fa-sign-out" aria-hidden="true"></i>
        <br>
           Logout
        </a>
    </div>
</div>
        <div class="h_blurr">
            <div class="d-flex justify-content-center align-items-center vh-100">
                <div class="shadow w-500 p-3 text-center bg-light">
                    <small>
                        <b>
                            <?php
                            switch ($_SESSION["usert"]) {
                                case '1':
                                    echo "Admin";
                                    break;
                                case '2':
                                    echo "Student";
                                    break;
                                case '3':
                                    echo "Teacher";
                                    break;
                                default:
                                    echo "Unknown";
                                    break;
                            }
                            ?>
                        </b><br>
                        <h5 class="display-5"><?= htmlspecialchars($_SESSION["f_name"]) ?></h5>
                        <a href="../Logout.php" class="btn btn-danger">Log Out</a>
                    </small>
                </div>
            </div>
        </div>
        

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script>
           $(document).ready(function(){
    console.log("Document ready");
    $("#navLinks li:nth-child(1) a").addClass('active');
});

        </script>
    </body>
    </html>
    <?php
    
} else {
    header("Location: ../login.php");
    exit;
}
?>
