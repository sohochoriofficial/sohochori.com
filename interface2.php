<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']); // Adjust session variable as per your login system
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Emergency Helpline Services</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #a80808, #ff5e00);
            color: white;
        }

        .header {
            background: #fff4e1;
            padding: 10px;
            text-align: center;
            position: relative;
            z-index: 10;
        }

        .header input[type="text"] {
            width: 400px;
            padding: 8px;
            margin-right: 10px;
        }

        .header button.search-btn {
            background-color: orange;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
        }

        .logo {
            position: absolute;
            left: 10px;
            top: 5px;
            height: 50px;
        }

        .login-signup {
            position: absolute;
            right: 10px;
            top: 10px;
            padding: 8px 15px;
            font-weight: bold;
            color: white;
            border: none;
            cursor: pointer;
            animation: blink 2s infinite;
            border-radius: 5px;
        }

        .blink-heading {
            display: inline-block;
            animation: blink 2s infinite;
            padding: 15px;
            color: white;
            font-weight: bold;
            border-radius: 10px;
        }

        @keyframes blink {
            0% { background-color: red; }
            50% { background-color: blue; }
            100% { background-color: red; }
        }

        .top-nav {
            background-color: #ffd700;
            padding: 12px 10px;
            text-align: center;
            position: fixed;
            top: 55px;
            width: 100%;
            z-index: 999;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }

        .top-nav a {
            color: black;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 6px;
            transition: background 0.3s ease;
        }

        .top-nav a:hover {
            background-color: #ffcc00;
        }

        .spacer {
            margin-top: 100px;
        }

        .feature-section {
            display: flex;
            justify-content: center;
            gap: 50px;
            margin: 30px 0;
            text-align: center;
            flex-wrap: wrap;
        }

        .feature {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .scroll-box {
            width: 220px;
            height: 150px;
            overflow: hidden;
            position: relative;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .scroll-track {
            display: flex;
            width: 200%;
            height: 100%;
            animation: scroll-horizontal 8s linear infinite;
        }

        .scroll-track img {
            width: 220px;
            height: 150px;
            flex-shrink: 0;
        }

        @keyframes scroll-horizontal {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        .feature button {
            margin-top: 12px;
            background-color: #ff5e00;
            color: white;
            border: none;
            padding: 12px 22px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.4s ease;
        }

        .feature button:hover {
            background-color: #ffc04d;
        }

        .services {
            text-align: left;
            padding: 20px;
        }

        .services p {
            margin: 20px 0;
            font-size: 18px;
        }

        .services button {
            background-color: #ffd700;
            color: black;
            border: none;
            padding: 5px 10px;
            margin-left: 10px;
            cursor: pointer;
            font-weight: bold;
            border-radius: 5px;
        }

        .image-marquee-frame {
            padding: 40px 20px;
            background: bottom, #a80808, #ff5e00);
            text-align: center;
        }

        .marquee-container {
            overflow: hidden;
            position: relative;
            width: 100%;
            box-sizing: border-box;
        }

        .marquee-track {
            display: flex;
            width: max-content;
            animation: scroll-left 10s linear infinite;
            gap: 10px;
        }

        .marquee-track img {
            height: 180px;
            border-radius: 10px;
            flex-shrink: 0;
        }

        @keyframes scroll-left {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        @media (max-width: 768px) {
            .feature-section {
                flex-direction: column;
                align-items: center;
                gap: 30px;
            }

            .scroll-box {
                width: 90vw;
                height: auto;
            }

            .scroll-track img {
                width: 90vw;
                height: auto;
            }

            .feature button {
                width: 80%;
                font-size: 16px;
                padding: 10px;
            }

            .header input[type="text"] {
                width: 80%;
            }

            .top-nav {
                flex-direction: column;
                padding: 10px 0;
            }

            .top-nav a {
                display: inline-block;
                padding: 10px;
            }

            .marquee-track img {
                height: 120px;
            }
        }
    </style>
</head>
<body>

<div class="header">
    <img src="logo.jpg" alt="Sohochori Logo" class="logo">
    <form action="search.php" method="GET" style="display:inline;">
        <input type="text" name="query" placeholder="Search in Sohochori for help right now" required>
        <button class="search-btn" type="submit">🔍</button>
    </form>
    <button class="login-signup" onclick="window.location.href='login.php'">LOG IN / SIGN UP</button>
</div>

<nav class="top-nav">
    <a href="all-services.php">All</a>
    <a href="map.php">Hospital Tracker</a>
    <a href="emergency.php">Emergency</a>
    <a href="eahp/index.php">Ambulance Services</a>
    <a href="hospitalbooking.php">Blood Donor/Receiver</a>
    <a href="contact.php">Contact Us</a>
    <a href="feedback.php" style="color: #8B0000;">Feedback / Rate Us</a>
</nav>

<div class="spacer"></div>

<div class="feature-section">
    <div class="feature">
        <div class="scroll-box">
            <div class="scroll-track">
                <img src="map.avif" alt="Hospital Map">
                <img src="map.avif" alt="Hospital Map">
            </div>
        </div>
        <button onclick="<?php echo $isLoggedIn ? "window.location.href='map.php'" : "alert('Please log in to access this service.')"; ?>">SEARCH NEARBY HOSPITALS</button>
    </div>

    <div class="feature">
        <div class="scroll-box">
            <div class="scroll-track">
                <img src="blood.jpg" alt="Blood Donation">
                <img src="blood.jpg" alt="Blood Donation">
            </div>
        </div>
        <button onclick="<?php echo $isLoggedIn ? "window.location.href='hospitalbooking.php'" : "alert('Please log in to access this service.')"; ?>">FIND NEARBY DONOR/RECEIVER</button>
    </div>

    <div class="feature">
        <div class="scroll-box">
            <div class="scroll-track">
                <img src="ambulance.jpg" alt="Ambulance Booking">
                <img src="ambulance.jpg" alt="Ambulance Booking">
            </div>
        </div>
        <button onclick="<?php echo $isLoggedIn ? "window.location.href='eahp/index.php'" : "alert('Please log in to access this service.')"; ?>">BOOK YOUR AMBULANCE NOW!</button>
    </div>
</div>

<!-- Modern Scrolling Image Section -->
<div class="image-marquee-frame">
    <h2 class="blink-heading">Our Emergency Services in Action</h2>
    <div class="marquee-container">
        <div class="marquee-track">
            <img src="picture1.jpg" alt="Emergency 1">
            <img src="quote1.jpg" alt="Quote 1">
            <img src="ambulance2.jpg" alt="Emergency 2">
            <img src="quote2.jpg" alt="Quote 2">
            <img src="picture3.jpg" alt="Emergency 3">
            <img src="quote3.jpg" alt="Quote 3">
            <img src="picture4.jpg" alt="Emergency 4">
            <img src="picture1.jpg" alt="Emergency 1">
            <img src="quote1.jpg" alt="Quote 1">
            <img src="ambulance2.jpg" alt="Emergency 2">
            <img src="quote2.jpg" alt="Quote 2">
            <img src="picture3.jpg" alt="Emergency 3">
            <img src="quote3.jpg" alt="Quote 3">
            <img src="picture4.jpg" alt="Emergency 4">
        </div>
    </div>
</div>
<footer style="background-color: #fff4e1; text-align: center; padding: 15px 10px; color: #a80808; font-weight: bold; font-size: 16px;">
    &copy; 2025 Sohochori Emergency Services. All rights reserved.
</footer>

</body>
</html>
