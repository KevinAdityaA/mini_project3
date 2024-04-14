<?php
session_start();

include 'database.php'; // Include database connection file
$conn = connectDB(); // Connect to the database

// Periksa apakah pengguna sudah login dan memiliki peran admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'superadmin') {
    header("Location: login.php");
    exit();
}

// Function to display user data
function displayUserData($conn) {
    $sql = "SELECT * FROM user_login";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Data Pengguna</h2>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered'>";
        echo "<thead class='table-dark'>";
        echo "<tr><th>ID</th><th>Username</th><th>Password</th><th>Email</th><th>Action</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['iduser']."</td>";
            echo "<td>".$row['username']."</td>";
            echo "<td>".$row['password']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>
                    <button class='btn btn-sm btn-primary edit-user' data-id='".$row['iduser']."' onclick='editUser(".$row['iduser'].")'>Edit</button> 
                    <button class='btn btn-sm btn-danger delete-user' data-id='".$row['iduser']."'>Hapus</button>
                  </td>";
            echo "</tr>";
            // Form edit user (hidden by default)
            echo "<tr id='editFormUser".$row['iduser']."' style='display: none;'>
                    <td colspan='5'>
                        <form method='post'>
                            <input type='hidden' name='edit_id' value='".$row['iduser']."'>
                            <div class='form-group'>
                                <label for='edit_username".$row['iduser']."'>Username:</label>
                                <input type='text' class='form-control' id='edit_username".$row['iduser']."' name='edit_username' value='".$row['username']."'>
                            </div>
                            <div class='form-group'>
                                <label for='edit_password".$row['iduser']."'>Password:</label>
                                <input type='password' class='form-control' id='edit_password".$row['iduser']."' name='edit_password' value='".$row['password']."'>
                            </div>
                            <div class='form-group'>
                                <label for='edit_email".$row['iduser']."'>Email:</label>
                                <input type='email' class='form-control' id='edit_email".$row['iduser']."' name='edit_email' value='".$row['email']."'>
                            </div>
                            <button type='submit' class='btn btn-primary' name='edit_user_submit'>Simpan</button>
                            <button type='button' class='btn btn-secondary' onclick='cancelEditUser(".$row['iduser'].")'>Batal</button>
                        </form>
                    </td>
                  </tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "Tidak ada data pengguna.";
    }
}

// Function to display admin data
function displayAdminData($conn) {
    $sql = "SELECT * FROM admin_login";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Data Admin</h2>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered'>";
        echo "<thead class='table-dark'>";
        echo "<tr><th>ID</th><th>Username</th><th>Password</th><th>Action</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['username']."</td>";
            echo "<td>".$row['password']."</td>";
            echo "<td>
                    <button class='btn btn-sm btn-primary edit-admin' data-id='".$row['id']."' onclick='editAdmin(".$row['id'].")'>Edit</button> 
                    <button class='btn btn-sm btn-danger delete-admin' data-id='".$row['id']."'>Hapus</button>
                  </td>";
            echo "</tr>";
            // Form edit admin (hidden by default)
            echo "<tr id='editFormAdmin".$row['id']."' style='display: none;'>
                    <td colspan='4'>
                        <form method='post'>
                            <input type='hidden' name='edit_admin_id' value='".$row['id']."'>
                            <div class='form-group'>
                                <label for='edit_admin_username".$row['id']."'>Username:</label>
                                <input type='text' class='form-control' id='edit_admin_username".$row['id']."' name='edit_admin_username' value='".$row['username']."'>
                            </div>
                            <div class='form-group'>
                                <label for='edit_admin_password".$row['id']."'>Password:</label>
                                <input type='password' class='form-control' id='edit_admin_password".$row['id']."' name='edit_admin_password' value='".$row['password']."'>
                            </div>
                            <button type='submit' class='btn btn-primary' name='edit_admin_submit'>Simpan</button>
                            <button type='button' class='btn btn-secondary' onclick='cancelEditAdmin(".$row['id'].")'>Batal</button>
                        </form>
                    </td>
                  </tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "Tidak ada data admin.";
    }
}


// Process adding new user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_user_submit'])) {
    $add_username = $_POST['username'];
    $add_password = $_POST['password'];
    $add_email = $_POST['email'];

    // Initialize array to store error messages
    $errors = [];

    // Validate input
    if (empty($add_username)) {
        $errors[] = "Username harus diisi";
    }

    if (empty($add_password)) {
        $errors[] = "Password harus diisi";
    }

    if (empty($add_email)) {
        $errors[] = "Email harus diisi";
    } elseif (!filter_var($add_email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid";
    }

    if (empty($errors)) {
        // No errors, insert data into database
        $sql = "INSERT INTO user_login (username, password, email) VALUES ('$add_username', '$add_password', '$add_email')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Pengguna berhasil ditambahkan');</script>";
            // Redirect untuk mencegah form resubmission saat menyegarkan halaman
            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        } else {
            echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
        }
    } else {
        // Errors found, display error messages
        echo "<script>alert('" . implode("\\n", $errors) . "');</script>";
    }
}

// Process editing user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_user_submit'])) {
    $edit_id = $_POST['edit_id'];
    $edit_username = $_POST['edit_username'];
    $edit_password = $_POST['edit_password'];
    $edit_email = $_POST['edit_email'];

    $sql = "UPDATE user_login SET username='$edit_username', password='$edit_password', email='$edit_email' WHERE iduser='$edit_id'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pengguna berhasil diperbarui');</script>";
    } else {
        echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
    }
}

// Process deleting user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user_submit'])) {
    $delete_id = $_POST['delete_id'];

    $sql = "DELETE FROM user_login WHERE iduser='$delete_id'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pengguna berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Error deleting record: " . $conn->error . "');</script>";
    }
}

// Process adding new admin
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_admin_submit'])) {
    $add_admin_username = $_POST['admin_username'];
    $add_admin_password = $_POST['admin_password'];

    // Initialize array to store error messages
    $errors = [];

    // Validate input
    if (empty($add_admin_username)) {
        $errors[] = "Username harus diisi";
    }

    if (empty($add_admin_password)) {
        $errors[] = "Password harus diisi";
    }

    if (empty($errors)) {
        // No errors, insert data into database
        $sql = "INSERT INTO admin_login (username, password) VALUES ('$add_admin_username', '$add_admin_password')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Admin berhasil ditambahkan');</script>";
        } else {
            echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
        }
    } else {
        // Errors found, display error messages
        echo "<script>alert('" . implode("\\n", $errors) . "');</script>";
    }
}

// Process editing admin
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_admin_submit'])) {
    $edit_admin_id = $_POST['edit_admin_id'];
    $edit_admin_username = $_POST['edit_admin_username'];
    $edit_admin_password = $_POST['edit_admin_password'];

    $sql = "UPDATE admin_login SET username='$edit_admin_username', password='$edit_admin_password' WHERE id='$edit_admin_id'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Admin berhasil diperbarui');</script>";
    } else {
        echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
    }
}

// Process deleting admin
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_admin_submit'])) {
    $delete_admin_id = $_POST['delete_admin_id'];

    $sql = "DELETE FROM admin_login WHERE id='$delete_admin_id'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Admin berhasil dihapus');</script>";
    } else {
        echo "<script>alert('Error deleting record: " . $conn->error . "');</script>";
    }
}

// Additional functionalities for admin data manipulation can be added similarly.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <!-- Script AJAX untuk fungsi penghapusan pengguna -->
<script>
        // Fungsi untuk menghapus pengguna
        function deleteUser(userId){
            if(confirm('Apakah Anda yakin ingin menghapus pengguna ini?')){
                // Kirim data penghapusan menggunakan AJAX
                $.ajax({
                    type: 'POST',
                    url: 'delete_user.php',
                    data: { delete_id: userId }, // Kirim ID pengguna yang akan dihapus
                    success: function(response){
                        alert(response); // Tampilkan pesan dari server
                        location.reload(); // Muat ulang halaman setelah penghapusan berhasil
                    }
                });
            }
        }
    </script>


<!-- Script AJAX untuk fungsi penghapusan admin -->
<script>
 $(document).ready(function(){
    // Function to delete user
    $('.delete-user').click(function(){
        var userId = $(this).data('id');
        if(confirm("Apakah Anda yakin ingin menghapus pengguna ini?")){
            $.ajax({
                url: 'delete_user.php',
                type: 'post',
                data: {user_id: userId},
                success:function(response){
                    alert(response);
                    // Refresh page after successful deletion
                    location.reload();
                }
            });
        }
    });

    // Function to delete admin
    $('.delete-admin').click(function(){
        var adminId = $(this).data('id');
        if(confirm("Apakah Anda yakin ingin menghapus admin ini?")){
            $.ajax({
                url: 'delete_admin.php',
                type: 'post',
                data: {admin_id: adminId},
                success:function(response){
                    alert(response);
                    // Refresh page after successful deletion
                    location.reload();
                }
            });
        }
    });
});

    </script>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Selamat datang, Admin!</h1>
            </div>
            <div class="col-md-6 text-right">
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h2>Tambah Pengguna</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <button type="submit" class="btn btn-primary" name="add_user_submit">Tambah</button>
                </form>
            </div>
            <div class="col-md-6">
                <h2>Tambah Admin</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="admin_username">Username:</label>
                        <input type="text" class="form-control" id="admin_username" name="admin_username">
                    </div>
                    <div class="form-group">
                        <label for="admin_password">Password:</label>
                        <input type="password" class="form-control" id="admin_password" name="admin_password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="add_admin_submit">Tambah</button>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <?php 
                displayUserData($conn); 
                displayAdminData($conn); 
                ?>
            </div>
        </div>
    </div>


</body>
</html>
