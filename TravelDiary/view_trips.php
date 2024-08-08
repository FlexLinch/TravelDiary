<?php
session_start();
include 'db.php';

$stmt = $pdo->query("SELECT trips.*, users.username FROM trips JOIN users ON trips.user_id = users.id");
$trips = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Путешествия всех пользователей</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Путешествия всех пользователей</h2>
    <a href="index.php" class="blue-button">Вернуться на главную</a>
    <ul>
        <?php foreach ($trips as $trip): ?>
            <li>
                <h3><?php echo htmlspecialchars($trip['location']); ?> (от <?php echo htmlspecialchars($trip['username']); ?>)</h3>
                <img src="<?php echo htmlspecialchars($trip['image']); ?>" alt="Изображение" width="200">
                <p>Стоимость: <?php echo htmlspecialchars($trip['cost']); ?> руб.</p>
                <p>Культурные места: <?php echo htmlspecialchars($trip['cultural_sites']); ?></p>
                <p>Места для посещения: <?php echo htmlspecialchars($trip['places_to_visit']); ?></p>
                <p>Оценка удобства передвижения: <?php echo htmlspecialchars($trip['mobility_rating']); ?></p>
                <p>Оценка безопасности: <?php echo htmlspecialchars($trip['safety_rating']); ?></p>
                <p>Оценка населенности: <?php echo htmlspecialchars($trip['population_density_rating']); ?></p>
                <p>Оценка растительности: <?php echo htmlspecialchars($trip['vegetation_rating']); ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="add_trip.php" class="blue-button">Добавить своё путешествие</a>
</body>
</html>