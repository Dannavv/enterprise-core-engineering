<?php
/**
 * Validator Module: The "Data Police" 👮‍♂️
 */

/**
 * 🎓 Function 1: Roll Number Validation
 * Pattern: Starts with 22, then 01, then AI/CS/EE, then 2 digits.
 * Example: 2201AI05 (Valid), 9901XX00 (Invalid)
 */
function is_valid_roll($roll) {
    // Regex breakdown:
    // ^      : Start of string
    // 2201   : Literal match for '2201'
    // (AI|CS|EE) : Must be one of these three departments
    // [0-9]{2} : Exactly two digits (0-9)
    // $      : End of string
    $pattern = "/^2201(AI|CS|EE)[0-9]{2}$/";
    return preg_match($pattern, $roll);
}

/**
 * 📧 Function 2: Email Validation
 * Using PHP's built-in filter for high reliability.
 */
function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
