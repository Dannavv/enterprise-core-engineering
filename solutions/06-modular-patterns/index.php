<?php
/**
 * Lab 06 Solution: Modular Patterns 🧱
 */

// 1. IMPORT: Pull in our specialized modules
require_once 'module_layout.php';
require_once 'module_data.php';

// 2. DATA: Get students using the data module
$students = get_student_list();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 06: Modular ERP</title>
    <style>
        body { margin: 0; font-family: sans-serif; display: flex; background: #f8fafc; }
        .content { flex-grow: 1; padding: 40px; }
        .student-card { background: white; padding: 15px; margin-bottom: 10px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); display: flex; justify-content: space-between; align-items: center; }
        .gpa { font-weight: bold; color: #6366f1; background: #eef2ff; padding: 5px 10px; border-radius: 5px; }
    </style>
</head>
<body>

    <!-- 3. RENDER: Use the layout module -->
    <?php render_sidebar('Students'); ?>

    <div class="content">
        <h1>👨‍🎓 Student GPA Overview</h1>
        <p>This page is built using <strong>Modular PHP</strong>. The sidebar and the GPA logic are in separate files!</p>

        <?php foreach ($students as $s): ?>
            <div class="student-card">
                <span><?php echo $s['name']; ?></span>
                <!-- Use the data module calculation -->
                <span class="gpa">GPA: <?php echo calculate_gpa($s['grades']); ?></span>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>
