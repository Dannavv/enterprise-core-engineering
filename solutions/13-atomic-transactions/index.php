<?php
/**
 * Lab 13 Solution: Atomic Transactions 💎
 * Objective: All-or-Nothing Rule. No partial saves.
 */

// 1. Connection (Using a simple retry loop to wait for the database to "Wake Up")
$max_retries = 5;
$attempts = 0;
$db = null;

while ($attempts < $max_retries) {
    try {
        $db = new mysqli('db', 'root', 'root_password_777', 'bank_system');
        if (!$db->connect_error) break;
    } catch (Exception $e) { /* Wait and try again */ }
    
    $attempts++;
    sleep(2); // Wait 2 seconds between attempts
}

if (!$db || $db->connect_error) {
    die("<h1 style='color:red;'>❌ Database not ready yet! Please refresh in 5 seconds.</h1>");
}

$simulate_crash = isset($_GET['crash']);
$message = "";

// --- 🕵️ THE TRANSACTION LOGIC ---
try {
    // 1. BEGIN: Tell MySQL to start a "Private Buffer" for these changes.
    $db->begin_transaction();

    // 2. Step One: Remove $100 from Alice's account
    $db->query("UPDATE accounts SET balance = balance - 100 WHERE id = 1");

    // 3. --- MOCK FAILURE POINT ---
    if ($simulate_crash) {
        // We throw an exception to simulate a server crash or network failure.
        throw new Exception("CRASH! The server went down before the second update could happen.");
    }

    // 4. Step Two: Add $100 to Bob's account
    $db->query("UPDATE accounts SET balance = balance + 100 WHERE id = 2");

    // 5. COMMIT: If we reach here, both updates worked. Save them ALL forever.
    $db->commit();
    $message = "✅ SUCCESS: All updates were saved at once!";

} catch (Exception $e) {
    // 6. ROLLBACK: If ANY step above failed, undo EVERYTHING.
    // Alice's $100 is returned to her automatically!
    $db->rollback();
    $message = "<span style='color:red;'>🚫 ROLLBACK: Something went wrong. All changes were UNDONE. Reason: " . $e->getMessage() . "</span>";
}

// UI to show status
$res = $db->query("SELECT * FROM accounts");
$accounts = $res->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 13: Atomic Operations</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f8fafc; padding: 50px; display: flex; flex-direction: column; align-items: center; }
        .card { background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 500px; border-top: 6px solid #6366f1; text-align: center; }
        .account { padding: 15px; background: #f1f5f9; border-radius: 8px; margin: 10px 0; display: flex; justify-content: space-between; }
        .btn { background: #6366f1; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; text-decoration: none; display: inline-block; margin-top: 20px; font-weight: bold; }
        .danger { background: #ef4444; }
    </style>
</head>
<body>

    <div class="card">
        <h1>💎 Lab 13: Atomic Integrity</h1>
        <p>Transfer $100 from Alice to Bob.</p>

        <div style="font-weight: bold; margin-bottom: 20px;"><?php echo $message; ?></div>

        <div class="account">
            <span><?php echo $accounts[0]['name']; ?></span>
            <strong>$<?php echo $accounts[0]['balance']; ?></strong>
        </div>
        <div class="account">
            <span><?php echo $accounts[1]['name']; ?></span>
            <strong>$<?php echo $accounts[1]['balance']; ?></strong>
        </div>

        <a href="index.php" class="btn">Try Successful Transfer</a>
        <a href="index.php?crash=1" class="btn danger">Simulate Crash (Test Integrity)</a>
        
        <p style="font-size: 0.8rem; margin-top: 20px; color: #64748b;">
            When you click "Simulate Crash," the first $100 is removed via SQL—but because the script crashes, 
            MySQL automatically UNDOES that removal so the data stays "Symmetrical."
        </p>
    </div>

</body>
</html>
