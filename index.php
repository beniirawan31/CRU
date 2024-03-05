<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="siswa.php">Siswa</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="tambah.php">Tambah Data</a>
                    </li>
                    <div class="">
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Log Out</a>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h2>Siswa List</h2>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nis</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("koneksi.php");
                        $siswa = mysqli_query($koneksi, "SELECT * FROM siswa");

                        // Inisialisasi variabel $i
                        $i = 1;

                        foreach ($siswa as $data) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $data['nis'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['jk'] ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $data['id'] ?>" class="btn btn-warning">Edit</a>
                                    <a href="delete.php?id=<?= $data['id'] ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-GLhlTQ8iKDEr+L6d60zPtJz6u8WdQhiuFxFY+gBUyIJSQqFqTCBROVR42RjU66tj" crossorigin="anonymous"></script>
</body>

</html>