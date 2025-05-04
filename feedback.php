<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $conn = new mysqli("localhost", "root", "", "sohochori");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $conn->set_charset("utf8mb4");

  $name = trim($_POST["name"]);
  $email = trim($_POST["email"]);
  $rating = $_POST["rating"];
  $feedback = trim($_POST["feedback"]);

  $stmt = $conn->prepare("INSERT INTO feedback (name, email, rating, feedback, submitted_at) VALUES (?, ?, ?, ?, NOW())");
  $stmt->bind_param("ssis", $name, $email, $rating, $feedback);

  if ($stmt->execute()) {
    header("Location: feedbackdisplay.php");
    exit;
  } else {
    $message = "<div class='alert error'>Something went wrong. Please try again.</div>";
  }

  $stmt->close();
  $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Feedback - Sohochori</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    *, *::before, *::after { box-sizing: border-box; }

    body {
      background: linear-gradient(to bottom, #a80808, #ff5e00);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      color: #333;
    }

    .logo-container {
      text-align: center;
      margin-top: 30px;
    }

    .logo-container img {
      max-width: 160px;
      height: auto;
    }

    .container {
      max-width: 500px;
      margin: 30px auto 60px;
      background: #fff;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.15);
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #a80808;
    }

    label {
      display: block;
      margin: 12px 0 6px;
      font-weight: 600;
      color: #333;
    }

    input[type="text"],
    input[type="email"],
    select,
    textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      margin-bottom: 15px;
      font-size: 1rem;
    }

    textarea {
      resize: vertical;
      min-height: 100px;
    }

    .btn-submit {
      background-color: #a80808;
      color: #fff;
      border: none;
      padding: 14px;
      width: 100%;
      font-size: 16px;
      font-weight: bold;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
      background-color: #ff5e00;
    }

    .alert {
      padding: 12px;
      border-radius: 6px;
      margin-bottom: 20px;
      text-align: center;
      font-weight: bold;
    }

    .success {
      background-color: #d4edda;
      color: #155724;
    }

    .error {
      background-color: #f8d7da;
      color: #721c24;
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

  <div class="logo-container">
    <img src="logo.jpg" alt="Sohochori Logo">
  </div>

  <div class="container">
    <h2>We Value Your Feedback</h2>
    <?= $message ?>
    <form method="POST" action="">
      <label for="name">Your Name</label>
      <input type="text" name="name" id="name" required>

      <label for="email">Your Email</label>
      <input type="email" name="email" id="email" required>

      <label for="rating">Rating</label>
      <select name="rating" id="rating" required>
        <option value="" disabled selected>Select Rating</option>
        <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
        <option value="4">⭐⭐⭐⭐ Good</option>
        <option value="3">⭐⭐⭐ Average</option>
        <option value="2">⭐⭐ Poor</option>
        <option value="1">⭐ Very Poor</option>
      </select>

      <label for="feedback">Your Feedback</label>
      <textarea name="feedback" id="feedback" placeholder="Share your thoughts..." required></textarea>

      <button type="submit" class="btn-submit">Submit Feedback</button>
    </form>
  </div>

</body>
</html>
