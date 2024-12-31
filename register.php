<?php

$host = '150.238.148.25:23050';
$db = 'SunRiseShades';
$user = 'Denys';
$password = 'denyscivic';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        die("Паролі не збігаються.");
    }

    // Хешування пароля
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Вставка нового користувача
    $sql = "INSERT INTO users (email, username, password) VALUES (:email, :username, :password)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute(['email' => $email, 'username' => $username, 'password' => $hashed_password]);
        echo "Реєстрація успішна! <a href='login.html'>Увійти</a>";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "Користувач з таким email або ім'ям вже існує.";
        } else {
            echo "Помилка: " . $e->getMessage();
        }
    }
}
?>
