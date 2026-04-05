# Lab 19: Disaster Recovery (SQL Dumps & Cron Backups)
**Objective**: Build a "Time Machine" so if your server is deleted, you can restore all of your data in seconds.

## 💡 The Concept
1.  **SQL Dump**: A file (`backup.sql`) that contains all of your tables and data as code.
2.  **`mysqldump`**: The standard command-line tool for exporting your database.
3.  **Cron Job**: A background "Timer" (e.g. `0 0 * * *`) that runs a script every night.

## 🛠 The Task
Create a manual backup and recovery process:
1.  **Step 1**: Use `docker exec -i mysql_container_name mysqldump -uroot -ppassword db_name > backup.sql`.
2.  **Step 2**: Open `backup.sql` and verify it contains your table schema and `INSERT` statements.
3.  **Step 3**: Introduce a disaster: `DROP DATABASE university_records;`.
4.  **Step 4**: **The Test**: Use `docker exec -i mysql_container_name mysql -uroot -ppassword db_name < backup.sql` to restore it. 

## 🔍 Discussion Questions
- If you have 10,000 students, how often should you run a backup? Every day? Every hour?
- If you have a backup from 3 days ago, and your server crashes today, what happens to the data from the last 3 days?
- Where should you "Keep" your backup? On the same server? In a different city? Why?
