<?php
session_start();
$teacher_id = $_SESSION['teacher_id'] ?? null;

if (!isset($teacher_id)) {
    header("Location: ../login.php");
    exit;
}

include '../dbConnection.php';
include '../admin/data/teachers.php';


$teachers = getTeachers($conct);
$current_teacher = null;

foreach ($teachers as $teacher) {
    if ($teacher['teacher_id'] == $teacher_id) {
        $current_teacher = $teacher;
        break;
    }
}

if (!$current_teacher) {
    echo "No teacher found with this ID.";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $address = $_POST['Address'];


    $profile_picture = $current_teacher['profile_picture'];
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profile_picture']['tmp_name'];
        $fileName = $_FILES['profile_picture']['name'];
        $fileSize = $_FILES['profile_picture']['size'];
        $fileType = $_FILES['profile_picture']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));


        $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg', 'webp');
        if (in_array($fileExtension, $allowedfileExtensions) && $fileSize < 5000000) {
            $uploadFileDir = '../image/';
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $dest_path = $uploadFileDir . $newFileName;


            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $profile_picture = $newFileName;
            } else {
                echo "There was an error moving the uploaded file.";
            }
        } else {
            echo "Upload failed. Allowed file types: " . implode(", ", $allowedfileExtensions);
        }
    }


    $sql = "UPDATE teacher SET f_name = ?, l_name = ?, username = ?, password = ?, Address = ? WHERE teacher_id = ?";
    $stmt = $conct->prepare($sql);
    $stmt->execute([$f_name, $l_name, $username, password_hash($password, PASSWORD_DEFAULT), $address, $teacher_id]);

    $sql = "UPDATE teacher_profiles SET profile_picture = ? WHERE teacher_id = ?";
    $stmt = $conct->prepare($sql);
    if ($stmt->execute([$profile_picture, $teacher_id])) {
        echo "Profile picture updated successfully.";
    } else {
        echo "Failed to update profile picture: " . implode(", ", $stmt->errorInfo());
    }

    header("Location: index_teacher.php");
    exit;
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Teacher Information</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="..\Css\Front.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="teacher_home">
    <div class="container">
        <h2>Edit Teacher Information</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="f_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="f_name" name="f_name"
                    value="<?php echo htmlspecialchars($current_teacher['f_name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="l_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="l_name" name="l_name"
                    value="<?php echo htmlspecialchars($current_teacher['l_name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username"
                    value="<?php echo htmlspecialchars($current_teacher['username']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="Address" class="form-label">Address</label>
                <input type="text" class="form-control" id="Address" name="Address"
                    value="<?php echo htmlspecialchars($current_teacher['Address']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Profile Picture</label>
                <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                <small class="form-text text-muted">Current Picture: <img
                        src="../images/<?php echo htmlspecialchars($current_teacher['profile_picture']); ?>"
                        alt="Profile Picture" style="width: 100px; height: auto;"></small>
            </div>
            <button type="submit" class="btn btn-primary">Update Information</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>