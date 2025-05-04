<?php
session_start();
header('Content-Type: application/json');

// 1) get & sanitize input
$username = trim($_POST['username'] ?? '');
if ($username === '') {
    echo json_encode(['success'=>false,'message'=>'Please enter an email or phone number.']);
    exit;
}

// 2) connect
$conn = new mysqli("localhost","root","","sohochori");
if ($conn->connect_error) {
    echo json_encode(['success'=>false,'message'=>'Database connection failed.']);
    exit;
}

// 3) check if this email/phone already exists
$sql = "SELECT COUNT(*) AS cnt FROM users WHERE email_or_phone = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s",$username);
$stmt->execute();
$stmt->bind_result($cnt);
$stmt->fetch();
$stmt->close();

// 4) if exists, return error → front-end will show red text and NOT activate link
if ($cnt > 0) {
    echo json_encode([
      'success' => false,
      'message' => 'Email or phone number already in use.'
    ]);
    exit;
}

// 5) else (new) → insert, set session, return success
$ins = $conn->prepare("INSERT INTO users (email_or_phone) VALUES (?)");
$ins->bind_param("s",$username);
if (! $ins->execute()) {
    echo json_encode(['success'=>false,'message'=>'Insert failed: '.$conn->error]);
    exit;
}
$ins->close();
$conn->close();

// store in session so welcome.php can use it
$_SESSION['username'] = $username;

echo json_encode([
  'success' => true,
  'message' => 'Login successful.'
]);
