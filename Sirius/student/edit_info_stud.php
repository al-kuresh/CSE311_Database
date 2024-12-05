<?php
session_start();
$student_id = $_SESSION['student_id'] ?? null;

if (!isset($student_id)) {
    header("Location: ../login.php");
    exit;
}

include '../dbConnection.php';

// Fetch current student information
$sql = "SELECT f_name, l_name, username, Address FROM student WHERE student_id = ?";
$stmt = $conct->prepare($sql);
$stmt->execute([$student_id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$student) {
    echo "No student found with this ID.";
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $address = $_POST['Address'];

    // Update student information in the database
    $sql = "UPDATE student SET f_name = ?, l_name = ?, username = ?, password = ?, Address = ? WHERE student_id = ?";
    $stmt = $conct->prepare($sql);
    $stmt->execute([$f_name, $l_name, $username, password_hash($password, PASSWORD_DEFAULT), $address, $student_id]);

    // Redirect to a success page or back to the profile
    header("Location: index_student.php"); // Change to the appropriate page
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Student Information</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="..\Css\Front.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="student_home">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Student Information</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="f_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="f_name" name="f_name"
                    value="<?php echo htmlspecialchars($student['f_name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="l_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="l_name" name="l_name"
                    value="<?php echo htmlspecialchars($student['l_name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username"
                    value="<?php echo htmlspecialchars($student['username']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="Address" name="Address"
                    value="<?php echo htmlspecialchars($student['Address']); ?>" required>
            </div>
            <center><button type="submit" class="btn btn-primary">Update Information</button></center>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>