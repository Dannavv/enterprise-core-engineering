# Lab 08 Solution Explanation: Forensic Incident Tracing 🕵️‍♂️

"What happened?" is the most common question in enterprise engineering. A logging system is the only way to answer it. This lab demonstrates how to build a **Persistent Audit Trail**.

---

## 🛠️ The Implementation Detail

### 1. The Power of `FILE_APPEND`
In most PHP tasks, we overwrite files. But for logs, overwriting is a disaster—it deletes your "history." By using `FILE_APPEND`, we ensure that the new log entry is always added to the bottom of the existing file.

### 2. Formatting for Scalability
A good log entry is not just a message. It must include:
-   **Timestamps**: Vital for correlating events ("Did the database crash at the same time the user logged in?").
-   **Severity Levels**: `INFO`, `WARNING`, `ERROR`. This allows search tools to filter for only "Critical" issues.
-   **Context**: IP addresses and Request URIs help you identify if an attack is coming from a single malicious robot.

### 3. File Locking (`LOCK_EX`) & Dedicated `logs/` Folder
In `logger.php`, I added two critical production-grade features:
-   **Subfolder Organization**: We move the `audit.log` into a dedicated **`logs/`** directory. This keeps your web root clean and prevents students from accidentally seeing the logs by guessing the URL. 
-   **Permission Management**: When using Docker volumes, you must ensure the host folder has the correct permissions for the `www-data` user to write to it. This is why we created the `logs/` folder with broad write access for this lab.
-   **Concurrency Protection**: I used the `LOCK_EX` flag in `file_put_contents()`. This ensures that if two users perform an action at the exact same millisecond, their log entries won't overlap or corrupt the file.

---

## 🚀 Running the Solution
1. `cd solutions/08-forensic-logging`
2. `docker-compose up -d --build`
3. Visit [http://localhost:8088](http://localhost:8088)
4. **Refresh several times**: Watch how the log box grows.
5. **Check the File**: Look in your local folder under **`logs/audit.log`**.

---
🚀 **[Back to Roadmap](../../README.md)** | 📚 **[View Lab Instructions](../../labs/08-forensic-logging.md)**
