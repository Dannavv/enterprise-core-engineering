<?php
/**
 * Module Layout: Handles the Visual Component of the ERP 🎨
 */

function render_sidebar($active_link = 'Dashboard') {
    $links = [
        'Dashboard' => '📊',
        'Students'  => '👨‍🎓',
        'Grades'    => '📝',
        'Settings'  => '⚙️'
    ];

    echo "<div style='width: 200px; background: #1e293b; color: white; height: 100vh; padding: 20px; float: left;'>";
    echo "<h2 style='color: #38bdf8;'>ERP Portal</h2>";
    echo "<ul style='list-style: none; padding: 0;'>";
    
    foreach ($links as $name => $icon) {
        $isActive = ($active_link === $name) ? 'background: #334155; border-radius: 8px;' : '';
        echo "<li style='padding: 12px; margin-bottom: 5px; cursor: pointer; $isActive'>";
        echo "$icon <span style='margin-left: 10px;'>$name</span>";
        echo "</li>";
    }
    
    echo "</ul>";
    echo "</div>";
}
