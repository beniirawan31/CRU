<?php
include("koneksi.php");

// Mendapatkan ID siswa dari URL jika ada
$id = isset($_GET['id']) ? $_GET['id'] : null;



// Mendapatkan data siswa berdasarkan ID
$query = "SELECT * FROM siswa WHERE id = $id";
$result = mysqli_query($koneksi, $query);

// Memeriksa apakah data ditemukan
if (!$result || mysqli_num_rows($result) === 0) {
    // Redirect atau tampilkan pesan kesalahan jika data tidak ditemukan
    // Contoh: header("Location: index.php");
    // exit();
    echo "Data siswa tidak ditemukan.";
    exit();
}

$data = mysqli_fetch_assoc($result);

// Handling form submission for updating data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];

    // Update data siswa di database
    $query_update = "UPDATE siswa SET nis = '$nis', nama = '$nama', jk = '$jk' WHERE id = $id";
    mysqli_query($koneksi, $query_update);

    // Redirect ke halaman utama
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Data Siswa</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label for="nis" class="form-label">NIS:</label>
                <input type="text" name="nis" class="form-control" value="<?= $data['nis'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="jk" class="form-label">Jenis Kelamin:</label>
                <select name="jk" class="form-select" required>
                    <option value="L" <?= ($data['jk'] == 'L') ? 'selected' : 'LAKI-LAKI' ?>>Laki-laki</option>
                    <option value="P" <?= ($data['jk'] == 'P') ? 'selected' : 'PEREMPUAN' ?>>Perempuan</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>