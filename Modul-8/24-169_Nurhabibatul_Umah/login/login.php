<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 100px;
        }

        .form-login {
            width: 350px;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .form-login h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        input[type=text],
        input[type=password] {      
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {  
            width: 100%;
            background-color: #157cc1;
            color: white;
            padding: 14px;
            margin-top: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="form-login">
        <h2>Login</h2>

        <form action="proses_login.php" method="post">
            <label>Username:</label>
            <input type="text" name="username" placeholder="Enter Username" required>

            <label>Password:</label>
            <input type="password" name="password" placeholder="Enter Password" required>

            <input type="submit" value="Login">
        </form>
    </div>

</body>
</html>
