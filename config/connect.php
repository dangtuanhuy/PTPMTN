<?php
    $conn = new mysqli("localhost", "root", "mysql", "manage");
    if ($conn->connect_errno) {
        printf("Connect failed: %s\n", $conn->connect_error);
        exit();
    }
   mysqli_set_charset($conn,'utf8');
?>
