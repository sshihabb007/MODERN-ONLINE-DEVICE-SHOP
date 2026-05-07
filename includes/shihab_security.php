<?php
/**
 * Sanitize data for XSS protection
 */
function shihab_sanitize($data) {
    if (is_array($data)) {
        foreach ($data as $key => $value) {
            $data[$key] = shihab_sanitize($value);
        }
        return $data;
    }
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

/**
 * Hash password securely using Argon2id
 */
function mehedi_hash_password($password) {
    return password_hash($password, PASSWORD_ARGON2ID);
}

/**
 * Generate CSRF Token
 */
function sshihabb007_generate_csrf() {
    if (empty($_SESSION['sshihabb007_csrf_token'])) {
        $_SESSION['sshihabb007_csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['sshihabb007_csrf_token'];
}

/**
 * Validate CSRF Token
 */
function sshihabb007_validate_csrf($token) {
    if (isset($_SESSION['sshihabb007_csrf_token']) && hash_equals($_SESSION['sshihabb007_csrf_token'], $token)) {
        return true;
    }
    return false;
}
?>
