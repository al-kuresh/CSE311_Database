<?php
session_start();
$teacher_id = $_SESSION['teacher_id'] ?? null;

if (isset($_SESSION['teacher_id']) && isset($_SESSION['usert'])) {
    if ($_SESSION['usert'] == '3') {
        include '../dbConnection.php';
        include "../admin/data/teachers.php";
        include "../admin/data/class.php";

        $sql = "SELECT 
            t.teacher_id,
            t.f_name AS teacher_first_name,
            t.l_name AS teacher_last_name,
            t.username,
            t.Address,
            tp.profile_picture,
            c.class_code,
            c.class_name,
            c.days,
            c.class_time,
            s.student_id,
            CONCAT(s.f_name, ' ', s.l_name) AS student_name
        FROM 
            teacher t
        JOIN 
            teacher_profiles tp ON t.teacher_id = tp.teacher_id
        JOIN 
            class c ON t.class_code = c.class_code
        LEFT JOIN 
            student s ON c.class_code = s.class_code
        WHERE 
            t.teacher_id = ?";

        $stmt = $conct->prepare($sql);
        $stmt->execute([$teacher_id]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$results) {
            echo "No information found for this teacher.";
            exit;
        }


        $teacher = $results[0];
        $classes = [];
        $students = [];

        foreach ($results as $row) {

            $class_code = $row['class_code'];
            if (!isset($classes[$class_code])) {
                $classes[$class_code] = [
                    'class_code' => $row['class_code'],
                    'class_name' => $row['class_name'],
                    'days' => $row['days'],
                    'class_time' => $row['class_time'],
                    'students' => []
                ];
            }


            if ($row['student_id']) {
                $classes[$class_code]['students'][] = [
                    'student_id' => $row['student_id'],
                    'student_name' => $row['student_name']
                ];
            }
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
    <title>Teacher - Home Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="..\Css\Front.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="teacher_home">
    <div class="container mt-5">
        <h1 class="text-center mb-4" style="color: white;">Teacher Information</h1>
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="../image/<?php echo htmlspecialchars($teacher['profile_picture']); ?>" alt="Profile Picture"
                    class="profile-picture">
            </div>
            <div class="col-md-8">
                <div class="card teacher-card">
                    <div class="card-header">Details for Teacher ID:
                        <?php echo htmlspecialchars($teacher['teacher_id']); ?>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>First Name:</strong>
                                <?php echo htmlspecialchars($teacher['teacher_first_name']); ?></li>
                            <li class="list-group-item"><strong> Last Name:</strong>
                                <?php echo htmlspecialchars($teacher['teacher_last_name']); ?></li>
                            <li class="list-group-item"><strong>Username:</strong>
                                <?php echo htmlspecialchars($teacher['username']); ?></li>
                            <li class="list-group-item"><strong>Address:</strong>
                                <?php echo htmlspecialchars($teacher['Address']); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="text-center mt-4" style="color: white;">Classes Taken</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card class-card">
                    <div class="card-header">Classes</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php foreach ($classes as $class): ?>
                                <li class="list-group-item">
                                    <strong>Class Code:</strong> <?php echo htmlspecialchars($class['class_code']); ?>
                                    <hr>
                                    <strong>Class Name:</strong> <?php echo htmlspecialchars($class['class_name']); ?>
                                    <hr>
                                    <strong>Days:</strong> <?php echo htmlspecialchars($class['days']); ?>
                                    <hr>
                                    <strong>Class Time:</strong> <?php echo htmlspecialchars($class['class_time']); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="text-center mt-4" style="color: white;">Students in Class</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card student-card">
                    <div class="card-header">Students</div>
                    <div class="card-body">
                        <?php foreach ($classes as $class): ?>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($class['students'] as $student): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($student['student_id']); ?></td>
                                            <td><?php echo htmlspecialchars($student['student_name']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="../logout.php" class="btn logout-btn">
                <i class="fa fa-sign-out" aria-hidden="true"></i>Logout
            </a>
            <a href="edit_info_teacher.php" class="btn logout-btn">
                <i class="fa fa-edit" aria-hidden="true"></i> Edit
            </a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>