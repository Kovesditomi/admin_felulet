<?php
session_start();
include_once "config.php";

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM Felhasznalok WHERE username = '{$username}'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($result);

if ($row) {
    $hashedPassword = $row['password'];
    
    // jelszó ellenőrzés
    if (password_verify($writtenpass, $hashedPassword)) {
        
        $_SESSION['user_id'] = $row['user_id'];
        echo "success";
    } else {
        echo "Helytelen jelszót adott meg!";
    }
} else {
    // ha nincs ilyen felhasználó
    echo "Helytelen bejelentkezési adatok!";
}

