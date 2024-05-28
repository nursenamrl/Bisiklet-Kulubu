<?php
include 'config.php';

// Etkinlik ekleme
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_event'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];

    $sql = "INSERT INTO events (title, description, event_date) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $title, $description, $event_date);
    $stmt->execute();
    $stmt->close();

    header("Location: manage_events.php");
    exit;
}


// Etkinlik silme
if (isset($_GET['delete'])) {
    $event_id = $_GET['delete'];

    $sql = "DELETE FROM events WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
    $stmt->close();

    header("Location: manage_events.php");
    exit;
}

// Etkinlikleri listeleme
$sql = "SELECT * FROM events ORDER BY event_date ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etkinlikleri Düzenle</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'header.php'; ?>
<div class="container mt-5">
    <h2>Etkinlikleri Düzenle</h2>
    <form action="manage_events.php" method="post" class="mb-5">
        <div class="form-group">
            <label for="title">Başlık</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Açıklama</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="event_date">Tarih</label>
            <input type="date" name="event_date" id="event_date" class="form-control" required>
        </div>
        <button type="submit" name="add_event" class="btn btn-primary">Etkinlik Ekle</button>
    </form>

    <h3>Varolan Etkinlikler</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Başlık</th>
                <th>Açıklama</th>
                <th>Tarih</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td><?php echo htmlspecialchars($row['event_date']); ?></td>
                    <td>
                        <a href="edit_event.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Düzenle</a>
                        <a href="manage_events.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bu etkinliği silmek istediğinizden emin misiniz?');">Sil</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
