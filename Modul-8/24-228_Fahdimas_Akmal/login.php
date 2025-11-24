<!DOCTYPE html>
<html>
<head>
    <title>Login System</title>
    <link rel="stylesheet" href="style.css">
    
    <style>
        body { 
            background-color: #e9ecef; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            height: 100vh; 
            margin: 0;
            font-family: Arial, sans-serif;
        }
        
        .login-form { 
            width: 350px; 
            padding: 30px; 
            background: white; 
            border-radius: 8px; 
            box-shadow: 0px 4px 20px rgba(0,0,0,0.1); 
            border: 1px solid #ddd;
        }
        
        .login-title { 
            color: #333; 
            text-align: center; 
            margin-bottom: 25px; 
            font-weight: bold; 
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

       .pesan {
            padding: 10px;
            margin-bottom: 15px;
            text-align: center;
            border-radius: 4px;
            font-size: 14px;
        }
        .gagal { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .warning { background-color: #fff3cd; color: #856404; border: 1px solid #ffeeba; }
        .sukses { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }

       
        input[type="text"], input[type="password"] {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 15px;
        }
        
        button {
            width: 100%;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="login-form">
        <h2 class="login-title">Login</h2>
        
        <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "gagal"){
                echo "<div class='pesan gagal'>Login gagal! <br>Cek Username/Password</div>";
            } else if($_GET['pesan'] == "belum_login"){
                echo "<div class='pesan warning'>Silahkan login dulu!</div>";
            } else if($_GET['pesan'] == "logout"){
                echo "<div class='pesan sukses'>Berhasil Logout</div>";
            }
        }
        ?>
        
        <form action="cek_login.php" method="post">
            <div>
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan username" required>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn btn-blue">Login Masuk</button>
        </form>
    </div>

</body>
</html>