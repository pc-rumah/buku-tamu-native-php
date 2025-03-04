<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form dengan DaisyUI</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@1.14.0/dist/full.css" rel="stylesheet">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>
    <div class="min-h-screen flex items-center justify-center bg-base-200">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title">Form Kontak</h2>
                <form id="kontakForm" action="proses_form.php" method="POST">
                    <!-- Input Nama -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nama</span>
                        </label>
                        <input type="text" name="nama" placeholder="Masukkan nama Anda" class="input input-bordered" required>
                    </div>

                    <!-- Input Nomor Telepon -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nomor Telepon</span>
                        </label>
                        <input type="tel" name="nomor_telepon" placeholder="Masukkan nomor telepon" class="input input-bordered" required>
                    </div>

                    <!-- Input Alamat -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Alamat</span>
                        </label>
                        <textarea name="alamat" placeholder="Masukkan alamat Anda" class="textarea textarea-bordered" rows="3" required></textarea>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="form-control mt-6">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Script untuk menangani alert -->
    <script>
        document.getElementById('kontakForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah form submit secara default

            // Kirim data form menggunakan Fetch API
            fetch('proses_form.php', {
                    method: 'POST',
                    body: new FormData(this)
                })
                .then(response => response.text())
                .then(data => {
                    if (data.includes("berhasil")) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Data berhasil disimpan.',
                        }).then(() => {
                            window.location.reload(); // Reload halaman setelah alert
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat menyimpan data.',
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan jaringan.',
                    });
                });
        });
    </script>
</body>

</html>