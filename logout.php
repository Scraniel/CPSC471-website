<?php

session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
echo 'You have been logged out. <a href="homepage.php">Go back</a>';

?>

