# Lab 02 Solution Explanation: Principles of Least Privilege 🛡️

This lab focuses on **Database Hardening**—specifically ensuring that the application only has the exact permissions it needs to function, and nothing more.

---

## 🛠️ The "Least Privilege" Strategy
Most developers use the `root` account because it's "easy," but this is a massive security risk. In this solution:

### 1. Automated Setup (`init.sql`)
We use a Docker feature to automatically configure our database the first time it starts:
-   **`CREATE USER`**: We create a unique identity for our application (`app_student_profile`).
-   **`GRANT SELECT, UPDATE`**: We explicitly allow only reading and modifying data. We deliberately omit `DELETE` and `DROP` permissions.

### 2. Implementation (`docker-compose.yml`)
-   **Service Separation**: We keep using the pattern from Lab 01.
-   **Port Choice**: We are using **Port 8082** to ensure this lab doesn't collide with Lab 01 or any other existing services.

### 3. Verification (`index.php`)
This script acts as the "Stress Test." It attempts to connect to the database and perform a destructive action (`DROP TABLE`). 
-   **Expected Result**: The database engine sees that the `app_student_profile` user doesn't have the "DROP" permission and throws a **42000 Access Denied** error.
-   **The Win**: This confirms that the security is enforced at the **Database Level**, providing a second line of defense even if the code itself is compromised.

---

## 🚀 Running the Solution
1. Move to this directory: `cd solutions/02-database-security`
2. Start the services: `docker-compose up -d`
3. Visit [http://localhost:8082](http://localhost:8082)

---
🚀 **[Back to Roadmap](../../README.md)** | 📚 **[View Lab Instructions](../../labs/02-database-security.md)**
