-- Lab 16: Optimization Script

CREATE DATABASE IF NOT EXISTS performance_db;
USE performance_db;

-- This table starts WITHOUT any index on roll_no
CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    roll_no VARCHAR(20) NOT NULL,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
