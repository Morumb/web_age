<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Your age</title>
</head>
<body>
    <?php
        $mysqli = new mysqli('localhost','root','','reg');
        echo "<h1>Твой возраст: ",$_COOKIE['T'],"</h1>";
    ?>
</body>
</html>