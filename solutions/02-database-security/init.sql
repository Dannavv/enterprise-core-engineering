-- Lab 02: SQL Security Initialization Script

-- 1. Create the specialized database
CREATE DATABASE IF NOT EXISTS university_records;

-- 2. Create the "Limited" Application User
-- Never use 'root' in your PHP code!
CREATE USER IF NOT EXISTS 'app_student_profile'@'%' IDENTIFIED BY 'student_secure_pass_456';

-- 3. Grant ONLY the necessary permissions (Least Privilege)
-- We only allow reading and updating data. Deleting tables is forbidden.
GRANT SELECT, UPDATE ON university_records.* TO 'app_student_profile'@'%';

-- 4. Apply changes session-wide
FLUSH PRIVILEGES;
