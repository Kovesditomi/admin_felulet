<?php

// Adatbázis kapcsolati adatok
define('DB_HOST', 'localhost');     // Adatbázis szerver címe
define('DB_USER', 'root');          // Felhasználónév
define('DB_PASSWORD', '');          // Jelszó (jelen esetben nincs)
define('DB_NAME', 'phone_service');     // Céladatbázis neve

// Adatbázis kapcsolat létrehozása
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Ellenőrzés az adatbázis kapcsolat sikerességére
if ($conn->connect_error) {
    die("Hiba a kapcsolódás során: " . $conn->connect_error);
}

echo "Sikeresen csatlakozva az adatbázishoz";

// Kapcsolat bezárása (ha már nem szükséges)
//$conn->close();


