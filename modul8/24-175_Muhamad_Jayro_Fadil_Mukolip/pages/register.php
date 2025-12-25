<?php
require __DIR__ . '/../conn.php';
require __DIR__ . '/tamplate/header.php';
?>

<div class="d-flex justify-content-center align-items-center min-vh-100 bg-primary bg-gradient py-4">
    
    <div class="container" style="max-width: 500px;">

        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-body p-4 p-sm-5">
                
                <h2 class="text-center text-primary fw-bold mb-4">Register</h2>

                <?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ERRORS :</strong>
                        <ul class="mb-0 ps-3 small">
                        <?php foreach ($_SESSION['errors'] as $key => $value) { ?>
                            <li><?= $key . ' : ' . $value?></li>
                        <?php } ?>
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>

                <form action="../tindakan/vall_input.php" method="post">
                    <input type="hidden" name="register">

                    <div class="mb-3">
                        <label for="username" class="form-label text-muted">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Buat username unik" required>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label text-muted">Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nama lengkap Anda" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label text-muted">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Buat password kuat" required>
                    </div>

                    <div class="mb-3">
                        <label for="hp" class="form-label text-muted">Nomor HP</label>
                        <input type="number" class="form-control" name="hp" id="hp" placeholder="Contoh: 0812..." required>
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="form-label text-muted">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-lg shadow-sm">Register</button>
                    </div>

                    <div class="text-center">
                        <p class="text-muted mb-0">
                            Sudah punya akun? 
                            <a href="login.php" class="text-primary fw-bold text-decoration-none">Login</a>
                        </p>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

<?php
require __DIR__ . '/tamplate/footer.php';
?>