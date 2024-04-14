<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    $conn = connectDB();

    $sql = "DELETE FROM user_login WHERE iduser='$delete_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Data pengguna berhasil dihapus";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
