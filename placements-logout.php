<?php
session_start();
session_unset();
session_destroy();
header("Location:placements.php?&account:loggedout");
echo'logged out';
?>