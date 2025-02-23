<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home User</title>
</head>
<body>
  <h1> 
    Selamat datang <?= ucwords($_SESSION['data']['name']) ?>, Anda login sebagai <?= ucwords($_SESSION['data']['role']) ?>
  </h1>
</body>
</html>
