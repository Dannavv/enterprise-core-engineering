<?php
/**
 * Lab 20 Solution: Global Templating & UI Separation 🏛️
 */

require_once 'data_provider.php';
require_once 'template_functions.php';

// 1. Logic Phase (The "Brain")
$student = get_student_data("2411MC13");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 20: Clean Templating</title>
    <link rel="stylesheet" href="theme.css">
</head>
<body id="page-body">

    <!-- 🌘 UI Switch -->
    <button class="btn-toggle" onclick="document.getElementById('page-body').classList.toggle('dark-mode')">
        Toggle Dark Mode
    </button>

    <!-- 🏰 Rendering Phase (The "View") -->
    <?php render_profile_card($student); ?>

</body>
</html>
