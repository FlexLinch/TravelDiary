<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $location = $_POST['location'];
    $image = $_POST['image'];
    $cost = $_POST['cost'];
    $cultural_sites = $_POST['cultural_sites'];
    $places_to_visit = $_POST['places_to_visit'];
    $mobility_rating = $_POST['mobility_rating'];
    $safety_rating = $_POST['safety_rating'];
    $population_density_rating = $_POST['population_density_rating'];
    $vegetation_rating = $_POST['vegetation_rating'];

    $stmt = $pdo->prepare("INSERT INTO trips (user_id, location, image, cost, cultural_sites, places_to_visit, mobility_rating, safety_rating, population_density_rating, vegetation_rating) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt->execute([$user_id, $location, $image, $cost, $cultural_sites, $places_to_visit, $mobility_rating, $safety_rating, $population_density_rating, $vegetation_rating])) {
        echo "Путешествие добавлено!";
    } else {
        echo "Ошибка добавления путешествия!";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить своё путешествие</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Добавить своё путешествие</h2>
    <a href="index.php" class="blue-button">Вернуться на главную</a>
    <form method="POST">
        <input type="text" name="location" placeholder="Местоположение" required>
        <input type="text" name="image" placeholder="URL изображения" required>
        <input type="number" name="cost" placeholder="Стоимость" step="0.01" required>
        <textarea name="cultural_sites" placeholder="Места культурного наследия"></textarea>
        <textarea name="places_to_visit" placeholder="Места для посещения"></textarea>
        <input type="number" name="mobility_rating" placeholder="Оценка удобства передвижения (1-10)" min="1" max="10" required>
        <input type="number" name="safety_rating" placeholder="Оценка безопасности (1-10)" min="1" max="10" required>
        <input type="number" name="population_density_rating" placeholder="Оценка населенности (1-10)" min="1" max="10" required>
        <input type="number" name="vegetation_rating" placeholder="Оценка растительности (1-10)" min="1" max="10" required>
        <button type="submit">Сохранить</button>
    </form>
    <a href="view_trips.php" class="blue-button">Посмотреть все путешествия</a>
</body>
</html>