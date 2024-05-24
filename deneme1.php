<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Paneli</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #007bff, #000);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        button {
        background-color: #007bff; /* Mavi renk */
        border: 1px solid #007bff; /* Kenarlık ekle */
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px; /* Köşeleri yuvarlat */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Gölgelendirme ekle */
        outline: none; /* Odaklandığında kenarlık olmamasını sağla */
        transition: background-color 0.3s; /* Arka plan rengi geçiş efekti */
}

/* Butonun hover (üzerine gelindiğinde) durumu */
.button:hover {
  background-color: #0056b3; /* Koyu mavi renk */
}
        

        .card {
            max-width: 500px;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.8); /* Beyaz bir arka plan renk değeri */
        }

        .card-header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 30px;
        }

        .form-control {
            border-radius: 20px;
        }

        .btn-primary {
            border-radius: 20px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">Kullanıcı Girişi</div>
        <form action="" method="POST">
            
            <div class="mb-3">
                <input type="text" class="form-control" id="kullaniciadi" name="kullaniciadi" placeholder="Kullanıcı Adı Giriniz" required>  
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" id="sifre" name="sifre" placeholder="Sifre Giriniz" required>
            </div>         
            <button class = "button" >Giriş Yap</button>

            <?php

include "config.php";
session_start();

// Kullanıcı adı ve şifre kontrolü
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullaniciadi = $_POST['kullaniciadi'];
    $sifre = $_POST['sifre'];

    // MySQL bağlantısı
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "demirbasyeni";

    // Bağlantı oluştur
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Bağlantıyı kontrol et
    if ($conn->connect_error) {
        die("Bağlantı hatası: " . $conn->connect_error);
    }

    // Kullanıcı adı ve şifreyi veritabanında kontrol et
    $sql = "SELECT * FROM bilgilerdemirbas WHERE kullaniciadi='$kullaniciadi' AND sifre='$sifre'";
    $result = $conn->query($sql);

    // Kullanıcı varsa, oturum başlat ve yönlendir
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['sicilnumarasi'] = $row['sicilnumarasi'];
        header("Location: donanimKismi.php");
        exit;
    } else {
        echo "<div class='alert alert-danger mt-3' role='alert'>
        Kullanıcı adı veya şifre yanlış
      </div>";
    }

    // Bağlantıyı kapat
    $conn->close();
}
?>



            

            


        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
