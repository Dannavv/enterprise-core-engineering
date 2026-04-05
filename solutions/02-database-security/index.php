<?php
// Lab 02 Solution: Verifying the Principle of Least Privilege 🛡️

// 1. Configuration (Using our NEW limited user)
$host = 'db';
$db   = 'university_records';
$user = 'app_student_profile';
$pass = 'student_secure_pass_456';

echo "<style>
    body { font-family: sans-serif; background: #eef2f3; padding: 40px; line-height: 1.6; }
    .status { padding: 20px; border-radius: 8px; margin-bottom: 20px; border-left: 10px solid; }
    .success { background: #d4edda; color: #155724; border-color: #28a745; }
    .error { background: #f8d7da; color: #721c24; border-color: #dc3545; }
    h2 { margin-top: 0; }
</style>";

echo "<h1>🛡️ Lab 02: Database Security Test</h1>";

try {
    // Attempt to connect as the LIMITED user
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    echo "<div class='status success'><h2>✅ Step 1: Secure Connection</h2>Connected successfully as <strong>$user</strong> (Limited Privileges).</div>";

    // Attempt a FORBIDDEN action: Try to destroy a table
    echo "<h2>🚫 Step 2: Testing Security (Attempting DROP TABLE)</h2>";
    echo "<p>Your code is now going to play 'The Hacker' and try to delete a table...</p>";

    $pdo->exec("DROP TABLE IF EXISTS students");

} catch (PDOException $e) {
    if ($e->getCode() == 42000) { // Error 42000 is 'Access denied'
        echo "<div class='status success'>
                <h2>🎉 Security Success!</h2>
                <p>The Database blocked the command. Output: <br><i>'{$e->getMessage()}'</i></p>
                <p><strong>Learning:</strong> Even if a hacker takes over this PHP script, they CANNOT delete your tables.</p>
              </div>";
    } else {
        echo "<div class='status error'><h2>❌ Connection Failed</h2>" . $e->getMessage() . "</div>";
    }
}
?>
