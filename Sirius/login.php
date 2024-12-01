<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOG IN</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Css\Front.css">
</head>

<body class="login-body">
    <div class="blurr"> <br />
        <div class="d-flex justify-content-center align-items-center" id="login-box">

            <form class="login-form" method="post" action="backend\login.php">
                <div class="login-header">
                    <h3>LOG-IN</h3>
                    <?php
                    if (isset($_GET['error'])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $_GET['error'] ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="mb-3">
                    <label class="form-label">User Type</label>
                    <select class="form-control" id="usert" name="usert">
                    <option value="" disabled selected>Choose an option</option>
                        <option value="1">Admin</option>
                        <option value="2">Student</option>
                        <option value="3">Teacher</option>
                    </select>
                </div>
                <center><button type="submit" class="log-button">Log In</button></center>
            </form>


        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>