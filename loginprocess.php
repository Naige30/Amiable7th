<?php
session_start();
require_once "db.php";

$identifier = trim($_POST["identifier"] ?? "");
$password = $_POST["password"] ?? "";
$redirect = $_POST["redirect"] ?? "";

if ($identifier === "" || $password === "") {
    $statusMessage = "Please enter your username/email and password.";
    $conn->close();
    header("Location: login.php?status=" . urlencode($statusMessage));
    exit;
}

$stmt = $conn->prepare("SELECT account_id, username, pass, role FROM accounts WHERE username = ? OR email = ?");
$stmt->bind_param("ss", $identifier, $identifier);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $account = $result->fetch_assoc();

    // if (password_verify($password, $account['pass'])) {  // gamitin pag mag hash na ng pass
    if ($password === $account['pass']) {
        $_SESSION['account_id'] = $account['account_id'];
        $_SESSION['username'] = $account['username'];
        $_SESSION['role'] = $account['role'];

        $stmt->close();
        $conn->close();

        if ($redirect !== "") {
            header("Location: " . $redirect);
        } elseif ($account['role'] === 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: index.php");
        }
        exit;
    } else {
        $statusMessage = "Incorrect username/email or password.";
    }
} else {
    $statusMessage = "Incorrect username/email or password.";
}

$stmt->close();
$conn->close();
header("Location: login.php?status=" . urlencode($statusMessage));
exit;