<?php
session_start();

include "config.php";

// Silme işlemi
if(isset($_POST['sil'])) {
    $sil_id = $_POST['sil_id'];
    

    // SQL komutu ile veri tabanından kaydı sil
    $sql_sil = "DELETE FROM bilgilerdemirbas WHERE sicilnumarasi='$sil_id'";

    if ($conn->query($sql_sil) === TRUE) {
        echo "Kayıt başarıyla silindi";
    } else {
        echo "Hata: " . $sql_sil . "<br>" . $conn->error;
    }
}

// Kullanıcı bilgilerini veritabanından al
$user_id = $_SESSION['sicilnumarasi'];
$sql = "SELECT * FROM bilgilerdemirbas WHERE sicilnumarasi = '$user_id'";
$result = $conn->query($sql);

// Bağlantıyı kapat
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donanım Bilgileri</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Özel stiller */
        .btn-delete {
            padding: 0.375rem 0.75rem;
        }

        
    </style>
</head>
<body>
    
<div class="container mt-4">
    <h2 class="text-center mb-4">Donanım Bilgileri</h2>

    <div class="text-right mb-3">
        <a href="kasaBilgileri.php" class="btn btn-primary">Kasa Bilgileri</a>
    </div>

    <?php if ($result->num_rows > 0): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Marka</th>
                    <th scope="col">Model</th>
                    <th scope="col">Açıklama</th>
                    <th scope="col">Verildiği Tarih</th>
                    <th scope="col">İşlem</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row["marka"] ?></td>
                        <td><?= $row["model"] ?></td>
                        <td><?= $row["aciklama"] ?></td>
                        <td><?= $row["verildigiTarih"] ?></td>
                        <td>
                            <form action='' method='post' onsubmit="return confirm('Bu öğeyi silmek istediğinizden emin misiniz?');">
                                <input type='hidden' name='sil_id' value='<?= $row["sicilnumarasi"] ?>'>
                                <button type='submit' class='btn btn-danger btn-delete' name='sil'>Sil</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info" role="alert">
            Donanım eşyalarına ait bilgiler bulunamadı.
        </div>
    <?php endif; ?>
</div>
    
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
