<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Дневник путешествий</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Добро пожаловать в Дневник путешествий!</h1>
    <p>Здесь вы можете записывать свои путешествия, делиться впечатлениями и просматривать путешествия других пользователей.</p>
    
    <?php if (isset($_SESSION['username'])): ?>
        <p>Добро пожаловать, <?php echo htmlspecialchars($_SESSION['username']); ?>! <br><br><a href="add_trip.php" class="blue-button">Добавить своё путешествие</a> | <a href="view_trips.php" class="blue-button">Посмотреть все путешествия</a> | <a href="logout.php" class="blue-button">Выйти</a></p>
    <?php else: ?>
        <p><a href="register.php" class="blue-button">Зарегистрироваться</a> | <a href="login.php" class="blue-button">Войти</a></p>
    <?php endif; ?>
</body>
</html>