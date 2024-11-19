<?php
session_start();
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
    </head>
    <body class="Home-page">
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
    </body>
    </html>
    <?php
    
} else {
    header("Location: ../login.php");
    exit;
}
?>
