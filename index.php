<?php
include 'header2.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or Register</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #d0ecff;
        }
        .container {
            max-width: 500px;
            margin: 100px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        .btn-group {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
<div class="container">
    <h3 align='center'>Giriş Sayfasına Hoşgeldiniz</h3>
    <h3 align='center'>Giriş Yapın veya Kayıt Olun</h3>
    <div class="btn-group">
        <a href="login.php" class="btn btn-primary">Giriş Yap</a>
        <a href="register.php" class="btn btn-success">Kayıt Ol</a>
    </div>
    <br>
    <br>
    <h6 align='center'><a href="https://github.com/nursenamrl/Bisiklet-Kulubu">Kaynak Kodlar için Github</a></h6>
</div>
</body>
</html>
