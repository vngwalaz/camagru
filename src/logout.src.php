<?php 
    include_once '../database/connect.php';
    include_once '../resources/utilities.php';

    if (isset($_POST['submit'])) {
        session_start();
        session_unset();
        session_destroy();
        redirectTo("index");
        exit();
    }
?>