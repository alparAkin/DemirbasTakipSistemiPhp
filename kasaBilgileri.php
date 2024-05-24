<?php
session_start();

include "config.php";

// Kullanıcı bilgilerini veritabanından al
$user_id = $_SESSION['sicilnumarasi'];
$sql = "SELECT kasaDemirbasNo, sicilnumarasi, isletimSistemi, islemciMarkaModel, ram, sabitDiskKapasitesi, ekranKarti, pcModel, islemciHizi, cekirdekSayisi, monitorBoyutu FROM bilgilerdemirbas WHERE sicilnumarasi = '$user_id'";
$result = $conn->query($sql);

// Verileri güncelleme
$update_message = "";
if(isset($_POST['kaydet'])) {
    $kasaDemirbasNo = $_POST['kasaDemirbasNo'];
    $isletimSistemi = $_POST['isletimSistemi'];
    $islemciMarkaModel = $_POST['islemciMarkaModel'];
    $ram = $_POST['ram'];
    $sabitDiskKapasitesi = $_POST['sabitDiskKapasitesi'];
    $ekranKarti = $_POST['ekranKarti'];
    $pcModel = $_POST['pcModel'];
    $islemciHizi = $_POST['islemciHizi'];
    $cekirdekSayisi = $_POST['cekirdekSayisi'];
    $monitorBoyutu = $_POST['monitorBoyutu'];

    $update_sql = "UPDATE bilgilerdemirbas SET isletimSistemi='$isletimSistemi', islemciMarkaModel='$islemciMarkaModel', ram='$ram', sabitDiskKapasitesi='$sabitDiskKapasitesi', ekranKarti='$ekranKarti', pcModel='$pcModel', islemciHizi='$islemciHizi', cekirdekSayisi='$cekirdekSayisi', monitorBoyutu='$monitorBoyutu' WHERE sicilnumarasi='$user_id'";

    if ($conn->query($update_sql) === TRUE) {
        $update_message = '<div class="alert alert-success" role="alert">Bilgiler başarıyla güncellendi</div>';
    } else {
        $update_message = '<div class="alert alert-danger" role="alert">Hata: ' . $conn->error . '</div>';
    }
}



// Bağlantıyı kapat
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasa Bilgileri</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            background-color: #fff;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-container {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        @media (max-width: 576px) {
            .btn-container {
                flex-direction: column;
            }

            .btn-container button {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    
<div class="container">
    <h2>Kasa Bilgileri</h2>
    <?php echo $update_message; ?>
    <form method="post">
        <?php
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }
        ?>
        <div class="form-group">
            <label for="kasaDemirbasNo">Kasa Demirbaş No:</label>
            <input type="text" class="form-control" id="kasaDemirbasNo" name="kasaDemirbasNo" value="<?php echo $row["kasaDemirbasNo"]; ?>" readonly>
        </div>

        <div class="form-group">
            <label for="sicilnumarasi">Çalışan Sicil No:</label>
            <input type="text" class="form-control" id="sicilnumarasi" name="sicilnumarasi" value="<?php echo $row["sicilnumarasi"]; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="isletimSistemi">İşletim Sistemi:</label>
            <input type="text" class="form-control" id="isletimSistemi" name="isletimSistemi" value="<?php echo $row["isletimSistemi"]; ?>">
        </div>
        <div class="form-group">
            <label for="islemciMarkaModel">İşlemci Marka ve Model:</label>
            <input type="text" class="form-control" id="islemciMarkaModel" name="islemciMarkaModel" value="<?php echo $row["islemciMarkaModel"]; ?>">
        </div>
        <div class="form-group">
            <label for="ram">RAM</label>
            <input type="text" class="form-control" id="ram" name="ram" value="<?php echo $row["ram"]; ?>">
        </div>

        <div class="form-group">
            <label for="sabitDiskKapasitesi">Sabit Disk Kapasitesi :</label>
            <input type="text" class="form-control" id="sabitDiskKapasitesi" name="sabitDiskKapasitesi" value="<?php echo $row["sabitDiskKapasitesi"]; ?>">
        </div>

        <div class="form-group">
            <label for="ekranKarti">Ekran Kartı:</label>
            <input type="text" class="form-control" id="ekranKarti" name="ekranKarti" value="<?php echo $row["ekranKarti"]; ?>">
        </div>

        <div class="form-group">
            <label for="pcModel">Pc Model:</label>
            <input type="text" class="form-control" id="pcModel" name="pcModel" value="<?php echo $row["pcModel"]; ?>">
        </div>

        <div class="form-group">
            <label for="islemciHizi">İşlemci Hızı:</label>
            <input type="text" class="form-control" id="islemciHizi" name="islemciHizi" value="<?php echo $row["islemciHizi"]; ?>">
        </div>

        <div class="form-group">
            <label for="cekirdekSayisi">Çekirdek Sayısı:</label>
            <input type="text" class="form-control" id="cekirdekSayisi" name="cekirdekSayisi" value="<?php echo $row["cekirdekSayisi"]; ?>">
        </div>

        <div class="form-group">
            <label for="monitorBoyutu">Monitör Boyutu :</label>
            <input type="text" class="form-control" id="monitorBoyutu" name="monitorBoyutu" value="<?php echo $row["monitorBoyutu"]; ?>">
        </div>
        <div class="btn-container">
            <button type="submit" class="btn btn-primary" name="kaydet">Kaydet</button>
            <button type="submit" class="btn btn-danger" name="sil">Kaydı Sil</button>
        </div>
    </form>
</div>

</body>
</html>
