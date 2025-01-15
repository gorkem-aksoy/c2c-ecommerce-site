<?php
$serverName = "DESKTOP-OEOU4C0";
$connectionOptions = array(
    "Database" => "c2c-eticaret",
    "Uid" => "sa",
    "PWD" => "123456"
);

try {
    $db = new PDO("sqlsrv:Server=$serverName;Database={$connectionOptions['Database']}", $connectionOptions['Uid'], $connectionOptions['PWD']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Veritabanı bağlantısı başarılı!";
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}
?>