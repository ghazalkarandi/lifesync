<?php
session_start();

// اتصال به دیتابیس
$host = "sql206.infinityfree.com";
$dbname = "ifo_33870887_lifesync_db";
$username = "ifo_33870887";
$password = "ghazal202018";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES 'utf8'");
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        header("Location: todolist.php");
        exit();
    } else {
        echo "ایمیل یا رمز عبور اشتباه است.";
    }
}
?>