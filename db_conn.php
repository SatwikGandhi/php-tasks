<?php 
    $conn = mysqli_connect('localhost', 'satwik', '1234', 'phptasks');

    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }
?>
