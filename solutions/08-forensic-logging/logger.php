<?php
/**
 * Logger Module: The "Forensic Audit" System 🕵️‍♂️
 */

function log_activity($message, $level = 'INFO') {
    $log_file = __DIR__ . '/logs/audit.log';
    
    // 1. Gather Context (Who, Where, When)
    $timestamp = date('Y-m-d H:i:s');
    $ip_address = $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';
    $request_uri = $_SERVER['REQUEST_URI'] ?? 'CLI';
    
    // 2. Format the Log Entry (Professional Format)
    // [TIMESTAMP] [LEVEL] [IP] [URI] - MESSAGE
    $log_entry = "[$timestamp] [$level] [$ip_address] [$request_uri] - $message" . PHP_EOL;

    // 3. STORAGE: Append to the log file (never overwrite!)
    // If the file doesn't exist, it will be automatically created.
    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
}
