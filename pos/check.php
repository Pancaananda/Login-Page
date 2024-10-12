<?php
session_start();

// Set timeout duration (3 hours in seconds)
$timeout_duration = 3 * 60 * 60; 

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login'); 
    exit;
}

// Check the last activity time
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    session_unset(); 
    session_destroy(); 
    header('Location: login'); 
    exit;
}

// Update last activity time
$_SESSION['last_activity'] = time();
?>
