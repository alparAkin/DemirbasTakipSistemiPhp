<?php
session_start();

include "config.php";

// Formdan gelen verileri alma ve güncelleme işlemi
if(isset($_POST['guncelle'])) {
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $unvan = $_POST['unvan'];
    $bolum = $_POST['bolum'];
    $eposta = $_POST['eposta'];
    $oda = $_POST['oda_numarası'];
    $baslama = $_POST['ise_baslama_tarihi'];
    $not = $_POST['notlar'];

    $user_id = $_SESSION['sicilnumarasi'];

    $sql = "UPDATE bilgilerdemirbas SET ad='$ad', soyad='$soyad', unvan='$unvan', bolum='$bolum', eposta='$eposta', oda_numarası='$oda', ise_baslama_tarihi='$baslama', notlar='$not' WHERE sicilnumarasi='$user_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Bilgiler başarıyla güncellendi";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}

// Kullanıcı bilgilerini veritabanından al
$user_id = $_SESSION['sicilnumarasi'];
$sql = "SELECT * FROM bilgilerdemirbas WHERE sicilnumarasi = '$user_id'";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // Veri varsa, her bir sütundaki değerleri al
    $row = $result->fetch_assoc();
    $ad = $row["ad"];
    $soyad = $row["soyad"];
    $sicil = $row["sicilnumarasi"];
    $unvan = $row["unvan"];
    $bolum = $row["bolum"];
    $eposta = $row["eposta"];
    $oda = $row["oda_numarası"];
    $baslama = $row["ise_baslama_tarihi"];
    $not = $row["notlar"];
} else {
    echo "Veri bulunamadı";
}

// Bağlantıyı kapat
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genel Bilgiler</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* İsteğe bağlı özel CSS stilleri */
        .form-container {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        body {
            background: linear-gradient(to bottom, #007bff, #000);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-container">
                <h2 class="text-center mb-4">Genel Bilgiler</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="ad">Ad:</label>
                        <input type="text" class="form-control" id="ad" name="ad" value="<?php echo $ad; ?>">
                    </div>

                    <div class="form-group">
                        <label for="soyad">Soyad:</label>
                        <input type="text" class="form-control" id="soyad" name="soyad" value="<?php echo $soyad; ?>">
                    </div>

                    <div class="form-group">
                        <label for="sicil">Sicil Numarası:</label>
                        <input type="text" class="form-control" id="sicilnumarasi" name="sicilnumarasi" value="<?php echo $sicil; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="unvan">Ünvan:</label>
                        <input type="text" class="form-control" id="unvan" name="unvan" value="<?php echo $unvan; ?>">
                    </div>

                    <div class="form-group">
                        <label for="bolum">Bölüm:</label>
                        <input type="text" class="form-control" id="bolum" name="bolum" value="<?php echo $bolum; ?>">
                    </div>

                    <div class="form-group">
                        <label for="eposta">E-posta:</label>
                        <input type="email" class="form-control" id="eposta" name="eposta" value="<?php echo $eposta; ?>">
                    </div>

                    <div class="form-group">
                        <label for="oda">Oda Numarası:</label>
                        <input type="text" class="form-control" id="oda_numarası" name="oda_numarası" value="<?php echo $oda; ?>">
                    </div>

                    <div class="form-group">
                        <label for="baslama">İşe Başlama Tarihi:</label>
                        <input type="date" class="form-control" id="ise_baslama_tarihi" name="ise_baslama_tarihi" value="<?php echo $baslama; ?>">
                    </div>

                    <div class="form-group">
                        <label for="not">Not:</label>
                        <textarea class="form-control" id="notlar" name="notlar" rows="4"><?php echo $not; ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block" name="guncelle">Güncelle</button>
                </form>
                <form action="donanimBilgileri.php" method="post">
                    <button type="submit" class="btn btn-secondary btn-block mt-3">Donanım Bilgileri</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
