<?php
$conn = new mysqli("localhost", "root", "", "sohochori");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

$sql = "SELECT name, email, rating, feedback, submitted_at FROM feedback ORDER BY submitted_at DESC";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Feedback - Sohochori</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: linear-gradient(to bottom, #a80808, #ff5e00);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            color: #222;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.15);
            overflow: hidden;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            max-width: 150px;
        }

        h2 {
            text-align: center;
            color: #a80808;
            margin-bottom: 20px;
        }

        .scroll-container {
            max-height: 400px;
            overflow: hidden;
            position: relative;
        }

        .scroll-inner {
            display: flex;
            flex-direction: column;
            animation: scroll-down 15s linear infinite;
        }

        @keyframes scroll-down {
            0% { transform: translateY(-100%); }
            100% { transform: translateY(100%); }
        }

        .feedback-item {
            border-bottom: 1px solid #eee;
            padding: 20px 0;
        }

        .feedback-item:last-child {
            border-bottom: none;
        }

        .feedback-item h3 {
            margin: 0;
            font-size: 1.1rem;
            color: #a80808;
        }

        .feedback-item .details {
            margin-top: 4px;
            font-size: 0.9rem;
            color: #666;
        }

        .feedback-item .rating {
            color: #ff5e00;
            font-size: 1rem;
        }

        .feedback-item .feedback-text {
            margin-top: 10px;
            font-size: 1rem;
            color: #333;
        }

        @media (max-width: 480px) {
            .container {
                margin: 20px 15px;
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="logo">
        <img src="logo.jpg" alt="Sohochori Logo">
    </div>
    <h2>User Feedback</h2>

    <?php if ($result->num_rows > 0): ?>
        <div class="scroll-container">
            <div class="scroll-inner">
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="feedback-item">
                        <h3><?= htmlspecialchars($row['name']) ?> (<?= htmlspecialchars($row['email']) ?>)</h3>
                        <div class="details">
                            <span class="rating"><?= str_repeat('⭐', $row['rating']) ?></span> |
                            <span><?= date("F j, Y, g:i a", strtotime($row['submitted_at'])) ?></span>
                        </div>
                        <div class="feedback-text">
                            <?= nl2br(htmlspecialchars($row['feedback'])) ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php else: ?>
        <p>No feedback available.</p>
    <?php endif; ?>
</div>

</body>
</html>
