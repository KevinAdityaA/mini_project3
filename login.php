<?php
session_start();
include 'database.php';
$conn = connectDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Pilih tabel yang sesuai berdasarkan peran (role)
    $table_name = ($role == 'admin') ? 'admin_login' : 'user_login';

    // Query untuk memeriksa keberadaan pengguna berdasarkan username dan password di tabel yang sesuai dengan peran
    $sql = "SELECT * FROM $table_name WHERE username=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Jika login berhasil, tetapkan variabel session dan arahkan pengguna ke halaman yang sesuai
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;
        
        if ($role == 'admin') {
            header("Location: admin.php");
            exit();
        } elseif ($role == 'user') {
            header("Location: user.php");
            exit();
        }
    } else {
        $error_message = "Login failed. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-6">
        <form class="p-5 border rounded-3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <h2 class="mb-4 text-center">Welcome!</h2>
          <?php if(isset($error_message)) { ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $error_message; ?>
            </div>
          <?php } ?>
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="role" id="role" class="form-select">
              <option value="admin">Admin</option>
              <option value="user">User</option>
            </select>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
          <div class="mt-3 text-center">
            <p>If you don't have an account, please <a href="registrasi.php">Register</a>.</p>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
