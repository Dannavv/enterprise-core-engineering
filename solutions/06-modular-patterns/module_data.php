<?php
/**
 * Module Data: Handles the Calculations and Logic 🧮
 */

function calculate_gpa($grades) {
    if (empty($grades)) return 0;
    
    $total = array_sum($grades);
    $count = count($grades);
    
    // Simple GPA logic (Average of grades / 25)
    return number_format(($total / $count) / 25, 2);
}

function get_student_list() {
    return [
        ['name' => 'Alice Johnson', 'grades' => [85, 92, 78, 95]],
        ['name' => 'Bob Smith', 'grades' => [70, 65, 80, 72]],
        ['name' => 'Charlie Davis', 'grades' => [90, 88, 91, 94]]
    ];
}
