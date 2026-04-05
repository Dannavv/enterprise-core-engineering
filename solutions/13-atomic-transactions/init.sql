-- Lab 13: Initialization Script

CREATE DATABASE IF NOT EXISTS bank_system;
USE bank_system;

-- Create two accounts for testing atomic transfers
CREATE TABLE IF NOT EXISTS accounts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    balance INT NOT NULL
);

-- Reset for the demo
TRUNCATE accounts;

-- Add two accounts with 500 dollars each
INSERT INTO accounts (name, balance) VALUES ('Alice (Dept A)', 500), ('Bob (Dept B)', 500);
