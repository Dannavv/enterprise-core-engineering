<?php
/**
 * Lab 03 Solution: Secure Session Implementation 🛡️
 * Objective: Protect the user identity from Session Hijacking and XSS.
 */

// 1. OBFUSCATION: Change the default 'PHPSESSID' to something custom
session_name('ERP_SECURE_ID');

// 2. LOCKDOWN: Set secure cookie parameters BEFORE starting the session
session_set_cookie_params([
    'lifetime' => 0,             // Session dies when browser closes
    'path'     => '/',
    'domain'   => '',
    'secure'   => false,          // Should be true in production (HTTPS only)
    'httponly' => true,           // ✅ Stops JavaScript from stealing the cookie
    'samesite' => 'Strict'       // ✅ Stops CSRF attacks
]);

// Start the secure session
session_start();

// 3. FINGERPRINTING: Track the browser identity
$current_agent = $_SERVER['HTTP_USER_AGENT'];

if (!isset($_SESSION['user_fingerprint'])) {
    // First time login: Record the browser identity
    $_SESSION['user_fingerprint'] = $current_agent;
    $_SESSION['login_time'] = date('Y-m-d H:i:s');
} else {
    // Returning user: VALIDATE fingerprint
    if ($_SESSION['user_fingerprint'] !== $current_agent) {
        // 🚨 ALERT: This might be a session hijacking attempt!
        session_destroy();
        die("<h1 style='color:red;'>⚠️ SECURITY ALERT: Session Tampered!</h1>
             <p>Your browser identity has changed. Access denied.</p>");
    }
}

// UI for the Lab
echo "<style>
    body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f0f4f8; padding: 50px; }
    .card { background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-top: 8px solid #6c5ce7; }
    .badge { background: #6c5ce7; color: white; padding: 4px 12px; border-radius: 15px; font-size: 0.8rem; margin-top: 10px; display: inline-block; }
    code { background: #eee; padding: 2px 6px; border-radius: 4px; }
</style>";

echo "<div class='card'>";
echo "<h1>🔒 Lab 03: Secure Identity Active</h1>";
echo "<p>Your session name is now: <code>" . session_name() . "</code></p>";
echo "<div class='badge'>HttpOnly: ENABLED</div> ";
echo "<div class='badge'>SameSite: STRICT</div>";

echo "<h3>🕵️ Fingerprint Details</h3>";
echo "<ul>
        <li><strong>Original Agent:</strong> <code>" . $_SESSION['user_fingerprint'] . "</code></li>
        <li><strong>Login Time:</strong> " . $_SESSION['login_time'] . "</li>
      </ul>";

echo "<hr><p><strong>Verify in DevTools:</strong> Press F12 -> Application/Storage -> Cookies. Look for <code>ERP_SECURE_ID</code> and ensure the <strong>HttpOnly</strong> checkbox is ticked.</p>";
echo "</div>";
?>
