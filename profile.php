<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <style>
        body { font-family: Arial; background: #eef5ff; padding: 30px; }
        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 400px;
            margin: auto;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        h2 { color: #28a745; }
        p { font-size: 16px; line-height: 1.6; }
        .pro{
            display: flex;
            height:50px;
            align-items: center;
            justify-content: space-evenly;
        }
        .same{
            height: 50px;
            width: 100px;
            border-radius: 10px;
            background-color: #28a745;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .same a{
            font-size: 20px;
            text-decoration: none;
            text-align: center;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Welcome, <?= htmlspecialchars($user['fullname']) ?>!</h2>
        <p><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
        <p><strong>Phone:</strong> <?= htmlspecialchars($user['phone']) ?></p>
        <p><strong>Gender:</strong> <?= htmlspecialchars($user['gender']) ?></p>
        <div class="pro">
            <div class="same"><a href="logout.php">Logout</a></div>
            <div class="same"><a href="index.html">Home</div>
        </div>
        
    </div>
</body>
</html>
