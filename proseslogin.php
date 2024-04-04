<?php
session_start();

// Sertakan file koneksi ke database
include('config/db.php');

// Cek apakah form telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form dan lakukan sanitasi
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role = mysqli_real_escape_string($conn, $_POST['role']); // Admin atau user

    // Hashing password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query sesuai role untuk mencari data pengguna dari database
    if ($role == 'admin') {
        $query = "SELECT * FROM admin_login WHERE username='$username'";
    } elseif ($role == 'user') {
        $query = "SELECT * FROM user_login WHERE username='$username'";
    } else {
        $_SESSION['login_error'] = "Role tidak valid.";
        header("location: login.php");
        exit();
    }

    // Eksekusi query
    $result = mysqli_query($conn, $query);

    // Periksa apakah hasil query ada data atau tidak
    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // Verifikasi password
        if (password_verify($password, $row['password'])) {
            // Jika ada data, simpan data pengguna ke dalam session
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            // Arahkan ke dashboard sesuai role
            if ($role == 'admin') {
                header("location: admin.php");
            } elseif ($role == 'user') {
                header("location: user.php");
            }
            exit();
        }
    }

    // Jika tidak ada data atau password tidak cocok, kembali ke halaman login dengan pesan error
    $_SESSION['login_error'] = "Username atau password salah.";
    header("location: login.php");
    exit();
} else {
    // Jika tidak ada data yang dikirim melalui POST, kembali ke halaman login
    header("location: login.php");
    exit();
}
?>
