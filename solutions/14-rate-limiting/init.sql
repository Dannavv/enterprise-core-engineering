-- Lab 14: Rate Limiting Table

CREATE DATABASE IF NOT EXISTS security_db;
USE security_db;

-- This table tracks every "Hit" to a sensitive page
CREATE TABLE IF NOT EXISTS rate_limits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(50) NOT NULL,
    ip_address VARCHAR(45) NOT NULL,
    hit_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
