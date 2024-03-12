<?php
session_start();
include_once "config.php";

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$passwordrow = mysqli_real_escape_string($conn, $_POST['password']);
$passwordagain = mysqli_real_escape_string($conn, $_POST['passwordagain']);

/**vissza is kell tudni fejteni belépésnél, így önmagában nem fog engedni újra belépni*/
$password = password_hash($passwordrow, PASSWORD_DEFAULT);

if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && $password != $passwordagain){
    // e-mail cím érvényes formátumának ellenőrzése
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        // ellenőrzés, hogy létezik-e már ez a mail cím
        $sql = mysqli_query($conn, "SELECT email FROM Felhasznalok WHERE email = '{$email}'");

        if($sql !== false && mysqli_num_rows($sql) > 0){
            echo "$email - már létező e-mail cím!";
        }else{
            // adatok beszúrása
            $sql2 = mysqli_query($conn, "INSERT INTO Felhasznalok (fname, lname, email, password)
            VALUES ('{$fname}', '{$lname}', '{$email}', '{$password}')");

            if($sql2){
                $sql3 = mysqli_query($conn, "SELECT * FROM Felhasznalok WHERE email = '{$email}'");

                if($sql3 !== false && mysqli_num_rows($sql3) > 0){
                    $row = mysqli_fetch_assoc($sql3);
                    $_SESSION['user_id'] = $row['user_id'];
                    echo "success";
                }
            }else{
                echo "Valami hiba történt!";
            }
        }
    }else{
        echo "Az e-mail cím érvénytelen!";
    }
}else{
    echo "Minden mezőt ki kell töltenie vagy a jelszavak nem egyeznek!";
}

