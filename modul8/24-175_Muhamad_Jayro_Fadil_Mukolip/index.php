<?php
require __DIR__ . '/conn.php';
require __DIR__ . '/pages/tamplate/header.php';
?>

<div class="d-flex justify-content-center align-items-center min-vh-100 bg-primary bg-gradient">
    
    <div class="container" style="max-width: 500px;">
        
        <?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) { ?>
            <div class="alert alert-danger shadow-sm" role="alert">
                <h5 class="alert-heading"><i class="bi bi-exclamation-triangle-fill"></i> ERRORS :</h5>
                <ul class="mb-0 ps-3">
                    <?php foreach ($_SESSION['errors'] as $key => $value) { ?>
                        <li><?= $key . ' : ' . $value ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>

        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-body text-center p-5">
                <h1 class="text-primary fw-bold mb-3">Selamat Datang</h1>
                <p class="text-muted mb-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi eligendi saepe accusantium at hic impedit alias quisquam cupiditate exercitationem reprehenderit.
                </p>
                
                <a href="./pages/login.php" class="btn btn-primary btn-lg w-100 shadow-sm">
                    Login
                </a>
            </div>
        </div>

    </div>
</div>

<?php
require __DIR__ . '/pages/tamplate/footer.php';
?>