<?php
/**
 * Lab 04 Solution: The Query Gateway 🛡️
 * Objective: Stop SQL Injection by separating logic from user input.
 */

// 1. Connection (Using a simple retry loop to wait for the database to "Wake Up")
$max_retries = 5;
$attempts = 0;
$db = null;

while ($attempts < $max_retries) {
    try {
        $db = new mysqli('db', 'root', 'root_password_101', 'gateway_db');
        if (!$db->connect_error) break;
    } catch (Exception $e) { /* Wait and try again */ }
    
    $attempts++;
    sleep(2); // Wait 2 seconds between attempts
}

if (!$db || $db->connect_error) {
    die("<h1 style='color:red;'>❌ Database not ready yet! Please refresh in 5 seconds.</h1>");
}

/**
 * 🛠️ THE TASK: The Query Gateway Wrapper
 * This function handles all preparation and binding automatically.
 */
function executeQuery($db, $sql, $params = []) {
    $stmt = $db->prepare($sql);
    
    if (!$stmt) {
        throw new Exception("Prepare failed: " . $db->error);
    }

    if (!empty($params)) {
        // Detect types automatically (s=string, i=integer, d=double, b=blob)
        $types = "";
        foreach ($params as $param) {
            if (is_int($param)) $types .= "i";
            elseif (is_double($param)) $types .= "d";
            else $types .= "s";
        }
        
        // Use the spread operator (...) to bind all parameters
        $stmt->bind_param($types, ...$params);
    }

    $stmt->execute();
    return $stmt->get_result();
}

/**
 * 🕵️ THE TEST: Simulating a SQL Injection Attack
 * Input: An attempt to bypass login using ' OR '1'='1
 */
$attack_username = "' OR '1'='1"; // Malicious input
$attack_password = "' OR '1'='1"; // Malicious input

// --- EXPERIMENT 1: THE DANGEROUS WAY ---
// This is how modern sites are hacked. The variable goes directly into the string.
$dangerous_query = "SELECT * FROM admin_users WHERE username = '$attack_username' AND password = '$attack_password'";

// --- EXPERIMENT 2: THE SECURE WAY ---
// We use the Gateway. We use '?' as placeholders.
$secure_sql = "SELECT * FROM admin_users WHERE username = ? AND password = ?";
$secure_params = [$attack_username, $attack_password];

// UI to show results
echo "<style>
    body { font-family: sans-serif; background: #fdfefe; padding: 40px; }
    .box { padding: 20px; border-radius: 8px; margin-bottom: 25px; border-left: 10px solid; }
    .danger { background: #fde8e8; border-color: #ef4444; color: #991b1b; }
    .safe { background: #ecfdf5; border-color: #10b981; color: #065f46; }
    code { background: #000; color: #0f0; padding: 4px; border-radius: 4px; display: block; margin: 10px 0; }
</style>";

echo "<h1>🛡️ Lab 04: The Query Gateway</h1>";

// Test Result 1: Dangerous
echo "<div class='box danger'>
        <h2>❌ Experiment 1: Raw (Dangerous) Query</h2>
        <p>The hacker used: <code>$attack_username</code></p>
        <p>The resulting SQL: <code>$dangerous_query</code></p>";

$res = $db->query($dangerous_query);
if ($res && $res->num_rows > 0) {
    echo "<strong>🚨 STATUS: HACKED!</strong> The system found a user and granted access.";
}
echo "</div>";

// Test Result 2: Secure
echo "<div class='box safe'>
        <h2>✅ Experiment 2: Prepared (Secure) Gateway</h2>
        <p>The placeholder SQL: <code>$secure_sql</code></p>";

try {
    $res = executeQuery($db, $secure_sql, $secure_params);
    if ($res->num_rows === 0) {
        echo "<strong>🌟 STATUS: SECURE!</strong> The system saw the hacker input as a literal 'string' and found zero matches.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
echo "</div>";
?>
