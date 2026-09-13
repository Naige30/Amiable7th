<?php
require_once "db.php";

$username = trim($_POST["username"] ?? "");
$email = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";
$confirmPassword = $_POST["confirm_password"] ?? "";

if ($username === "" || $email === "" || $password === "" || $confirmPassword === "") {
    $statusMessage = "Please complete all fields.";
} elseif ($password !== $confirmPassword) {
    $statusMessage = "Passwords do not match.";
} elseif (strlen($password) < 6) {
    $statusMessage = "Password must be at least 6 characters.";
} else {
    // Check if username or email already exists
    $checkStmt = $conn->prepare("SELECT account_id FROM accounts WHERE username = ? OR email = ?");
    $checkStmt->bind_param("ss", $username, $email);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        $statusMessage = "Username or email already taken.";
    } else {
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $storedPassword = $password; //plain palang pag ito

        $stmt = $conn->prepare("INSERT INTO accounts (username, email, pass) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $storedPassword);

        if ($stmt->execute()) {
            $statusMessage = "Account created! You can now log in.";
        } else {
            $statusMessage = "ERROR: " . $stmt->error;
        }
        $stmt->close();
    }
    $checkStmt->close();
}

$conn->close();
header("Location: signup.php?status=" . urlencode($statusMessage));
exit;