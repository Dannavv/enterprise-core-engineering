-- Lab 04: Initialization Script

CREATE DATABASE IF NOT EXISTS gateway_db;
USE gateway_db;

-- Create a sensitive users table for testing SQL Injection
CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    secret_data TEXT
);

-- Add a real admin account
INSERT INTO admin_users (username, password, secret_data) 
VALUES ('admin', 'p@ssword123', 'Top Secret: The ERP upgrade is on Monday.');
