<?php
session_start();
include 'config.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$key = 'secretkey123'; 

// Function to send email
function sendResetEmail($email, $token) {
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'noreply.pancacode@gmail.com'; 
        $mail->Password = 'rplg tosb csbr sfqx'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipient and sender
        $mail->setFrom('noreply.pancacode@gmail.com', 'Don`t Reply to this email, you cannot get an answer');
        $mail->addAddress($email);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = "Reset Your Password";
        $mail->Body    = "Click the link below to reset your password:<br><a href='http://localhost/pos/reset_password?token=".urlencode($token)."'>Reset Password</a>
        <p>If you need anything, contact the developer <a href='http://wa.me/+6285161934342'>WhatsApp</a></p>";

        // Send email
        $mail->send();
        echo "The password reset link has been sent to your email.";
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $nope = $_POST['nope']; 

    // Validate email and phone number input
    if (!empty($email) && !empty($nope)) {
        // Query to check email and phone number
        $sql = "SELECT * FROM tb_datapegawai WHERE email = ? AND nope = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $nope);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // If data found
            $row = $result->fetch_assoc();
            $sql_pekerja = "SELECT session FROM tb_pekerja WHERE id_pegawai = ?";
            $stmt_pekerja = $conn->prepare($sql_pekerja);
            $stmt_pekerja->bind_param("i", $row['id_pegawai']);
            $stmt_pekerja->execute();
            $result_pekerja = $stmt_pekerja->get_result();

            if ($result_pekerja->num_rows > 0) {
                $row_pekerja = $result_pekerja->fetch_assoc();
                $token = $row_pekerja['session']; 

                // Send email with the password reset link
                sendResetEmail($email, $token);
            } else {
                echo 'Session not found.';
            }
        } else {
            echo 'Email or phone number not found.';
        }
    } else {
        echo 'Please enter a valid email and phone number.';
    }
}
?>
