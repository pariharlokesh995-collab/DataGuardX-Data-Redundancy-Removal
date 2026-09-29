<?php

require_once "db_connect.php";

// DataGuardX - Advanced Data Redundancy Removal System

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}

$name  = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");
$phone = trim($_POST["phone"] ?? "");

// Validation
if ($name === "" || $email === "" || $phone === "") {
    header("Location: index.php?status=missing");
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: index.php?status=invalid_email");
    exit();
}

// Normalize
$email = strtolower($email);
$phone = preg_replace("/[^0-9+]/", "", $phone);

// ==========================================
// DUPLICATE CHECK
// ==========================================

$sql = "SELECT id FROM users
        WHERE email = ? OR phone = ?
        LIMIT 1";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    header("Location: index.php?status=error");
    exit();
}

$stmt->bind_param("ss", $email, $phone);
$stmt->execute();
$stmt->store_result();

$duplicate = ($stmt->num_rows > 0);

$stmt->close();

// ==========================================
// DUPLICATE FOUND
// ==========================================

if ($duplicate) {

    $log = $conn->prepare(
        "INSERT INTO duplicate_log (name, email, phone)
         VALUES (?, ?, ?)"
    );

    if ($log) {
        $log->bind_param("sss", $name, $email, $phone);
        $log->execute();
        $log->close();
    }

    $conn->close();

    header("Location: index.php?status=duplicate");
    exit();
}

// ==========================================
// UNIQUE DATA
// ==========================================

$insert = $conn->prepare(
    "INSERT INTO users (name, email, phone)
     VALUES (?, ?, ?)"
);

if (!$insert) {
    header("Location: index.php?status=error");
    exit();
}

$insert->bind_param("sss", $name, $email, $phone);

if ($insert->execute()) {

    $insert->close();
    $conn->close();

    header("Location: index.php?status=unique");
    exit();

} else {

    $insert->close();
    $conn->close();

    header("Location: index.php?status=error");
    exit();
}

?>