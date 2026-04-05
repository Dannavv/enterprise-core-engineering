<?php
/**
 * Lab 08 Solution: Activity Monitoring 📊
 */

require_once 'logger.php';

// --- 🕵️ STEP 1: LOG THE INITIAL PAGE VISIT ---
log_activity("Page loaded: User is viewing the Dashboard.");

// --- 🕵️ STEP 2: SIMULATE A RANDOM ACTION ---
$actions = ['Profile Update', 'Report Generated', 'Settings Changed', 'Failed Password Attempt'];
$simulated_action = $actions[array_rand($actions)];

if ($simulated_action === 'Failed Password Attempt') {
    log_activity("SECURITY ALERT: Brute-force attempt? Action: $simulated_action", "WARNING");
} else {
    log_activity("Action performed: $simulated_action", "INFO");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 08: Monitoring System</title>
    <style>
        body { font-family: 'Courier New', Courier, monospace; background: #0f172a; color: #38bdf8; padding: 50px; }
        .monitor { background: #1e293b; padding: 30px; border-radius: 12px; border: 1px solid #334155; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1); }
        .log-box { background: #000; color: #4ade80; padding: 20px; border-radius: 8px; height: 300px; overflow-y: auto; font-size: 0.9rem; }
        .btn { background: #38bdf8; color: #0f172a; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-weight: bold; margin-bottom: 20px; text-decoration: none; display: inline-block; }
        .btn:hover { background: #7dd3fc; }
    </style>
</head>
<body>

    <div class="monitor">
        <h1>📊 ERP Activity Monitor</h1>
        <p>Every time you refresh this page, your activity is being tracked in the <code>audit.log</code> file.</p>
        
        <a href="" class="btn">Refresh to Log New Activity</a>

        <h3>🗄️ Real-time Logs (audit.log content):</h3>
        <div class="log-box">
            <pre><?php 
                $file = __DIR__ . '/logs/audit.log';
                if (file_exists($file)) {
                    // Read and reverse the logs to show latest on top
                    $lines = array_reverse(file($file));
                    echo implode("", $lines);
                } else {
                    echo "Waiting for first activity...";
                }
            ?></pre>
        </div>
    </div>

</body>
</html>
