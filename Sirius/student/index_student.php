<?php
session_start();
$student_id = $_SESSION['student_id'] ?? null;


if (isset($_SESSION['student_id']) && isset($_SESSION['usert'])) {
    if ($_SESSION['usert'] == '2') {
        include '../dbConnection.php';
        include "../admin/data/teachers.php";
        include "../admin/data/class.php";
        $sql = "SELECT 
        s.student_id,
        s.f_name,
        s.l_name,
        s.username,
        s.Address,
        sp.profile_picture,  
        c.class_code,
        c.class_name,
        c.days,
        c.class_time,
        CONCAT(t.f_name, ' ', t.l_name) AS teacher_full_name,
        c.student_payment
    FROM 
        student s
    JOIN 
        student_profiles sp ON s.student_id = sp.student_id  
    JOIN 
        class c ON s.class_code = c.class_code
    JOIN 
        teacher t ON c.class_code = t.class_code
    
    WHERE 
        s.student_id = ?";

        $stmt = $conct->prepare($sql);
        $stmt->execute([$student_id]);
        $student = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$student) {
            echo "No student found with this ID.";
            exit;
        }



    }
} else {

    header("Location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student - Home Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="..\Css\Front.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #343a40;
        }

        .list-group-item {
            background-color: #ffffff;
            border: none;
            border-bottom: 1px solid #e9ecef;
        }

        .list-group-item:last-child {
            border-bottom: none;
        }

        .btn-dark {
            background-color: #343a40;
            border: none;
        }

        .btn-dark:hover {
            background-color: #23272b;
        }
    </style>
</head>


<body class="admin_home">

    <div class="container mt-5">
        <h2 class="text-center mb-4">Student Information</h2>
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="/images/<?php echo htmlspecialchars($student['profile_picture']); ?>" alt="Profile Picture"
                    class="img-fluid rounded-circle" style="max-width: 200px; max-height: 200px;">
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Details for Student ID:
                            <?php echo htmlspecialchars($student['student_id']); ?>
                        </h5>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>First Name:</strong>
                                <?php echo htmlspecialchars($student['f_name']); ?></li>
                            <li class="list-group-item"><strong>Last Name:</strong>
                                <?php echo htmlspecialchars($student['l_name']); ?></li>
                            <li class="list-group-item"><strong>Username:</strong>
                                <?php echo htmlspecialchars($student['username']); ?></li>
                            <li class="list-group-item"><strong>Address:</strong>
                                <?php echo htmlspecialchars($student['Address']); ?></li>
                            <li class="list-group-item"><strong>Class Code:</strong>
                                <?php echo htmlspecialchars($student['class_code']); ?></li>
                            <li class="list-group-item"><strong>Class Name:</strong>
                                <?php echo htmlspecialchars($student['class_name']); ?></li>
                            <li class="list-group-item"><strong>Days:</strong>
                                <?php echo htmlspecialchars($student['days']); ?></li>
                            <li class="list-group-item"><strong>Class Time:</strong>
                                <?php echo htmlspecialchars($student['class_time']); ?></li>
                            <li class="list-group-item"><strong>Teacher:</strong>
                                <?php echo htmlspecialchars($student['teacher_full_name']); ?></li>
                            <li class="list-group-item"><strong>Payment Status:</strong>
                                <?php echo htmlspecialchars($student['student_payment']); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="text-center mt-4">
            <a href="../logout.php" class="btn btn-dark m-2 py-3">
                <i class="fa fa-sign-out" aria-hidden="true"></i><br>
                Logout
            </a>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>