<?php
/**
 * Test Suite: Automated Verification 🧪
 * Run this from the terminal: php test_logic.php
 */

require_once 'logic.php';

echo "🚀 Starting Automated Tests...\n";

// --- ✅ TEST CASE 1: Standard Calculation ---
$result1 = calculate_net_salary(100, 10);
assert($result1 === 90.0, "FAIL: 100 - 10% should be 90. Got: $result1");
echo "✔ Test 1 (Standard): Passed\n";

// --- ✅ TEST CASE 2: Zero Tax ---
$result2 = calculate_net_salary(1000, 0);
assert($result2 === 1000.0, "FAIL: 1000 - 0% should be 1000. Got: $result2");
echo "✔ Test 2 (Zero Tax): Passed\n";

// --- ✅ TEST CASE 3: 100% Tax ---
$result3 = calculate_net_salary(500, 100);
assert($result3 === 0.0, "FAIL: 500 - 100% should be 0. Got: $result3");
echo "✔ Test 3 (100% Tax): Passed\n";

// --- ✅ TEST CASE 4: Negative Gross (Illegal) ---
$result4 = calculate_net_salary(-100, 10);
assert($result4 === 0, "FAIL: Negative gross should return 0. Got: $result4");
echo "✔ Test 4 (Negative Input): Passed\n";

echo "\n🏆 ALL TESTS PASSED! Your logic is production-ready.\n";
