<?php
/**
 * Lab 07 Solution: Configuration Privacy 🔒
 * Objective: Access sensitive data WITHOUT hardcoding it in this file.
 */

require_once 'config.php';

// Access the secrets using getenv() OR $_ENV
$db_user = getenv('DB_USER');
$db_pass = getenv('DB_PASSWORD');
$api_key = $_ENV['API_KEY'];

echo "<style>
    body { font-family: sans-serif; background: #f1f5f9; padding: 50px; }
    .card { background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-left: 10px solid #10b981; max-width: 500px; }
    .secret { background: #fee2e2; color: #991b1b; padding: 2px 6px; border-radius: 4px; font-family: monospace; }
    .success-badge { color: #065f46; font-weight: bold; background: #d1fae5; padding: 10px; border-radius: 8px; margin-bottom: 20px; text-align: center; }
</style>";

echo "<div class='card'>";
echo "<h1>🔒 Lab 07: Privacy Active</h1>";
echo "<div class='success-badge'>No Passwords Hardcoded! ✅</div>";

echo "<p>Your application just connected to the database using variables read from a <strong>hidden .env file</strong>.</p>";

echo "<h3>🕵️ Exposed Values:</h3>";
echo "<ul>
        <li><strong>DB User:</strong> <span class='secret'>$db_user</span></li>
        <li><strong>DB Password:</strong> <span class='secret'>$db_pass</span></li>
        <li><strong>Extracted API Key:</strong> <span class='secret'>$api_key</span></li>
      </ul>";

echo "<p style='font-size: 0.9rem; color: #64748b;'><strong>Note:</strong> Check the source code of this <code>index.php</code>—you'll see that the actual password isn't anywhere in the code!</p>";
echo "</div>";
?>
