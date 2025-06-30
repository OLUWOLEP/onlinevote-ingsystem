<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #cce0ff, #e6f0ff);
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            padding: 30px;
        }
        h2, h3 {
            color: #004080;
            text-align: center;
        }
        label {
            display: block;
            margin-top: 12px;
            color: #333;
        }
        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #aaa;
            border-radius: 6px;
            margin-top: 5px;
        }
        input[type="submit"], button {
            background-color: #004080;
            color: #fff;
            border: none;
            padding: 10px 25px;
            margin-top: 20px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover, button:hover {
            background-color: #0059b3;
        }
        .nav {
            background-color: #003366;
            padding: 15px;
            text-align: center;
        }
        .nav a {
            color: #fff;
            margin: 0 15px;
            font-weight: 500;
            text-decoration: none;
        }
        .message {
            text-align: center;
            color: green;
            font-weight: 600;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Welcome to the Online Voting System</h2>
    <p><a href="register.php">Register</a> | <a href="login.php">Login</a> | <a href="results.php">View Results</a></p>
</div>
</body>
</html>