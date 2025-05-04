<!-- all-services.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Emergency Services - Sohochori</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #fff4e1; /* light yellowish */
            color: black;
        }

        /* Logo Styling */
        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            height: 50px; /* Adjust as needed */
        }

        .page-heading {
            background-color: #0056b3; /* blue box */
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin: 0;
        }

        .services-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 40px 20px;
            gap: 30px;
        }

        .service-card {
            background: white;
            color: black;
            width: 260px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            text-align: center;
            padding: 20px;
            transition: transform 0.3s ease;
        }

        .service-card:hover {
            transform: scale(1.05);
        }

        .service-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .service-card h3 {
            margin: 15px 0 10px;
        }

        .service-card button {
            background-color: #ff5e00;
            color: white;
            border: none;
            padding: 10px 16px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 10px;
        }

        .service-card button:hover {
            background-color: #ffc04d;
        }

        @media (max-width: 768px) {
            .services-grid {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>

<!-- Logo in the top left corner -->
<img src="logo.jpg" alt="Sohochori Logo" class="logo">

<div class="page-heading">All Emergency Services</div>

<div class="services-grid">

    <div class="service-card">
        <img src="map.avif" alt="Hospital Tracker">
        <h3>Hospital Tracker</h3>
        <p>Find nearby hospitals with maps and directions.</p>
        <button onclick="window.location.href='map.php'">Search</button>
    </div>

    <div class="service-card">
        <img src="blood.jpg" alt="Blood Donation">
        <h3>Blood Donation</h3>
        <p>Find donors or donate blood to save lives.</p>
        <button onclick="window.location.href='hospitalbooking.php'">Donate</button>
    </div>

    <div class="service-card">
        <img src="ambulance.jpg" alt="Ambulance Booking">
        <h3>Ambulance Booking</h3>
        <p>Book emergency ambulance services instantly.</p>
        <button onclick="window.location.href='eahp/index.php'">Book</button>
    </div>

    <div class="service-card">
        <img src="emergency.jpg" alt="Emergency Contacts">
        <h3>Emergency Numbers</h3>
        <p>Call essential emergency helplines quickly.</p>
        <button onclick="window.location.href='emergency.php'">Call Now</button>
    </div>

    <div class="service-card">
        <img src="contact.webp" alt="Contact Us">
        <h3>Contact Us</h3>
        <p>Have questions? Reach out to our support team.</p>
        <button onclick="window.location.href='contact.php'">Contact</button>
    </div>

</div>

</body>
</html>
