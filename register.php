<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // cek konfirmasi password
    if ($password !== $confirm_password) {
        echo "Konfirmasi password tidak sesuai";
    } else {
        // cek username
        $check_username = "SELECT username FROM users WHERE username = '$username'";
        $result = $koneksi->query($check_username);

        if ($result) {
            if ($result->num_rows > 0) {
                echo "Username sudah ada di database, pilih username yang lain";
            } else {
                $encrypt_password = password_hash($password, PASSWORD_DEFAULT);

                // query register
                $query = "INSERT INTO users(username, nama, password) VALUES ('$username', '$nama', '$encrypt_password')";

                // execute query
                if (mysqli_query($koneksi, $query)) {
                    // Redirect to login.php on successful registration
                    header("Location: login.php");
                    exit();
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
                }
            }
        } else {
            echo "Error: " . $check_username . "<br>" . $koneksi->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <form action="" method="post">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Register</h2>
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Konfirmasi Password</label>
                    <input type="password" name="confirm_password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </div>
    </form>
    <div class="container mt-5">
</body>

</html>