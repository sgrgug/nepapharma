<?php
// Before deleting session, first recreate session
session_start();

// Destroy all session data to logout
session_destroy();

// Redirect to login page after logout
header("location: login.php");
?>