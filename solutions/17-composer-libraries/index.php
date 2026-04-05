<?php
/**
 * Lab 17 Solution: External Libraries (Composer) 🎼
 */

// 1. THE AUTOLOADER: This magical file loads ALL your libraries at once!
require_once 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// 2. INITIALIZE MONOLOG: A professional-grade logging library
$log = new Logger('erp_system');
$log->pushHandler(new StreamHandler(__DIR__ . '/logs/app.log', Logger::DEBUG));

// 3. THE TEST: Send a professional log message
$log->info('User "Arpit" has logged in from Kali Linux.', ['ip' => '127.0.0.1']);
$log->warning('Security Warning: Unusual login time detected.');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 17: External Libraries</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f8fafc; padding: 50px; display: flex; flex-direction: column; align-items: center; }
        .card { background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 600px; border-top: 8px solid #a855f7; }
        .log-display { background: #1e293b; color: #a5f3fc; padding: 20px; border-radius: 8px; font-family: monospace; font-size: 0.85rem; margin-top: 20px; }
        .btn { background: #a855f7; color: white; padding: 10px 20px; border-radius: 6px; font-weight: bold; text-decoration: none; display: inline-block; }
    </style>
</head>
<body>

    <div class="card">
        <h1>🎼 Lab 17: Composer & Monolog</h1>
        <p>This lab demonstrates how to use the <strong>Monolog</strong> library instead of writing your own logging logic from scratch.</p>

        <a href="index.php" class="btn">Trigger New Log Entry</a>

        <h3>📁 logs/app.log contents:</h3>
        <div class="log-display">
            <pre><?php 
                $file = __DIR__ . '/logs/app.log';
                if (file_exists($file)) {
                    $lines = array_reverse(file($file));
                    echo htmlspecialchars(implode("", $lines));
                } else {
                    echo "Waiting for first log entry...";
                }
            ?></pre>
        </div>
        
        <p style="font-size: 0.8rem; margin-top: 15px; color: #64748b;">
            Notice the professional format! Monolog automatically adds timestamps, log levels (INFO/WARNING), and structured data fields.
        </p>
    </div>

</body>
</html>
