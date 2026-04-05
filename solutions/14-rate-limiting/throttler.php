<?php
/**
 * Throttler Module: Brute Force Shield 🛡️
 */

function check_rate_limit($db, $user_id, $limit = 5, $seconds = 60) {
    $ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
    
    // 1. RECORD THE HIT: Log this attempt instantly
    $stmt = $db->prepare("INSERT INTO rate_limits (user_id, ip_address) VALUES (?, ?)");
    $stmt->bind_param("ss", $user_id, $ip);
    $stmt->execute();

    // 2. CHECK HISTORY: Look back X seconds
    // We count how many times this IP/User has hit the server recently
    $query = "SELECT COUNT(*) as hit_count 
              FROM rate_limits 
              WHERE user_id = ? 
              AND hit_timestamp > (NOW() - INTERVAL ? SECOND)";
    
    $stmt = $db->prepare($query);
    $stmt->bind_param("si", $user_id, $seconds);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // 3. ENFORCE: If hits > limit, block them!
    return [
        'count'   => $row['hit_count'],
        'limited' => ($row['hit_count'] > $limit)
    ];
}
