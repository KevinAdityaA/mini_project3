<?php

function connectDB() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "game_data";

    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Memeriksa koneksi
    if ($conn->connect_error) {
       
        die("Connection failed: " . $conn->connect_error);
    }
    else{
        
    }

    return $conn;
}