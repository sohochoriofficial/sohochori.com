<!DOCTYPE html>
<html>
<head>
  <title>Nearby Hospital Locator</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #fff3e0; /* Light orange */
      padding: 20px;
      text-align: center;
    }

    #logo {
      width: 120px;
      margin: 0 auto 10px auto;
      display: block;
    }

    #map {
      height: 300px;
      width: 80%;
      max-width: 600px;
      margin: 20px auto;
      border: 2px solid #ccc;
      border-radius: 10px;
    }

    .button-container {
      margin-top: 10px;
    }

    .search-button {
      background: linear-gradient(to bottom, #ffcccc 0%, #ff3300 100%);
      color: white;
      font-weight: bold;
      font-size: 18px;
      border: 2px solid red;
      padding: 12px 24px;
      border-radius: 10px;
      cursor: pointer;
    }

    .search-button:hover {
      background: linear-gradient(to bottom, #ff3300 0%, #cc0000 100%);
    }

    @keyframes markerPop {
      0% {
        transform: scale(0);
        opacity: 0;
      }
      60% {
        transform: scale(1.2);
        opacity: 1;
      }
      100% {
        transform: scale(1);
      }
    }

    .pop-marker {
      animation: markerPop 0.5s ease-out;
    }
  </style>
</head>
<body>

  <!-- Logo at the top center -->
  <img id="logo" src="logo.jpg" alt="Logo">

  <h2>Nearby Hospital Locator</h2>
  <div id="map"></div>

  <div class="button-container">
    <button class="search-button" onclick="showHospitals()">SEARCH YOUR NEARBY HOSPITAL</button>
  </div>

  <!-- Leaflet JS -->
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    const hospitalData = [
      { lat: 22.5656, lng: 88.3706, name: "NRS Medical College & Hospital" },
      { lat: 22.5665, lng: 88.3708, name: "Sealdah-NRS Hospital" },
      { lat: 22.5670, lng: 88.3712, name: "BR Singh Hospital" },
      { lat: 22.5644, lng: 88.3699, name: "Students Health Home" }
    ];

    const map = L.map('map').setView([22.5656, 88.3706], 16);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    let markersShown = false;

    function showHospitals() {
      if (!markersShown) {
        const bounds = L.latLngBounds();

        const redIcon = L.icon({
          iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
          iconSize: [25, 41],
          iconAnchor: [12, 41],
          popupAnchor: [1, -34],
          shadowUrl: '',
          shadowSize: [0, 0],
          shadowAnchor: [0, 0]
        });

        hospitalData.forEach((hospital, index) => {
          setTimeout(() => {
            const marker = L.marker([hospital.lat, hospital.lng], {
              icon: redIcon,
              riseOnHover: true
            }).addTo(map)
              .bindPopup(`<b>${hospital.name}</b>`);

            bounds.extend([hospital.lat, hospital.lng]);

            const markerEl = marker._icon;
            markerEl.classList.add('pop-marker');
          }, index * 200);
        });

        setTimeout(() => {
          map.fitBounds(bounds, { padding: [50, 50] });
        }, hospitalData.length * 200);

        markersShown = true;
      }
    }
  </script>
</body>
</html>
