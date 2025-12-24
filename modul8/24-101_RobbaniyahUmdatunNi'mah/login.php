<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background: #f4f4f4; 
            padding: 50px; 
            display: flex;
            justify-content: center;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .gif-box img {
            width: 150px;
        }

        .login-box {
            width: 300px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .login-box h2 { text-align: center; color: #2c3e50; }

        .login-box input[type="text"], 
        .login-box input[type="password"] {
            width: 93%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-box button {
            width: 100%;
            padding: 10px;
            background: #2c3e50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-box button:hover {
            background: #1e293b;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="gif-box">
            <img src="https://media.giphy.com/media/2zVg82BRsKVUMyaEtp/giphy.gif">
        </div>

        <div class="login-box">
            <h2>Login Admin</h2>

            <form method="POST" action="prosesLogin.php">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>

    </div>

</body>
</html>