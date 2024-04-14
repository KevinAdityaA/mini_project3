<?php

function connectDB() {
    $servername = "localhost";
    $username = "id22042431_kevin";
    $password = "aku_88kamu";
    $dbname = "id22042431_game";

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

// berita game
function getAllData() {
    $con = mysqli_connect("localhost", "id22042431_kevin", "aku_88Kamu", "id22042431_game");

    
    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal: " . mysqli_connect_error();
    }

    
    $sql = "SELECT * FROM game";
    $result = mysqli_query($con, $sql);

    $data = array();
    // Periksa apakah ada data yang ditemukan
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }

    
    mysqli_close($con);

    return $data;
}

function getAllNews() {
    $conn = connectDB();
    $sql = "SELECT * FROM berita";
    $result = $conn->query($sql);
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    $conn->close();
    return $data;
}


// Fungsi untuk menghapus berita
function deleteNews($idnews) {
   
    if (empty($idnews)) {
        return "ID berita tidak boleh kosong.";
    }

   
    $query = "DELETE FROM berita WHERE idnews = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $idnews);
    if (!$stmt->execute()) {
        return "Gagal menghapus berita: " . $stmt->error;
    }

    
    return "Berita berhasil dihapus.";
}



