<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Emergency Services</title>
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
      letter-spacing: 1px;
    }

    .container {
      padding: 20px;
      max-width: 700px;
      margin: auto;
    }

    .card {
      background: #fff;
      border-radius: 12px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.07);
      transition: transform 0.2s ease;
    }

    .card:hover {
      transform: scale(1.02);
    }

    .card h2 {
      margin: 0 0 10px;
      color: #e65100;
      font-size: 20px;
    }

    .card a {
      display: block;
      margin: 6px 0;
      color: #ff5722;
      text-decoration: none;
      font-weight: bold;
      font-size: 16px;
    }

    .card a:hover {
      text-decoration: underline;
    }

    @media (max-width: 600px) {
      h1 { font-size: 22px; }
      .card h2 { font-size: 18px; }
      .card a { font-size: 15px; }

      .card:nth-child(1), .card:nth-child(2) {
        padding: 15px;
        font-size: 14px;
      }

      .card:nth-child(1) h2, .card:nth-child(2) h2 {
        font-size: 16px;
      }

      .card:nth-child(1) a, .card:nth-child(2) a {
        font-size: 14px;
      }

      header img.logo {
        height: 40px;
        top: 12px;
      }
    }

    @media (max-width: 400px) {
      h1 { font-size: 20px; }
      .card h2 { font-size: 16px; }
      .card a { font-size: 13px; }

      .card:nth-child(1), .card:nth-child(2) {
        padding: 12px;
      }

      .card:nth-child(1) h2, .card:nth-child(2) h2 {
        font-size: 14px;
      }

      .card:nth-child(1) a, .card:nth-child(2) a {
        font-size: 12px;
      }
    }
  </style>
</head>
<body>

<header>
  <img src="logo.jpg" alt="Sohochori Logo" class="logo">
  <h1>🚨 Emergency Services</h1>
</header>

<div class="container">
  <div class="card">
    <h2>🏥 Medical Emergency</h2>
    <a href="tel:102">📞 Call Ambulance: 102</a>
    <a href="tel:+1234567890">📞 Nearest Hospital: +1 234 567 890</a>
  </div>

  <div class="card">
    <h2>🚔 Police</h2>
    <a href="tel:100">📞 Call Police: 100</a>
    <a href="tel:+1112223333">📞 Local Station: +1 111 222 333</a>
  </div>

  <div class="card">
    <h2>🔥 Fire Department</h2>
    <a href="tel:101">📞 Call Fire Service: 101</a>
  </div>

  <div class="card">
    <h2>👩 Women’s Helpline</h2>
    <a href="tel:1091">📞 Women Safety: 1091</a>
  </div>
</div>

</body>
</html>
