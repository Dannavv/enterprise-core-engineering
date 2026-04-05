# Lab 19 Solution Explanation: Disaster Recovery 💾

Any database without a backup is a "Ticking Time Bomb." This lab demonstrates how to build a **Time Machine** for your data using **`mysqldump`**.

---

## 🛠️ The Disaster Protocols

### 1. The `mysqldump` Snapshot
The `mysqldump` tool doesn't just copy the data—it writes a giant file full of SQL commands. It creates the instructions to rebuild your entire world from scratch.
-   **Structure**: It includes `CREATE TABLE` and `INSERT INTO` statements. 
-   **Why it's useful**: You can take this `.sql` file to any other machine in the world and rebuild your database in seconds.

### 2. The Restore Pipeline
We used a "Unix Pipe" (`|`) to move the data. 
-   **The Flow**: `cat backup.sql | docker exec mysql ...`
-   **The Logic**: We read the file on your computer and "stream" the text directly into the MySQL engine inside the Docker container. 

### 3. Automated CRON Logic (Discussion)
In a real enterprise system, a developer shouldn't run `backup.sh` manually.
-   **The Solution**: We add a line to the system's **Crontab**:
    `0 3 * * * /path/to/backup.sh` (Runs the backup every night at 3:00 AM while everyone is sleeping).

---

## 🚀 Running the Solution

1. `cd solutions/19-sql-backups`
2. `docker-compose up -d`
3. **Make the scripts executable**: `chmod +x backup.sh restore.sh`
4. **Take a Backup**: Run `./backup.sh`. Notice the new `.sql` file in your folder.
5. **The Disaster**: Manually enter your database (using PHPMyAdmin or terminal) and `DROP` or `DELETE` all your data.
6. **The Recovery**: Run `./restore.sh <your_backup_file>.sql`. Refresh your tables and see your data returned!

---
🚀 **[Back to Roadmap](../../README.md)** | 📚 **[View Lab Instructions](../../labs/19-sql-backups.md)**
