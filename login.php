<?php
session_start();
$conn = new mysqli("localhost", "root", "", "ev_portal");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM accounts WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        echo "<script>alert('Login successful!'); window.location.href='profile.php';</script>";
    } else {
        echo "<script>alert('Invalid password.'); window.location.href='login.html';</script>";
    }
} else {
    echo "<script>alert('User not found.'); window.location.href='login.html';</script>";
}

$conn->close();
?>
