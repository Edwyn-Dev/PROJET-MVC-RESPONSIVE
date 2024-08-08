<?php
// Start the session
session_start();

// Destroy the current session
session_destroy();

// Redirect the user to the index page
header('Location: index.php');

// Ensure no further code is executed after the redirect
exit;
?>
