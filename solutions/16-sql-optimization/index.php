<?php
/**
 * Lab 16 Solution: SQL Optimization & EXPLAIN 🏎️
 */

// 1. Connection (Wait & Retry)
$max_retries = 5; $attempts = 0; $db = null;
while ($attempts < $max_retries) {
    try {
        $db = new mysqli('db', 'root', 'root_password_opt', 'performance_db');
        if (!$db->connect_error) break;
    } catch (Exception $e) {}
    $attempts++; sleep(2);
}

if (!$db || $db->connect_error) die("Database connection failed.");

$message = "";

// --- 🛠️ STEP 1: SEED DATA (If empty) ---
$count_res = $db->query("SELECT COUNT(*) as total FROM students");
$row = $count_res->fetch_assoc();

if ($row['total'] < 1000) {
    $stmt = $db->prepare("INSERT INTO students (roll_no, name) VALUES (?, ?)");
    for ($i = 1; $i <= 1000; $i++) {
        $roll = "2411MC" . str_pad($i, 3, "0", STR_PAD_LEFT);
        $name = "Student " . $i;
        $stmt->bind_param("ss", $roll, $name);
        $stmt->execute();
    }
    $message = "✅ Seeded 1,000 mock students.";
}

// --- 🛠️ STEP 2: RUN EXPLAIN QUERIES ---
$results = [];

// A. Test Before Index
$res_before = $db->query("EXPLAIN SELECT * FROM students WHERE roll_no = '2411MC013'");
$results['before'] = $res_before->fetch_assoc();

// B. Apply Index (If button clicked)
if (isset($_GET['optimize'])) {
    $db->query("CREATE INDEX idx_roll ON students(roll_no)");
    header("Location: index.php?msg=Optimized!");
    exit;
}

// C. Test After Index (Check if index exists)
$idx_check = $db->query("SHOW INDEX FROM students WHERE Key_name = 'idx_roll'");
$has_index = ($idx_check->num_rows > 0);

if ($has_index) {
    $res_after = $db->query("EXPLAIN SELECT * FROM students WHERE roll_no = '2201AI500'");
    $results['after'] = $res_after->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 16: SQL Optimization</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f1f5f9; padding: 50px; display: flex; flex-direction: column; align-items: center; }
        .card { background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 800px; border-top: 8px solid #fbbf24; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; font-size: 0.85rem; }
        th { text-align: left; background: #f8fafc; padding: 10px; border-bottom: 2px solid #e2e8f0; }
        td { padding: 10px; border-bottom: 1px solid #e2e8f0; font-family: monospace; }
        .btn { background: #fbbf24; color: #78350f; padding: 10px 20px; border-radius: 6px; font-weight: bold; text-decoration: none; display: inline-block; }
        .badge { padding: 4px 8px; border-radius: 4px; font-weight: bold; }
        .slow { background: #fee2e2; color: #991b1b; }
        .fast { background: #dcfce7; color: #166534; }
    </style>
</head>
<body>

    <div class="card">
        <h1>🏎️ Lab 16: SQL Query Optimization</h1>
        <p>Current Rows: <strong>1,000 mock students</strong></p>
        
        <?php if (!$has_index): ?>
            <a href="index.php?optimize=1" class="btn">🚀 Create Index on 'roll_no'</a>
        <?php else: ?>
            <div class="badge fast" style="display:inline-block; margin-bottom: 20px;">✅ INDEX ACTIVE: idx_roll</div>
        <?php endif; ?>

        <h3>🔍 Plan A: Without Index (Table Scan)</h3>
        <table>
            <thead><tr><th>Query Type</th><th>Possible Keys</th><th>Key Used</th><th>Rows Scanned</th></tr></thead>
            <tbody>
                <tr>
                    <td><span class="badge slow"><?php echo $results['before']['type']; ?></span></td>
                    <td><?php echo $results['before']['possible_keys'] ?: 'NULL'; ?></td>
                    <td><?php echo $results['before']['key'] ?: 'NULL'; ?></td>
                    <td><?php echo $results['before']['rows']; ?></td>
                </tr>
            </tbody>
        </table>
        <p style="font-size: 0.8rem;">* <code>ALL</code> means MySQL checked every single row in the table to find one student!</p>

        <?php if ($has_index): ?>
            <h3>⚡ Plan B: With Index (Seek)</h3>
            <table>
                <thead><tr><th>Query Type</th><th>Possible Keys</th><th>Key Used</th><th>Rows Scanned</th></tr></thead>
                <tbody>
                    <tr>
                        <td><span class="badge fast"><?php echo $results['after']['type']; ?></span></td>
                        <td><?php echo $results['after']['possible_keys']; ?></td>
                        <td><?php echo $results['after']['key']; ?></td>
                        <td><?php echo $results['after']['rows']; ?></td>
                    </tr>
                </tbody>
            </tbody>
            </table>
            <p style="font-size: 0.8rem;">* <code>const</code> or <code>ref</code> means MySQL jumped directly to the exact row in 1 step! 🎯</p>
        <?php endif; ?>
    </div>

</body>
</html>
