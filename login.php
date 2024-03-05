<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = $_POST['password'];

    // Query to fetch user details
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $koneksi->query($query);

    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $stored_password = $row['password'];

            // Verify the entered password with the stored hashed password
            if (password_verify($password, $stored_password)) {
                echo "Login successful. Welcome, $username!";
                // Redirect to index.php
                header("Location: index.php");
                exit();
            } else {
                echo "Password is incorrect.";
            }
        } else {
            echo "Username not found. Please register.";
            // You can redirect to registration page or show a registration link here
        }
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Login</h2>
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Konfirmasi Password</label>
                        <input type="password" name="" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <div>
                        <p>Belum Punya Akun ? Silahkan Daftar di sini !!! <a href="register.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js script links -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eDexztdz/Dp8uTKJUp2Wz2Kp52bgirok3jBEUnj9/wF9C61PDiJL5GjBzuN2u7Y" crossorigin="anonymous"></script>
</body>

</html>