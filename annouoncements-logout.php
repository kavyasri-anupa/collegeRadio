<?php
session_start();
session_unset();
session_destroy();
header("Location:announcements-signup.php");
echo'logged out';
?>