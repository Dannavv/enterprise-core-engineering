# Lab 02: Principles of Least Privilege (MySQL Security)
**Objective**: Learn how to "lock down" a database so that even if a hacker breaks into your website, they cannot delete your data.

## 💡 The Concept
NEVER use the `root` account in your application code. The `root` account is for maintenance only. Instead, create "Limited Users" that can only do exactly what is necessary (usually only `SELECT`, `INSERT`, and `UPDATE` on one specific database).

## 🛠 The Task
Connect to a MySQL instance and execute the following administrative sequence:
1.  **Creation**: Create a database named `university_records`.
2.  **Specialization**: Create a specific user named `app_student_profile`.
3.  **Restriction**: Grant this user only `SELECT` and `UPDATE` permissions on the `university_records` database. Do not allow them to `DROP` (Delete) any tables.
4.  **Verification**: Log in as your new user and try to delete a table. You should receive a "Command Denied" error.

## 🔍 Discussion Questions
- In a system with Students and Professors, why should they have different database users for the same database?
- What does the `FLUSH PRIVILEGES;` command do?
