<?php
/**
 * Lab 12 Solution: One-Way Password Hashing 🔐
 */

// --- 🕵️ STEP 1: REGISTRATION (THE HASHING) ---
$user_password = "MySuperSecret123";

// We use PASSWORD_BCRYPT, which automatically generates a 'SALT'
// and performs dozens of 'COST' rounds to make it slow for hackers but fast for us.
$hashed_password = password_hash($user_password, PASSWORD_BCRYPT);

// --- 🕵️ STEP 2: LOGIN (THE VERIFICATION) ---
$correct_attempt = "MySuperSecret123";
$wrong_attempt   = "WrongPassword456";

$is_correct = password_verify($correct_attempt, $hashed_password);
$is_wrong   = password_verify($wrong_attempt, $hashed_password);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 12: Secure Hashing</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f8fafc; padding: 50px; display: flex; flex-direction: column; align-items: center; }
        .card { background: white; padding: 2.5rem; border-radius: 16px; box-shadow: 0 10px 15px rgba(0,0,0,0.1); width: 600px; border-left: 10px solid #6366f1; }
        .hash-box { background: #1e293b; color: #38bdf8; padding: 15px; border-radius: 8px; font-family: monospace; word-break: break-all; margin: 15px 0; }
        .result { padding: 10px 15px; border-radius: 6px; font-weight: bold; margin-top: 10px; }
        .success { background: #dcfce7; color: #166534; }
        .error { background: #fee2e2; color: #991b1b; }
        h3 { margin-bottom: 5px; color: #334155; }
    </style>
</head>
<body>

    <div class="card">
        <h1>🔐 Lab 12: Secure Password Hashing</h1>
        <p>This lab demonstrates how to store passwords safely using <strong>Bcrypt</strong>.</p>

        <h3>1️⃣ The Plain Text (Input):</h3>
        <code><?php echo $user_password; ?></code>

        <h3>2️⃣ The Bcrypt Hash (Database Salted String):</h3>
        <div class="hash-box">
            <?php echo $hashed_password; ?>
        </div>
        <p style="font-size: 0.85rem; color: #64748b;">Notice the prefix <code>$2y$10$</code>—this tells PHP that Bcrypt with "cost" 10 was used.</p>

        <hr style="margin: 20px 0; border: 0; border-top: 1px solid #e2e8f0;">

        <h3>3️⃣ Testing Login Attempt (Match):</h3>
        <p>Input: <code>"<?php echo $correct_attempt; ?>"</code></p>
        <div class="result <?php echo $is_correct ? 'success' : 'error'; ?>">
            <?php echo $is_correct ? '✅ PASSED: Password Verified!' : '❌ FAILED: Wrong Password'; ?>
        </div>

        <h3>4️⃣ Testing Login Attempt (Mismatch):</h3>
        <p>Input: <code>"<?php echo $wrong_attempt; ?>"</code></p>
        <div class="result <?php echo $is_wrong ? 'success' : 'error'; ?>">
            <?php echo $is_wrong ? '✅ PASSED: Password Verified!' : '❌ FAILED: Access Denied'; ?>
        </div>
    </div>

</body>
</html>
