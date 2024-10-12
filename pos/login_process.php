<?php
session_start();
include 'config.php';

// Function to generate a random string
function generateRandomSession($length = 255) {
    return bin2hex(random_bytes($length / 2)); 
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate input before use
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Use prepared statements to prevent SQL Injection
        $sql = "SELECT * FROM tb_pekerja WHERE username = ?";
        $stmt = $conn->prepare($sql);
        
        if ($stmt) { // Check if the statement was prepared successfully
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                // Verify password with the hash stored in the database
                if (password_verify($password, $user['password'])) {
                    // If the password is correct, login is successful
                    $_SESSION['logged_in'] = true;
                    $_SESSION['username'] = $username;

                    // Generate random session string
                    $randomSession = generateRandomSession();

                    // Update last login session with random session
                    $updateSession = "UPDATE tb_pekerja SET session=? WHERE username=?";
                    $updateStmt = $conn->prepare($updateSession);
                    $updateStmt->bind_param("ss", $randomSession, $username);
                    $updateStmt->execute();

                    header('Location: index'); // Redirect to index
                    exit;
                } else {
                    echo 'Login failed. Incorrect password.';
                }
            } else {
                echo 'Login failed. Username not found.';
            }
        } else {
            echo 'Failed to prepare statement: ' . $conn->error;
        }
    } else {
        echo 'Please enter username and password.';
    }
}
?>
