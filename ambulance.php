<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hospital Phone Numbers</title>
  <style>
    body {
      background-color: #f9cb85;
      font-family: Arial;
      text-align: center;
      padding: 30px;
    }
    .container {
      background: white;
      border-radius: 12px;
      padding: 20px;
      width: 80%;
      margin: auto;
    }
    input, select {
      padding: 10px;
      margin: 10px;
      width: 250px;
    }
    table {
      margin-top: 20px;
      width: 100%;
      border-collapse: collapse;
    }
    table, th, td {
      border: 1px solid #ccc;
    }
    th {
      background-color: green;
      color: white;
      padding: 10px;
    }
    td {
      padding: 10px;
    }
    .available { color: green; }
    .unavailable { color: red; }
    .call-btn, .book-btn {
      padding: 6px 12px;
      border: none;
      border-radius: 10px;
      color: white;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
    }
    .call-btn {
      background-color: #007BFF;
    }
    .book-btn {
      background-color: #FFA500;
    }
    #search {
      margin-top: 10px;
      padding: 10px;
      width: 250px;
    }
    .submit-btn {
      background-color: #28a745;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      margin-top: 10px;
      transition: background-color 0.3s ease;
    }
    .submit-btn:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>

  <div class="container">
    <img src="Sohochorilogo.jpg" alt="Logo" width="100" />
    <h2>Hospital Phone Numbers</h2>

    <input type="text" id="patient_name" placeholder="Patient Name" />

    <input type="date" id="dob" onchange="calculateAge()" />
    <input type="number" id="age" placeholder="Age" readonly />
    <p id="show_age" style="font-weight:bold; color:#333;"></p>

    <select id="location">
      <option value="">Select Patient Location</option>
      <option value="Howrah">Howrah</option>
      <option value="Kolkata">Kolkata</option>
      <option value="Salt Lake">Salt Lake</option>
    </select>
    <br>

    <button class="submit-btn" onclick="savePatient()">Submit Patient Info</button>
    <br>

    <input type="text" id="search" placeholder="Search Hospital Name" onkeyup="filterHospitals()" />

    <table>
      <thead>
        <tr>
          <th>Hospital Name</th>
          <th>City</th>
          <th>Phone Number</th>
          <th>Ambulance Type</th>
          <th>Availability</th>
          <th>Call</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="hospitalTable">
        <tr>
          <td>Howrah Hospital</td>
          <td>Howrah</td>
          <td>9874083267</td>
          <td>Basic</td>
          <td class="available">Available</td>
          <td><a href="tel:9874083267" class="call-btn">Call</a></td>
          <td><button class="book-btn" onclick="bookAmbulance('Howrah Hospital', '9874083267', 'Basic')">Book Ambulance</button></td>
        </tr>
        <tr>
          <td>NRS Medical College</td>
          <td>Kolkata</td>
          <td>7583984874</td>
          <td>Advanced</td>
          <td class="unavailable">Unavailable</td>
          <td><a href="tel:7583984874" class="call-btn">Call</a></td>
          <td><button class="book-btn" onclick="bookAmbulance('NRS Medical College', '7583984874', 'Advanced')">Book Ambulance</button></td>
        </tr>
        <tr>
          <td>Calcutta Medical College</td>
          <td>Kolkata</td>
          <td>9330558870</td>
          <td>ICU</td>
          <td class="available">Available</td>
          <td><a href="tel:9330558870" class="call-btn">Call</a></td>
          <td><button class="book-btn" onclick="bookAmbulance('Calcutta Medical College', '9330558870', 'ICU')">Book Ambulance</button></td>
        </tr>
        <tr>
          <td>Sonarpur Ambulance Service</td>
          <td>Kolkata</td>
          <td>8017175441</td>
          <td>Basic</td>
          <td class="available">Available</td>
          <td><a href="tel:8017175441" class="call-btn">Call</a></td>
          <td><button class="book-btn" onclick="bookAmbulance('Sonarpur Ambulance Service', '8017175441', 'Basic')">Book Ambulance</button></td>
        </tr>
      </tbody>
    </table>
  </div>

  <script>
    let patientId = null;

    function calculateAge() {
      const dob = new Date(document.getElementById("dob").value);
      const today = new Date();

      let age = today.getFullYear() - dob.getFullYear();
      const m = today.getMonth() - dob.getMonth();

      if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
        age--;
      }

      document.getElementById("age").value = age;
      document.getElementById("show_age").innerText = age ? Calculated Age: ${age} : "";
    }

    function savePatient() {
      const name = document.getElementById("patient_name").value;
      const age = document.getElementById("age").value;
      const location = document.getElementById("location").value;

      if (!name || !age || !location) {
        alert("Please fill all patient details.");
        return;
      }

      const formData = new FormData();
      formData.append("name", name);
      formData.append("age", age);
      formData.append("location", location);
      formData.append("date", new Date().toISOString().split('T')[0]); // current date

      fetch("save_patient.php", {
        method: "POST",
        body: formData
      })
      .then(response => response.text())
      .then(data => {
        patientId = data;
        alert("Patient info saved!");
      })
      .catch(err => {
        console.error("Error:", err);
        alert("Failed to save patient.");
      });
    }

    function bookAmbulance(hospital, phone, type) {
      if (!patientId) {
        alert("Please submit patient details first.");
        return;
      }

      const formData = new FormData();
      formData.append("patient_id", patientId);
      formData.append("hospital_name", hospital);
      formData.append("phone_number", phone);
      formData.append("ambulance_type", type);

      fetch("book_ambulance.php", {
        method: "POST",
        body: formData
      })
      .then(response => response.text())
      .then(msg => {
        alert("Ambulance booked successfully!");
      })
      .catch(err => {
        console.error("Error:", err);
        alert("Booking failed.");
      });
    }

    function filterHospitals() {
      const input = document.getElementById("search").value.toLowerCase();
      const rows = document.querySelectorAll("#hospitalTable tr");

      rows.forEach(row => {
        const name = row.children[0].innerText.toLowerCase();
        row.style.display = name.includes(input) ? "" : "none";
      });
    }
  </script>
</body>
</html>