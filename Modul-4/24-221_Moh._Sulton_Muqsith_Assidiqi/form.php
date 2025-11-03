<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validasi Data Mahasiswa</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #74ABE2, #5563DE);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            padding: 2rem 3rem;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 1rem;
        }

        label {
            display: block;
            text-align: left;
            font-weight: 500;
            color: #555;
            margin-bottom: 0.5rem;
        }

        input[type="text"], 
        input[type="email"], 
        input[type="number"], 
        input[type="url"], 
        input[type="tel"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.2s ease-in-out;
            margin-bottom: 1rem;
        }

        input:focus {
            border-color: #5563DE;
            outline: none;
            box-shadow: 0 0 6px rgba(85,99,222,0.4);
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background: #5563DE;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background: #3f4db8;
        }

        .note {
            font-size: 12px;
            color: #777;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Validasi Data Mahasiswa</h2>
        <form action="processData.php" method="POST">
            <label for="surname">Nama Belakang (Surname):</label>
            <input type="text" id="surname" name="surname" placeholder="Masukkan nama belakang..." required>

            <input type="submit" value="Kirim Data">
        </form>
        <p class="note">*Data akan divalidasi di sisi server menggunakan PHP.</p>
    </div>
</body>
</html>
