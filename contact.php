<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #fff4e1;
      color: #333;
    }

    header {
      background-color:  #0056b3;
      color: white;
      padding: 25px 10px;
      text-align: center;
      position: relative;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    header img.logo {
      position: absolute;
      top: 15px;
      left: 15px;
      height: 50px;
    }

    h1 {
      margin: 0;
      font-size: 26px;
    }

    .container {
      max-width: 600px;
      margin: 30px auto;
      padding: 20px;
    }

    .contact-card {
      background: #fff;
      border-radius: 12px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.07);
      transition: transform 0.2s ease;
    }

    .contact-card:hover {
      transform: scale(1.02);
    }

    .contact-card h2 {
      margin-top: 0;
      color: #e65100;
      font-size: 20px;
      margin-bottom: 10px;
    }

    .contact-info {
      font-size: 16px;
      line-height: 1.6;
    }

    .contact-info a {
      color: #ff5722;
      text-decoration: none;
      font-weight: bold;
    }

    .contact-info a:hover {
      text-decoration: underline;
    }

    @media (max-width: 600px) {
      h1 { font-size: 22px; }
      .contact-card h2 { font-size: 18px; }
      .contact-info { font-size: 15px; }
      header img.logo { height: 40px; top: 12px; }
    }
  </style>
</head>
<body>

<header>
  <img src="logo.jpg" alt="Sohochori Logo" class="logo">
  <h1>📞 Contact Us</h1>
</header>

<div class="container">
  <div class="contact-card">
    <h2>📍 Office Address</h2>
    <div class="contact-info">
      27 no. Kamini School Lane,<br>
      Salkia, Howrah-711106
    </div>
  </div>

  <div class="contact-card">
    <h2>📱 Phone Numbers</h2>
    <div class="contact-info">
      📞 <a href="tel:+919123969984">+91 91239 69984</a><br>
      📞 <a href="tel:+919836164220">+91 98361 64220</a>
    </div>
  </div>

  <div class="contact-card">
    <h2>📧 Email</h2>
    <div class="contact-info">
      <a href="mailto:sohochori25@gmail.com">sohochori25@gmail.com</a><br>
      <a href="mailto:support@example.com">support@example.com</a>
    </div>
  </div>
</div>

</body>
</html>
