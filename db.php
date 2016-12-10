<?php
$conn = mysqli_connect('localhost', 'webacademy', 'webacademy');
$db = mysqli_select_db($conn, 'webacademy');

if(mysqli_connect_errno()){
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit;
}