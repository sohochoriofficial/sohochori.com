<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SOHOCHORI</title>
  <style>
    /* Reset margins and box sizing */
    *, *::before, *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    /* Full-screen flex container */
    body {
      background-color: #f0eec4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      width: 100vw;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    /* Responsive logo */
    .logo {
      width: 80vw;
      max-width: 600px;
      height: auto;
      object-fit: contain;
      animation: fadeIn 1.5s ease-in-out;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.9); }
      to   { opacity: 1; transform: scale(1); }
    }
  </style>
</head>
<body>
  <img src="logo.jpg" alt="SOHOCHORI Logo" class="logo" />
  <script>
    // Redirect to login.php after animation ends
    document.addEventListener('DOMContentLoaded', function() {
      // Match the CSS animation duration (1.5s)
      setTimeout(function() {
        window.location.href = 'interface2.php';
      }, 1500);
    });
  </script>
</body>
</html>