<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['admin_id'])) {
    $delete_id = $_POST['admin_id'];

    $conn = connectDB();

    $sql = "DELETE FROM admin_login WHERE id='$delete_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Data admin berhasil dihapus";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
