<?php
/**
 * Lab 05 Solution: CSRF & CSP Security 🛡️
 * Objective: Prevent "Cross-Site" attacks using Tokens and Strict Headers.
 */

session_start();

// --- 🛡️ PART 1: CONTENT SECURITY POLICY (CSP) ---
// This tells the browser: "Only trust scripts from this server ('self')."
header("Content-Security-Policy: default-src 'self'; script-src 'self'; style-src 'self' 'unsafe-inline';");

/**
 * --- 🛡️ PART 2: CSRF TOKEN LOGIC ---
 * Generate a unique secret key for this user's session.
 */
function get_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Check for form submission
$message = "";
$status_class = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // VALIDATION: Does the token from the form match the one in the session?
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        // 🚨 ATTACK DETECTED or Session Expired!
        $message = "❌ SECURITY ERROR: CSRF Token Mismatch! Request Blocked.";
        $status_class = "error";
    } else {
        // ✅ SUCCESS
        $new_email = htmlspecialchars($_POST['email']);
        $message = "✅ SUCCESS: Your profile has been updated to: $new_email";
        $status_class = "success";
        
        // Best practice: Rotate the token after a successful POST
        unset($_SESSION['csrf_token']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 05: CSRF & CSP Defense</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f8fafc; padding: 50px; display: flex; flex-direction: column; align-items: center; }
        .card { background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); width: 400px; border-top: 6px solid #3b82f6; }
        .status { padding: 15px; border-radius: 6px; margin-bottom: 20px; font-weight: bold; }
        .success { background: #dcfce7; color: #166534; }
        .error { background: #fee2e2; color: #991b1b; }
        input[type="email"] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { background: #3b82f6; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; width: 100%; font-size: 1rem; }
        button:hover { background: #2563eb; }
        .info { font-size: 0.85rem; color: #64748b; margin-top: 20px; border-top: 1px solid #e2e8f0; padding-top: 15px; }
    </style>
</head>
<body>

    <div class="card">
        <h1>🛡️ Profile Update</h1>
        <p>Update your ERP contact email below.</p>

        <?php if ($message): ?>
            <div class="status <?php echo $status_class; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <!-- THE SECRET KEY: This stops a hacker from submitting this form for you! -->
            <input type="hidden" name="csrf_token" value="<?php echo get_csrf_token(); ?>">

            <label for="email">New Email Address:</label>
            <input type="email" name="email" id="email" placeholder="student@university.edu" required>
            
            <button type="submit">Save Changes</button>
        </form>

        <div class="info">
            <strong>Security Fact:</strong> If a hacker tries to submit this form from <code>evil-site.com</code>, they won't know your secret <code>csrf_token</code>, and the request will be rejected.
        </div>
    </div>

    <!-- 🔍 CSP TEST: Try to run an external script -->
    <!-- This script will be BLOCKED by the browser because it's not from 'self' -->
    <script src="https://evil-hacker.com/malicious.js"></script>

</body>
</html>
