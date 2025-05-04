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
        }

        .header input[type="text"] {
            width: 400px;
            padding: 8px;
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
            height: 80px;
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

        @keyframes blink {
            0% { background-color: red; }
            50% { background-color: blue; }
            100% { background-color: red; }
        }

        h1 {
            text-align: center;
            text-decoration: underline;
            color: white;
            font-size: 40px;
            font-weight: bold;
        }

        nav {
            text-align: center;
            margin: 20px 0;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
            text-decoration-color: white;
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

        .contact-box {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #ffd700;
            color: black;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
        }

        .contact-box h3 {
            margin-top: 0;
            font-weight: bold;
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
        }
    </style>
</head>
<body>

<div class="header">
    <img src="logo.jpg" alt="Sohochori Logo" class="logo">
    <input type="text" placeholder="Search in Sohochori for help right now">
    <button class="search-btn">🔍</button>
    <button class="login-signup" onclick="window.location.href='login.php'">LOG IN / SIGN UP</button>
</div>

<h1>Emergency Helpline Services</h1>

<nav>
    <a href="all-services.php">All</a> |
    <a href="map.php">Hospital Tracker</a> |
    <a href="emergency.php">Emergency</a> ||
    <a href="ambulance-booking.php">Ambulance</a> |
    <a href="hospitalbooking.php">Blood Donation</a> |
    <a href="contact.php">Contact Us</a>
</nav>

<div class="feature-section">
    <div class="feature">
        <div class="scroll-box">
            <div class="scroll-track">
                <img src="map.avif" alt="Hospital Map">
                <img src="map.avif" alt="Hospital Map">
            </div>
        </div>
        <button onclick="window.location.href='map.php'">SEARCH HOSPITAL</button>
    </div>

    <div class="feature">
        <div class="scroll-box">
            <div class="scroll-track">
                <img src="blood.jpg" alt="Blood Donation">
                <img src="blood.jpg" alt="Blood Donation">
            </div>
        </div>
        <button onclick="window.location.href='hospitalbooking.php'">DONATE BLOOD</button>
    </div>

    <div class="feature">
        <div class="scroll-box">
            <div class="scroll-track">
                <img src="ambulance.jpg" alt="Ambulance Booking">
                <img src="ambulance.jpg" alt="Ambulance Booking">
            </div>
        </div>
        <button onclick="window.location.href='ambulance-booking.php'">BOOK AMBULANCE</button>
    </div>
</div>

<div class="services">
    <p><i><b>SEARCH FOR A NEARBY HOSPITAL</b></i>
        <button onclick="window.location.href='map.php'">Click Here</button>
    </p>
    <p><i><b>BOOK AN AMBULANCE</b></i>
        <button onclick="window.location.href='ambulance-booking.php'">Click Here</button>
    </p>
    <p><i><b>FIND NEARBY BLOOD DONOR / RECEIVER</b></i>
        <button onclick="window.location.href='hospitalbooking.php'">Click Here</button>
    </p>
</div>

<div class="contact-box">
    <h3>Contact Us</h3>
    <p><strong>Helpline:</strong> +91 91239 69984</p>
    <p><strong>Email:</strong><br>contact@emergencyservices.com</p>
    <p>© 2025 Sohochori Emergency Services.</p>
</div>

</body>
</html>   