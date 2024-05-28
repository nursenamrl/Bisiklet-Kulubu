<?php
include 'config.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$sql = "SELECT * FROM events ORDER BY event_date ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'header.php'; ?>
<div class="container mt-5">
    <h2>Bike Club</h2>
    <p>Bisiklet Kulübüne hoş geldiniz! Yeni parkurlar keşfetmekten ve aktif kalmaktan keyif alan bisiklet tutkunlarından oluşan bir topluluğuz. Heyecan verici etkinlikler için bize katılın ve diğer bisikletçilerle tanışın.</p>
    <div class="row">
        <div class="col-md-6">
            <img src="bike_club1.jpg" class="img-fluid" alt="Bike Club">
        </div>
        <div class="col-md-6">
            <img src="bike_club2.jpg" class="img-fluid" alt="Bike Club">
        </div>
    </div>
    <h3 class="mt-5">Gelecek Etkinlikler</h3>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Başlık</th>
                <th>Açıklama</th>
                <th>Tarih</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td><?php echo htmlspecialchars($row['event_date']); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<br><br><br><br><br>
</body>
</html>
