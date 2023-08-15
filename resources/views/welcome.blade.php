<!DOCTYPE html>
<html>
<head>
    <title>Web Pemesanan Kursus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .welcome-container {
            text-align: center;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 20px;
        }
        a {
            display: inline-block;
            margin: 5px;
            padding: 10px 20px;
            border: 1px solid #3490dc;
            border-radius: 5px;
            background-color: #3490dc;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #2779bd;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Website Pemesanan Kursus</h1>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Daftar</a>
    </div>
</body>
</html>
