<?php
$conn = new mysqli("localhost", "root", "", "ev_users");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get and sanitize form data
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$gender = $_POST['gender'];

if ($password !== $cpassword) {
    echo "<script>alert('Passwords do not match.'); window.location.href='signup.html';</script>";
    exit();
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (fullname, username, email, phone, password, gender)
        VALUES ('$fullname', '$username', '$email', '$phone', '$hashed_password', '$gender')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Signup successful!'); window.location.href='login.html';</script>";
} else {
    echo "<script>alert('Error: " . $conn->error . "'); window.location.href='signup.html';</script>";
}

$conn->close();
?>
