<?php
session_start();

$valid_username = 'admin';
$valid_password = 'adminpassword';

$username = $_POST['username'];
$password = $_POST['password'];

if ($username === $valid_username && $password === $valid_password) {
    $_SESSION['logged_in'] = true;
    header('Location: fan.html');
} else {
    echo 'Invalid credentials. <a href="fan.html">Try again</a>';
}
?>
