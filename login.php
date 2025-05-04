<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In – Sohochori</title>
  <style>
    *, *::before, *::after { box-sizing: border-box; }
    body {
      background-color: #fecd6c;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      padding: 20px;
      margin: 0;
    }
    .container {
      background: white;
      padding: 30px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
      border-radius: 8px;
    }
    .logo { text-align: center; margin-bottom: 20px; }
    .logo img { max-width: 100%; height: auto; }
    h2 { margin-top: 0; font-size: 1.5rem; }
    label { display: block; margin-bottom: 5px; font-weight: bold; }
    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      transition: transform 0.2s ease, border-color 0.2s ease;
    }
    input[type="text"]:focus {
      transform: scale(1.02);
      border-color: #888;
      outline: none;
    }
    button {
      width: 100%;
      padding: 12px;
      background: yellow;
      border: none;
      font-weight: bold;
      cursor: pointer;
      border-radius: 4px;
      font-size: 1rem;
      margin-bottom: 10px;
    }
    .terms { font-size: 0.8rem; margin-top: 10px; }
    .terms a, .help-link {
      color: teal;
      text-decoration: none;
      cursor: pointer;
    }
    .help-link {
      display: inline-block;
      margin-top: 10px;
      font-size: 0.8rem;
    }
    #message { margin-top: 10px; font-weight: bold; min-height: 1.2em; }

    .create-box {
      background: yellow;
      padding: 15px;
      margin-top: 10px;
      text-align: center;
      border-radius: 4px;
    }
    .create-box a {
      font-weight: bold;
      color: black;
      text-decoration: none;
      pointer-events: none;
      opacity: 0.6;
    }
    .create-box a.active {
      pointer-events: auto;
      opacity: 1;
    }

    /* Popup styles */
    #popupOverlay {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background-color: rgba(0,0,0,0.5);
      z-index: 999;
    }
    #popupContent {
      background: white;
      padding: 20px;
      width: 90%;
      max-width: 500px;
      margin: 100px auto;
      border-radius: 8px;
      position: relative;
      max-height: 80%;
      overflow-y: auto;
    }
    #popupContent h2 {
      margin-top: 0;
    }
    #popupContent span.close-btn {
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 1.2rem;
      cursor: pointer;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="logo">
      <img src="logo.jpg" alt="Sohochori Logo">
    </div>

    <h2><u>Sign In</u></h2>
    <form id="loginForm">
      <label for="username">Email or mobile phone number</label>
      <input type="text" id="username" name="username" required>
      <button type="submit">CONTINUE</button>
    </form>
    <div id="message"></div>

    <div class="terms">
      By continuing, you agree to Sohochori’s 
      <a onclick="showPopup('conditions')">Conditions of Use</a> and 
      <a onclick="showPopup('privacy')">Privacy Notice</a>.
    </div>
    <a class="help-link" onclick="showPopup('help')">Need help?</a>

    <p style="margin-top:20px; font-size:1rem;">New to Sohochori?</p>
    <div class="create-box">
      <a id="registerLink" href="register.php">Create your Account Right Now</a>
    </div>
  </div>

  <!-- Popup Modal -->
  <div id="popupOverlay">
    <div id="popupContent">
      <span class="close-btn" onclick="closePopup()">&times;</span>
      <div id="popupText"></div>
    </div>
  </div>

  <script>
    document.getElementById('loginForm').addEventListener('submit', function(e) {
      e.preventDefault();
      const username = document.getElementById('username').value.trim();
      const msgEl = document.getElementById('message');
      msgEl.textContent = '';

      if (!username) {
        msgEl.style.color = 'red';
        msgEl.textContent = 'Please enter your email or phone.';
        return;
      }

      fetch('process_login.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'username=' + encodeURIComponent(username)
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          msgEl.style.color = 'green';
          msgEl.textContent = data.message;
          document.getElementById('registerLink').classList.add('active');
        } else {
          msgEl.style.color = 'red';
          msgEl.textContent = data.message;
          document.getElementById('registerLink').classList.remove('active');
        }
      })
      .catch(() => {
        msgEl.style.color = 'red';
        msgEl.textContent = 'Unexpected error. Please try again.';
      });
    });

    function showPopup(type) {
      const text = {
        conditions: `
          <h2>Conditions of Use</h2>
          <ul>
            <li>You must be at least 13 years old to use this service.</li>
            <li>Do not misuse the platform or engage in unlawful activity.</li>
            <li>Respect all users and their content.</li>
            <li>Violation of these terms may result in account suspension.</li>
          </ul>`,
        privacy: `
          <h2>Privacy Notice</h2>
          <ul>
            <li>We collect your name, email or phone to create your account.</li>
            <li>We do not sell your data to third parties.</li>
            <li>Data may be shared with trusted services to improve your experience.</li>
            <li>You can request deletion of your data at any time.</li>
          </ul>`,
        help: `
          <h2>Need Help?</h2>
          <p>If you're having trouble:</p>
          <ul>
            <li>Make sure your internet connection is active.</li>
            <li>Double-check your email or mobile number.</li>
            <li>Contact us at <strong>sohochori25@gmail.com</strong> if issues persist.</li>
          </ul>`
      };
      document.getElementById('popupText').innerHTML = text[type];
      document.body.style.overflow = 'hidden'; // Lock background scroll
      document.getElementById('popupOverlay').style.display = 'block';
    }

    function closePopup() {
      document.getElementById('popupOverlay').style.display = 'none';
      document.body.style.overflow = 'auto'; // Restore scroll
    }
  </script>

</body>
</html>