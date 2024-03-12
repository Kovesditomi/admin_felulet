<?php

$conn = @mysqli_connect("localhost", "root", "", "phone_service");
/*if($conn){
    echo "kapcsolat rendben";
}else{
    echo "error";
}*/
@mysqli_query($conn, "SET NAMES utf8");

