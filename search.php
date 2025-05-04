<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Search Sohochori</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome for mic icon (removed since no mic is used) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #fff4e1;
    }

    header {
      background-color: #0056b3;
      color: white;
      padding: 20px;
      text-align: center;
      position: relative;
    }

    header img.logo {
      position: absolute;
      top: 10px;
      left: 10px;
      height: 50px;
    }

    h1 {
      margin: 0;
      font-size: 26px;
    }

    .container {
      max-width: 600px;
      margin: 40px auto;
      padding: 20px;
      background: white;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    form {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
      flex-wrap: wrap;
      position: relative;
    }

    input[type="text"] {
      padding: 12px;
      width: 70%;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 16px;
    }

    .suggestions {
      position: absolute;
      top: 45px;
      left: 0;
      right: 0;
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 0 0 8px 8px;
      z-index: 1000;
      text-align: left;
    }

    .suggestions div {
      padding: 10px;
      cursor: pointer;
    }

    .suggestions div:hover {
      background-color: #f0f0f0;
    }

    button {
      padding: 12px 16px;
      border: none;
      border-radius: 8px;
      background-color: #ff9800;
      color: white;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background-color: #e68900;
    }

    .result {
      margin-top: 30px;
      font-size: 18px;
    }

    a {
      color: #0056b3;
      text-decoration: none;
      font-weight: bold;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<header>
  <img src="logo.jpg" alt="Sohochori Logo" class="logo">
  <h1>Search Sohochori Services</h1>
</header>

<div class="container">
  <form id="searchForm" method="GET" autocomplete="off">
    <div style="position: relative; width: 100%;">
      <input type="text" id="searchInput" name="query" placeholder="Search (e.g. hospital, police, contact)" required>
      <div id="suggestions" class="suggestions" style="display: none;"></div>
    </div>
    <button type="submit">Search</button>
  </form>

  <div class="result">
    <?php
      if (isset($_GET['query'])) {
        $query = strtolower(trim($_GET['query']));
        if (strpos($query, 'hospital') !== false || strpos($query, 'map') !== false || strpos($query, 'track') !== false) {
          echo "Redirecting to <a href='map.php'>Hospital Tracker</a>...";
          echo "<script>setTimeout(() => window.location.href = 'map.php', 1500);</script>";
        } elseif (strpos($query, 'blood') !== false || strpos($query, 'donate') !== false) {
          echo "Redirecting to <a href='donate.php'>Blood Donation</a>...";
          echo "<script>setTimeout(() => window.location.href = 'donate.php', 1500);</script>";
        } elseif (strpos($query, 'ambulance') !== false || strpos($query, 'booking') !== false) {
          echo "Redirecting to <a href='ambulance-booking.php'>Ambulance Booking</a>...";
          echo "<script>setTimeout(() => window.location.href = 'ambulance-booking.php', 1500);</script>";
        } elseif (strpos($query, 'emergency') !== false || strpos($query, 'police') !== false || strpos($query, 'fire') !== false || strpos($query, 'women') !== false) {
          echo "Redirecting to <a href='emergency.php'>Emergency Services</a>...";
          echo "<script>setTimeout(() => window.location.href = 'emergency.php', 1500);</script>";
        } elseif (strpos($query, 'contact') !== false || strpos($query, 'email') !== false || strpos($query, 'address') !== false) {
          echo "Redirecting to <a href='contact.php'>Contact Page</a>...";
          echo "<script>setTimeout(() => window.location.href = 'contact.php', 1500);</script>";
        } else {
          echo "No results found. Please try another keyword.";
        }
      }
    ?>
  </div>
</div>

<!-- JavaScript -->
<script>
  const suggestions = [
    "Hospital",
    "Hospital tracker",
    "Map",
    "Blood donation",
    "Donate blood",
    "Ambulance",
    "Ambulance booking",
    "Emergency",
    "Police",
    "Fire service",
    "Women helpline",
    "Contact",
    "Email",
    "Address"
  ];

  const input = document.getElementById('searchInput');
  const suggestionBox = document.getElementById('suggestions');

  input.addEventListener('input', function() {
    const query = this.value.toLowerCase();
    suggestionBox.innerHTML = '';
    if (query.length === 0) {
      suggestionBox.style.display = 'none';
      return;
    }

    const matched = suggestions.filter(item => item.toLowerCase().includes(query));
    if (matched.length === 0) {
      suggestionBox.style.display = 'none';
      return;
    }

    matched.forEach(item => {
      const div = document.createElement('div');
      div.textContent = item;
      div.onclick = () => {
        input.value = item;
        suggestionBox.style.display = 'none';
      };
      suggestionBox.appendChild(div);
    });

    suggestionBox.style.display = 'block';
  });

  document.addEventListener('click', function(e) {
    if (!e.target.closest('.suggestions') && e.target !== input) {
      suggestionBox.style.display = 'none';
    }
  });
</script>

</body>
</html>
