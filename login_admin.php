<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@1.14.0/dist/full.css" rel="stylesheet">
</head>

<body>
    <div class="min-h-screen flex items-center justify-center bg-base-200">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title">Login Admin</h2>
                <form id="loginForm" action="proses_login.php" method="POST">
                    <!-- Input Username -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Username</span>
                        </label>
                        <input type="text" name="username" placeholder="Masukkan username" class="input input-bordered" required>
                    </div>

                    <!-- Input Password -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password" name="password" placeholder="Masukkan password" class="input input-bordered" required>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="form-control mt-6">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SweetAlert untuk Notifikasi -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah form submit secara default

            // Kirim data form menggunakan Fetch API
            fetch('proses_login.php', {
                    method: 'POST',
                    body: new FormData(this)
                })
                .then(response => response.text())
                .then(data => {
                    if (data === "berhasil") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Berhasil!',
                            text: 'Anda akan diarahkan ke dashboard.',
                        }).then(() => {
                            window.location.href = 'dashboard_admin.php'; // Redirect ke dashboard
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Gagal!',
                            text: 'Username atau password salah.',
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Terjadi kesalahan jaringan.',
                    });
                });
        });
    </script>
</body>

</html>