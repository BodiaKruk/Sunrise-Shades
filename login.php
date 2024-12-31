<?php
require 'db.php';

$host = '150.238.148.25:23050';
$db = 'SunRiseShades';
$user = 'Denys';
$password = 'denyscivic';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username_or_email = $_POST['username_or_email'];
    $password = $_POST['password'];

    // Пошук користувача за email або username
    $sql = "SELECT * FROM users WHERE email = :input OR username = :input";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['input' => $username_or_email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        echo "Авторизація успішна!";
        // Тут ви можете створити сесію або перенаправити на іншу сторінку
    } else {
        echo "Невірний email, ім'я користувача або пароль.";
    }
}
?>
