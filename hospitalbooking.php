<?php
$people = [
    ["name" => "Moumita Jana", "place" => "Saltlake", "age" => 19, "phone" => "900-793-4106", "blood" => "B+", "type" => "Donor"],
    ["name" => "Rajiv Roy", "place" => "Sonarpur", "age" => 20, "phone" => "891-032-4994", "blood" => "A+", "type" => "Donor"],
    ["name" => "Riya Saha", "place" => "Dumdum", "age" => 25, "phone" => "704-465-8072", "blood" => "B+", "type" => "Receiver"],
    ["name" => "Raj Das", "place" => "Saltlake", "age" => 21, "phone" => "798-086-7795", "blood" => "AB+", "type" => "Donor"],
    ["name" => "Titly Saha", "place" => "Bally Halt", "age" => 20, "phone" => "933-050-2457", "blood" => "A+", "type" => "Receiver"],
    ["name" => "Probir Mondal", "place" => "Sonarpur", "age" => 20, "phone" => "700-362-4516", "blood" => "A+", "type" => "Receiver"],
    ["name" => "Rajdeep Roy", "place" => "Ultadanga", "age" => 21, "phone" => "801-722-4163", "blood" => "B-", "type" => "Donor"],
    ["name" => "Swgata Dutta", "place" => "Paikpara", "age" => 26, "phone" => "798-032-4268", "blood" => "B+", "type" => "Receiver"],
    ["name" => "Swastika Ghosh", "place" => "Howrah", "age" => 28, "phone" => "629-114-6937", "blood" => "A+", "type" => "Receiver"],
    ["name" => "Akash Sardar", "place" => "Rubi", "age" => 36, "phone" => "912-302-5686", "blood" => "O+", "type" => "Donor"],
    ["name" => "Sayan Roy", "place" => "Phool Bagan", "age" => 45, "phone" => "698-586-4896", "blood" => "B+", "type" => "Receiver"],
    ["name" => "Sujata Mahanto", "place" => "Sector 5", "age" => 33, "phone" => "653-864-4966", "blood" => "A-", "type" => "Donor"],
    ["name" => "Biswojit Halder", "place" => "Chingrighata", "age" => 38, "phone" => "678-901-2345", "blood" => "AB+", "type" => "Donor"],
    ["name" => "Misty Halder", "place" => "Karunamoyee", "age" => 40, "phone" => "890-123-4567", "blood" => "O-", "type" => "Receiver"],
    ["name" => "Piu Halder", "place" => "New Alipur", "age" => 19, "phone" => "901-234-5678", "blood" => "B-", "type" => "Donor"],
    ["name" => "Liston Colaco", "place" => "Hyatt", "age" => 30, "phone" => "634-567-8901", "blood" => "A+", "type" => "Receiver"],
    ["name" => "Dipankar Pal", "place" => "Jadhavpur", "age" => 37, "phone" => "877-774-561", "blood" => "A+", "type" => "Donor"],
    ["name" => "Prarana Das", "place" => "Kestopur", "age" => 32, "phone" => "756-789-0123", "blood" => "AB-", "type" => "Donor"],
    ["name" => "Anwesha Pal", "place" => "Budge Budge", "age" => 24, "phone" => "967-890-1234", "blood" => "B+", "type" => "Receiver"],
    ["name" => "Pritam Das", "place" => "Newtown", "age" => 22, "phone" => "678-901-2345", "blood" => "O-", "type" => "Donor"],
    ["name" => "Barsha Kar", "place" => "BeleGhata", "age" => 29, "phone" => "789-012-3456", "blood" => "A-", "type" => "Receiver"],
    ["name" => "Pulak Sarkar", "place" => "Metropolitn", "age" => 43, "phone" => "890-123-4567", "blood" => "AB+", "type" => "Donor"],
    ["name" => "Pallabi Sharma", "place" => "Park circus", "age" => 27, "phone" => "901-234-5678", "blood" => "B-", "type" => "Receiver"],
    ["name" => "Kunal Mondal", "place" => "Bengal Chemical", "age" => 39, "phone" => "823-345-6789", "blood" => "O+", "type" => "Receiver"],
    ["name" => "Sumit Halder", "place" => "Suvas Gram", "age" => 37, "phone" => "634-456-7890", "blood" => "A+", "type" => "Donor"]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blood Donation Records</title>
    <style>
        body {
            background-color: #fff8dc;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            padding: 20px;
        }
        .header img {
            max-height: 100px;
        }
        h2 {
            text-align: center;
            color: #b30000;
        }
        .filters {
            text-align: center;
            margin: 10px;
            flex-wrap: wrap;
        }
        input, select {
            padding: 8px;
            margin: 5px;
        }
        table {
            width: 95%;
            margin: auto;
            border-collapse: collapse;
            background-color: #fff;
        }
        th, td {
            border: 1px solid #444;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f44336;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #fdd;
        }
        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }
            th {
                display: none;
            }
            td {
                position: relative;
                padding-left: 50%;
                border: 1px solid #ccc;
                margin-bottom: 10px;
            }
            td:before {
                position: absolute;
                left: 10px;
                width: 45%;
                white-space: nowrap;
                font-weight: bold;
            }
            td:nth-of-type(1):before { content: "Name"; }
            td:nth-of-type(2):before { content: "Place"; }
            td:nth-of-type(3):before { content: "Age"; }
            td:nth-of-type(4):before { content: "Phone"; }
            td:nth-of-type(5):before { content: "Blood Group"; }
            td:nth-of-type(6):before { content: "Type"; }
        }
    </style>
</head>
<body>

<div class="header">
    <img src="logo.jpg" alt="Sohochori Logo">
</div>

<h2>Blood Donation Records</h2>

<div class="filters">
    <input type="text" id="search" placeholder="Search by name or place">
    <select id="bloodGroup">
        <option value="">All Blood Groups</option>
        <option value="A+">A+</option><option value="A-">A-</option>
        <option value="B+">B+</option><option value="B-">B-</option>
        <option value="AB+">AB+</option><option value="AB-">AB-</option>
        <option value="O+">O+</option><option value="O-">O-</option>
    </select>
    <select id="type">
        <option value="">All Types</option>
        <option value="Donor">Donor</option>
        <option value="Receiver">Receiver</option>
    </select>
</div>

<table id="donorTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Place</th>
            <th>Age</th>
            <th>Phone Number</th>
            <th>Blood Group</th>
            <th>Type</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($people as $person): ?>
        <tr>
            <td><?= htmlspecialchars($person['name']) ?></td>
            <td><?= htmlspecialchars($person['place']) ?></td>
            <td><?= $person['age'] ?></td>
            <td>
                <a href="tel:<?= htmlspecialchars($person['phone']) ?>" style="text-decoration:none;color:#000;">
                    📞 <?= htmlspecialchars($person['phone']) ?>
                </a>
            </td>
            <td><?= htmlspecialchars($person['blood']) ?></td>
            <td><?= htmlspecialchars($person['type']) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<script>
    const search = document.getElementById("search");
    const bloodGroup = document.getElementById("bloodGroup");
    const type = document.getElementById("type");
    const table = document.getElementById("donorTable");

    function filterTable() {
        const rows = table.getElementsByTagName("tr");
        const searchVal = search.value.toLowerCase();
        const bloodVal = bloodGroup.value;
        const typeVal = type.value;

        for (let i = 1; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName("td");
            if (cells.length < 6) continue;

            const name = cells[0].textContent.toLowerCase();
            const place = cells[1].textContent.toLowerCase();
            const blood = cells[4].textContent;
            const donorType = cells[5].textContent;

            const matchesSearch = name.includes(searchVal) || place.includes(searchVal);
            const matchesBlood = !bloodVal || blood === bloodVal;
            const matchesType = !typeVal || donorType === typeVal;

            rows[i].style.display = matchesSearch && matchesBlood && matchesType ? "" : "none";
        }
    }

    search.addEventListener("input", filterTable);
    bloodGroup.addEventListener("change", filterTable);
    type.addEventListener("change", filterTable);
</script>

</body>
</html>