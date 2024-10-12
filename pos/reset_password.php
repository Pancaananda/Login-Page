<?php
session_start();
include 'config.php'; // Database connection file

// Check token
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check token in the database
    $sql = "SELECT id_pegawai FROM tb_pekerja WHERE session = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "Invalid token.";
        exit;
    }
} else {
    echo "Token not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/style.css"> 
    <title>Reset Password</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <h1>Reset Password</h1>
            <input type="hidden" name="id_pegawai" value="<?php echo $result->fetch_assoc()['id_pegawai']; ?>">
            <input type="password" name="new_password" placeholder="New Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Change Password</button>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_pegawai = $_POST['id_pegawai'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // Validate password
        if ($new_password !== $confirm_password) {
            echo "<script>alert('Passwords do not match!');</script>";
        } else {
            // Hashing password
            $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

            // Update password in the database
            $sql_update = "UPDATE tb_pekerja SET password = ? WHERE id_pegawai = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("si", $hashed_password, $id_pegawai);
            if ($stmt_update->execute()) {
                echo "<script>alert('Password successfully changed!'); window.location.href='login.php';</script>";
            } else {
                echo "<script>alert('Failed to change password.');</script>";
            }
        }
    }
    ?>
</body>
</html>
