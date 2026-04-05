<?php
/**
 * Lab 09 Solution: Input Validation Test Bench 🧪
 */

require_once 'validator.php';

// --- 🕵️ THE TEST: AN ARRAY OF MIXED INPUTS ---
$test_cases = [
    ['roll' => '2201AI05', 'email' => 'alice@univ.edu',    'desc' => 'Valid Student'],
    ['roll' => '2201CS99', 'email' => 'bob@gmail.com',     'desc' => 'Valid CS student'],
    ['roll' => '9901EE01', 'email' => 'failed@test',       'desc' => 'Wrong Year/Email'],
    ['roll' => '2201XX01', 'email' => 'hacker@evil.com',   'desc' => 'Invalid Dept (XX)'],
    ['roll' => '2201AI01; DROP TABLE users', 'email' => 'sql@inject.com', 'desc' => 'SQL Animation Attempt'],
    ['roll' => '2201AI00', 'email' => '<script>alert(1)</script>', 'desc' => 'XSS Attack Input'],
    ['roll' => 'short',    'email' => 'not-an-email',      'desc' => 'Garbage Data']
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 09: Input Validation</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f1f5f9; padding: 50px; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border-top: 8px solid #6366f1; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { text-align: left; background: #f8fafc; padding: 12px; border-bottom: 2px solid #e2e8f0; }
        td { padding: 12px; border-bottom: 1px solid #e2e8f0; font-size: 0.9rem; }
        .badge { padding: 4px 8px; border-radius: 4px; font-weight: bold; font-size: 0.75rem; }
        .passed { background: #dcfce7; color: #166534; }
        .forbidden { background: #fee2e2; color: #991b1b; }
        code { background: #eee; padding: 2px 4px; border-radius: 3px; font-family: monospace; }
    </style>
</head>
<body>

    <div class="container">
        <h1>👮‍♂️ Lab 09: Input Validation Hub</h1>
        <p>This system tests every input against our <strong>Regex Security Pattern</strong> before it ever touches a database logic.</p>

        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Roll Number</th>
                    <th>Email</th>
                    <th>Result</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($test_cases as $case): ?>
                    <?php 
                        $roll_pass = is_valid_roll($case['roll']);
                        $email_pass = is_valid_email($case['email']);
                        $overall_pass = ($roll_pass && $email_pass);
                    ?>
                    <tr>
                        <td><strong><?php echo $case['desc']; ?></strong></td>
                        <td><code><?php echo htmlspecialchars($case['roll']); ?></code></td>
                        <td><code><?php echo htmlspecialchars($case['email']); ?></code></td>
                        <td>
                            <?php if ($overall_pass): ?>
                                <span class="badge passed">✅ PASSED</span>
                            <?php else: ?>
                                <span class="badge forbidden">🚫 FORBIDDEN</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div style="margin-top:20px; padding:15px; background:#fff7ed; border-left:4px solid #f97316; font-size:0.85rem;">
            <strong>Security Note:</strong> Notice how the SQL Injection and XSS inputs were automatically marked as <code>FORBIDDEN</code> because they didn't follow the <code>2201(AI|CS|EE)[0-9]{2}</code> pattern. This is a "Positive Validation" strategy (only allow what is good).
        </div>
    </div>

</body>
</html>
