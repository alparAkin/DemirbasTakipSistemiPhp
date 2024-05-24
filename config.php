<?php 
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
?>