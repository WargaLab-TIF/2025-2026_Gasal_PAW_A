<style>
    /* Style sederhana untuk pesan error */
    .error {
        color: red;
        font-size: 0.9em;
        margin-left: 10px;
    }
    div {
        margin-bottom: 15px;
    }
    label {
        display: inline-block;
        width: 120px;
    }
</style>

<form action="" method="POST">
    <div>
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="<?php if (isset($_POST['nim'])) echo htmlspecialchars($_POST['nim']); ?>">
        
        <span class="error"><?php if (isset($errors['nim'])) echo $errors['nim']; ?></span>
    </div>
    
    <div>
        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama" value="<?php if (isset($_POST['nama'])) echo htmlspecialchars($_POST['nama']); ?>">
        
        <span class="error"><?php if (isset($errors['nama'])) echo $errors['nama']; ?></span>
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
        
        <span class="error"><?php if (isset($errors['email'])) echo $errors['email']; ?></span>
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="">
        
        <span class="error"><?php if (isset($errors['password'])) echo $errors['password']; ?></span>
    </div>

    <div>
        <label></label>
        <button type="submit">Daftar</button>
    </div>
</form>