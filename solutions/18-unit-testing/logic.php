<?php
/**
 * Salary Logic: The "Business Engine" 💰
 * This file contains the raw logic we want to test.
 */

function calculate_net_salary($gross, $tax_rate) {
    // 🛡️ Data Hardening: No negative salaries or taxes allowed
    if ($gross < 0 || $tax_rate < 0) {
        return 0; 
    }

    // 🛡️ Data Hardening: Tax rate can't be more than 100%
    if ($tax_rate > 100) {
        $tax_rate = 100;
    }

    $tax_amount = ($gross * $tax_rate) / 100;
    return $gross - $tax_amount;
}
