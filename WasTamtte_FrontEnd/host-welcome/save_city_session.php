<?php
session_start();
if(isset($_GET['city'])) {
    $_SESSION['city'] = $_GET['city'];
    header("Location: location-step.php");
    exit();
}
?>
