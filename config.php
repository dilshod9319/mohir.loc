<?php

$host = "localhost";   // server manzili (odatda localhost)
$db   = "mohir";     // database nomi
$user = "root";        // MySQL foydalanuvchi nomi
$pass = "";            // MySQL paroli (agar bo‘lsa yozing)

try {
    // DSN (Data Source Name)
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8";

    // PDO obyektini yaratamiz
    $pdo = new PDO($dsn, $user, $pass);

    // Error rejimini Exception qilib o‘rnatamiz
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "✅ MySQL ga muvaffaqiyatli ulandingiz!"; die();
} catch (PDOException $e) {
    echo "❌ Ulanishda xatolik: " . $e->getMessage(); die();
}
