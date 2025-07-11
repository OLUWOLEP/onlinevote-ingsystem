<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

$candidates_query = "SELECT * FROM votes";
$result = $conn->query($candidates_query);

$candidates = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $category = $row['category'];
        $candidates[$category][] = $row;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['vote'])) {
    foreach ($_POST['vote'] as $category => $candidate_id) {
        $conn->query("UPDATE votes SET vote_count = vote_count + 1 WHERE id = $candidate_id");
    }
    header("Location: thankyou.php");
    exit();
}
?>

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
    <h2>Welcome, <?php echo htmlspecialchars($username); ?>! Cast your vote below:</h2>
    <form method="POST">
        <?php foreach ($candidates as $category => $cands): ?>
            <div class="category">
                <h3><?php echo htmlspecialchars($category); ?></h3>
                <?php foreach ($cands as $cand): ?>
                    <label>
                        <input type="radio" name="vote[<?php echo htmlspecialchars($category); ?>]" value="<?php echo $cand['id']; ?>" required>
                        <?php echo htmlspecialchars($cand['name']); ?>
                    </label><br>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
        <input type="submit" value="Submit Vote">
    </form>
</div>
</body>
</html>