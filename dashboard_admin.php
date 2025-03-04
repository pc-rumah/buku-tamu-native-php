<?php
session_start();

// Cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header('Location: login_admin.php'); // Redirect ke login jika belum login
    exit();
}

include 'koneksi.php'; // Sertakan file koneksi database
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@1.14.0/dist/full.css" rel="stylesheet">
</head>

<body>
    <div class="min-h-screen bg-base-200 p-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold">Dashboard Admin</h1>
            <a href="logout.php" class="btn btn-error">Logout</a>
        </div>

        <!-- Tabel Daftar Tamu -->
        <div class="overflow-x-auto">
            <table class="table w-full bg-base-100">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Nomor Telepon</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Ambil data tamu dari database
                    $sql = "SELECT * FROM kontak";
                    $result = $koneksi->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                          <td>{$row['id']}</td>
                          <td>{$row['nama']}</td>
                          <td>{$row['nomor_telepon']}</td>
                          <td>{$row['alamat']}</td>
                        </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Tidak ada data tamu.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>