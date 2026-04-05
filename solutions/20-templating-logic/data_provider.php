<?php
/**
 * 📊 Data Logic Provider: Moving Database Code out of the HTML
 */

function get_student_data($roll_no) {
    // In a real app, this would be a SELECT * FROM database
    // For this lab, we mock the return data.
    return [
        'name'    => 'Arpit Anand',
        'roll_no' => '2411MC13',
        'dept'    => 'Mathematics and Computing',
        'status'  => 'Active'
    ];
}
