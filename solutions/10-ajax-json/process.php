<?php
/**
 * Backend API Endpoint: JSON Responses only! 🚀
 * Objective: Communicate with JavaScript without sending any HTML.
 */

// 1. Mandatory Header: Tells the browser "this is data, not a website."
header('Content-Type: application/json');

// 2. Prepare the data array
$response = [
    'success'    => true,
    'message'    => 'Data fetched from ERP Backend!',
    'timestamp'  => date('H:i:s'), // Human-readable time
    'unix_time'  => time(),        // Raw Unix timestamp
    'status'     => 'API_ONLINE'
];

// 3. ENCODE: Convert the PHP array into a JSON string
echo json_encode($response);

// 4. STOP: Never output anything else (like white space or <html>)!
exit;
