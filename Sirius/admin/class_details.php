<?php
session_start();
$admin_id = $_SESSION['f_name'] ?? 'Guest';

if (isset($_SESSION['admin_id']) && isset($_SESSION['usert']) && $_SESSION['usert'] == '1') {
    include "../dbConnection.php";
    include "../admin/data/students.php";
    include "../admin/data/class.php";

    $class_name = $_GET['class_name'] ?? '';


    if (empty($class_name)) {
        echo "Invalid class name.";
        exit;
    }


    $sql = "SELECT 
                c.class_code,
                s.username,
                c.class_time,
                c.Days
            FROM 
                class c
            JOIN 
                student s ON c.class_code = s.class_code
            WHERE 
                c.class_name = ?";

    $stmt = $conct->prepare($sql);
    $stmt->execute([$class_name]);
    $classDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin - Students</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="..\Css\Front.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body class="image_for_teacher">
        <div class="container mt-5">
            <h2 class="text-center">Class Details for <?= htmlspecialchars($class_name) ?></h2>

            <?php if (empty($classDetails)): ?>
                <div class="alert alert-warning" role="alert">
                    No records found for this class.
                </div>
            <?php else: ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Student Username</th>
                            <th>Class Code</th>
                            <th>Class Time</th>
                            <th>Days</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($classDetails as $detail): ?>
                            <tr>
                                <td><?= htmlspecialchars($detail['username']) ?></td>
                                <td><?= htmlspecialchars($detail['class_code']) ?></td>
                                <td><?= htmlspecialchars($detail['class_time']) ?></td>
                                <td><?= htmlspecialchars($detail['Days']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

            <div class="text-center mt-4">
                <a href="class.php" class="btn btn-dark">Back to Classes</a>
            </div>
        </div>
    </body>

    </html>
    <?php
} else {
    header("Location: ../login.php");
    exit();
}
?>