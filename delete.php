<?php
include("koneksi.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete data from the database
    $query = "DELETE FROM siswa WHERE id = $id";
    mysqli_query($koneksi, $query);

    // Redirect back to the index.php after deletion
    header("Location: index.php");
    exit();
} else {
    echo "Invalid request!";
}
