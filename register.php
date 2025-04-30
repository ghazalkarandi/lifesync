<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // ذخیره اطلاعات تو یه فایل متنی
    $data = "Name: $name, Email: $email, Password: $password\n";
    file_put_contents('users.txt', $data, FILE_APPEND);

    // هدایت به صفحه تودولیست
    header("Location: todo.html");
    exit();
}
?>