<?php
session_start();

if (!isset($_SESSION['account_id']) || $_SESSION['role'] !== 'admin') {
    http_response_code(403);
    exit;
}

require_once "db.php";

$action = $_POST['action'] ?? '';

if ($action === 'edit') {
    $id = (int)($_POST['id'] ?? 0);
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $role = $_POST['role'] ?? 'user';
    $password = $_POST['password'] ?? '';

    if ($password !== '') {
        $stmt = $conn->prepare("UPDATE accounts SET username=?, email=?, role=?, pass=? WHERE account_id=?");
        $stmt->bind_param("ssssi", $username, $email, $role, $password, $id);
    } else {
        $stmt = $conn->prepare("UPDATE accounts SET username=?, email=?, role=? WHERE account_id=?");
        $stmt->bind_param("sssi", $username, $email, $role, $id);
    }
    $stmt->execute();
    $stmt->close();

} elseif ($action === 'delete') {
    $id = (int)($_POST['id'] ?? 0);

    if ($id !== (int)$_SESSION['account_id']) {
        $stmt = $conn->prepare("DELETE FROM accounts WHERE account_id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}

$conn->close();