<?php
session_start();
require_once 'includes/shihab_db_connect.php';
require_once 'includes/shihab_security.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // CSRF Protection
    if (!sshihabb007_validate_csrf($_POST['csrf_token'] ?? '')) {
        die("Invalid CSRF Token.");
    }

    global $shihab_pdo;
    $action = $_POST['action'] ?? '';

    if ($action === 'login') {
        $username = shihab_sanitize($_POST['username']);
        $password = $_POST['password'];

        $stmt = $shihab_pdo->prepare("SELECT * FROM sshihabb007_users WHERE name = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['sshihabb007_user_id'] = $user['id'];
            $_SESSION['sshihabb007_username'] = $user['name'];
            $_SESSION['sshihabb007_role'] = $user['role'];
            header("Location: profile.php");
            exit();
        } else {
            $_SESSION['auth_error'] = "Invalid credentials. Unauthorized access detected.";
            header("Location: profile.php");
            exit();
        }
    } elseif ($action === 'register') {
        $username = shihab_sanitize($_POST['username']);
        $email = shihab_sanitize($_POST['email']);
        $password = $_POST['password'];

        // Check if user exists
        $check = $shihab_pdo->prepare("SELECT id FROM sshihabb007_users WHERE name = ? OR email = ?");
        $check->execute([$username, $email]);
        if ($check->rowCount() > 0) {
            $_SESSION['auth_error'] = "Identity already exists in the system.";
            header("Location: profile.php");
            exit();
        }

        $hash = mehedi_hash_password($password);
        $role = 'user';

        $stmt = $shihab_pdo->prepare("INSERT INTO sshihabb007_users (name, email, password, role) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$username, $email, $hash, $role])) {
            // Auto login
            $_SESSION['sshihabb007_user_id'] = $shihab_pdo->lastInsertId();
            $_SESSION['sshihabb007_username'] = $username;
            $_SESSION['sshihabb007_role'] = $role;
            header("Location: profile.php");
            exit();
        } else {
            $_SESSION['auth_error'] = "System failure during registration.";
            header("Location: profile.php");
            exit();
        }
    } elseif ($action === 'logout') {
        session_destroy();
        header("Location: profile.php");
        exit();
    }
}
?>
