<?php
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $conn = new mysqli("localhost", "root", "", "sohochori");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $conn->set_charset("utf8mb4");

  $name = $_POST['name'];
  $country_code = $_POST['country_code'];
  $mobile = $_POST['mobile'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $house_no = $_POST['house'];
  $street_name = $_POST['street'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $pincode = $_POST['pincode'];

  $stmt = $conn->prepare("SELECT * FROM users1 WHERE mobile = ?");
  $stmt->bind_param("s", $mobile);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if ($result->num_rows > 0) {
    $message = "<div class='alert error'>Mobile number is already registered.</div>";
  } else {
    $stmt = $conn->prepare("INSERT INTO users1 (name, country_code, mobile, password, dob, gender, house_no, street_name, city, state, pincode, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("sssssssssss", $name, $country_code, $mobile, $password, $dob, $gender, $house_no, $street_name, $city, $state, $pincode);
    
    if ($stmt->execute()) {
      $message = "<div class='alert success'>Account created successfully! Redirecting...</div>";
      echo "<script>setTimeout(function(){ window.location.href='interface3.php'; }, 2000);</script>";
    } else {
      $message = "<div class='alert error'>Something went wrong. Please try again.</div>";
    }
  }
  $stmt->close();
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Account</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      background-color: #fcd56c;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 400px;
      margin: auto;
      background: white;
      padding: 20px;
      margin-top: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .logo {
      text-align: center;
      margin-bottom: 15px;
    }

    .logo img {
      width: 100px;
      height: auto;
    }

    h2 {
      text-align: center;
      font-weight: bold;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin: 10px 0 5px;
      font-weight: bold;
    }

    input[type="text"], input[type="tel"], input[type="password"], input[type="date"], select {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .mobile-wrapper {
      display: flex;
      gap: 10px;
      align-items: center;
      margin-bottom: 10px;
    }

    .country-code {
      width: 30%;
    }

    .mobile-input {
      width: 70%;
    }

    input[type="radio"] {
      margin-right: 5px;
    }

    .password-toggle {
      position: relative;
    }

    .toggle-icon {
      position: absolute;
      right: 10px;
      top: 11px;
      cursor: pointer;
    }

    small {
      color: green;
      display: block;
      margin-bottom: 10px;
    }

    .btn-group {
      display: flex;
      justify-content: space-between;
      gap: 10px;
      margin-top: 15px;
    }

    .btn-submit, .btn-reset {
      flex: 1;
      padding: 10px;
      border: none;
      color: white;
      font-weight: bold;
      cursor: pointer;
      background-color: #d9534f;
      border-radius: 5px;
    }

    .age-display {
      font-size: 14px;
      color: #333;
      margin-top: -5px;
      margin-bottom: 10px;
    }

    .alert {
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 5px;
      text-align: center;
      font-weight: bold;
    }

    .success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }

    .error {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }

    @media (max-width: 480px) {
      .container {
        padding: 15px;
      }
      .logo img {
        width: 80px;
      }
      .mobile-wrapper {
        flex-direction: column;
      }
      .country-code, .mobile-input {
        width: 100%;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="logo">
    <img src="logo.jpg" alt="Logo">
  </div>
  <h2>Create Account</h2>
  <?= $message ?>
  <form action="" method="POST" onreset="clearAge()">
    <label for="name">Full Name</label>
    <input type="text" id="name" name="name" placeholder="First and last name" required>

    <label for="mobile">Mobile number</label>
    <div class="mobile-wrapper">
      <select name="country_code" class="country-code" required>
        <option value="+91">+91</option>
        <option value="+1">+1</option>
        <option value="+44">+44</option>
      </select>
      <input type="tel" id="mobile" name="mobile" class="mobile-input" pattern="[0-9]{10}" maxlength="10" required placeholder="Mobile Number">
    </div>

    <label for="password">Password</label>
    <div class="password-toggle">
      <input type="password" id="password" name="password" placeholder="At least 6 characters" pattern=".{6,}" required>
      <span class="toggle-icon" onclick="togglePassword()">👁️</span>
    </div>
    <small>Passwords must be at least 6 characters.</small>

    <label for="dob">Date Of Birth</label>
    <input type="date" id="dob" name="dob" required onchange="calculateAge()">
    <div class="age-display" id="ageDisplay"></div>

    <label>Gender</label>
    <input type="radio" name="gender" value="Female" required> Female
    <input type="radio" name="gender" value="Male"> Male
    <input type="radio" name="gender" value="Others"> Others

    <label for="house">Address</label>
    <input type="text" name="house" placeholder="Enter House Number" required>
    <input type="text" name="street" placeholder="Enter Street Name" required>
    <input type="text" name="city" placeholder="Enter City" required>
    <input type="text" name="state" placeholder="Enter State" required>
    <input type="text" name="pincode" pattern="[0-9]{6}" maxlength="6" placeholder="Enter Pin Code" required>

    <div class="btn-group">
      <button type="submit" class="btn-submit">Submit</button>
      <button type="reset" class="btn-reset">Reset</button>
    </div>
  </form>
</div>

<script>
  function togglePassword() {
    const password = document.getElementById("password");
    const icon = document.querySelector(".toggle-icon");
    if (password.type === "password") {
      password.type = "text";
      icon.textContent = "🙈";
    } else {
      password.type = "password";
      icon.textContent = "👁️";
    }
  }

  function calculateAge() {
    const dob = document.getElementById("dob").value;
    const ageDisplay = document.getElementById("ageDisplay");
    if (!dob) return;
    const birthDate = new Date(dob);
    const today = new Date();
    let age = today.getFullYear() - birthDate.getFullYear();
    const monthDiff = today.getMonth() - birthDate.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
      age--;
    }
    ageDisplay.textContent = `Age: ${age} years`;
  }

  function clearAge() {
    document.getElementById("ageDisplay").textContent = "";
  }
</script>

</body>
</html>
