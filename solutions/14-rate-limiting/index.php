<?php
/**
 * Lab 14 Solution: Rate Limiting Demo 🚦
 */

require_once 'throttler.php';

// --- 🛠️ DB CONNECTION (Wait & Retry) ---
$max_retries = 5; $attempts = 0; $db = null;
while ($attempts < $max_retries) {
    try {
        $db = new mysqli('db', 'root', 'root_password_999', 'security_db');
        if (!$db->connect_error) break;
    } catch (Exception $e) {}
    $attempts++; sleep(2);
}

if (!$db || $db->connect_error) die("Database connection failed.");

// --- 🛠️ RESET DB FOR CLEAN TEST ---
if (isset($_GET['reset'])) {
    $db->query("TRUNCATE rate_limits");
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 14: Rate Limiter</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f1f5f9; padding: 50px; display: flex; flex-direction: column; align-items: center; }
        .card { background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 650px; border-top: 8px solid #f97316; }
        .log-item { display: flex; justify-content: space-between; padding: 10px; border-bottom: 1px solid #e2e8f0; font-size: 0.9rem; }
        .pass { color: #166534; font-weight: bold; }
        .block { color: #991b1b; font-weight: bold; background: #fee2e2; padding: 2px 5px; border-radius: 4px; }
        .btn { background: #f97316; color: white; padding: 10px 20px; text-decoration: none; border-radius: 6px; font-weight: bold; display: inline-block; margin-bottom: 20px; }
    </style>
</head>
<body>

    <div class="card">
        <h1>🚦 Lab 14: Brute-Force Throttler</h1>
        <p>In this lab, we test what happens when someone tries to call a page 10 times in 1 second.</p>
        <p><strong>Limit:</strong> 5 Requests per 60 Seconds.</p>

        <a href="index.php?reset=1" class="btn" style="background: #64748b;">Clear Logs & Restart Test</a>

        <div style="border: 1px solid #e2e8f0; border-radius: 8px; overflow: hidden; margin-top: 10px;">
            <div style="background: #f8fafc; padding: 10px; font-weight: bold; border-bottom: 1px solid #e2e8f0;">Sequential Login Attempts:</div>
            
            <?php 
            for ($i = 1; $i <= 10; $i++): 
                // We call the throttler 10 times in a row!
                $check = check_rate_limit($db, "student_101", 5, 20); // 5 hits per 20s for demo
            ?>
                <div class="log-item">
                    <span>Attempt #<?php echo $i; ?></span>
                    <span>Hits: [<?php echo $check['count']; ?> / 5]</span>
                    <?php if ($check['limited']): ?>
                        <span class="block">🚫 RATE LIMITED! Wait 20s.</span>
                    <?php else: ?>
                        <span class="pass">✅ PASSED</span>
                    <?php endif; ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>

</body>
</html>
