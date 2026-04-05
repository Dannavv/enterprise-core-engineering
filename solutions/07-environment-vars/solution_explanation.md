# Lab 07 Solution Explanation: Configuration Privacy 🔒

Hardcoding secrets (Passwords, API Keys, Database URLs) in your code is one of the most dangerous developer mistakes. This lab demonstrates how to use **Environment Variables** to build a secure "Wall" between your code and your secrets.

---

## 🛠️ The Implementation Detail

### 1. The `.env` Strategy
Instead of putting a password directly in a PHP file, we put it in a raw text file named `.env`. This file is special because:
-   It is intended to be **ignored** by Git (via `.gitignore`).
-   It stays only on the local machine (or the production server).

### 2. The `.env.example` Pattern
Since the real `.env` is never shared, your teammates won't know which keys are needed to run the app. We provide a "Template" called `.env.example`. This file contains the **keys** but leaves the **values** blank. 

### 3. The Custom Loader (`config.php`)
In this lab, we build a manual "Env Loader." It reads the file line by line and uses two special PHP functions:
-   **`$_ENV`**: A global array that holds your environment variables.
-   **`putenv()` & `getenv()`**: These interact with the underlying Operating System's environment. This is the preferred way for "Enterprise" applications to access secrets.

---

## 🚀 Running the Solution
1. `cd solutions/07-environment-vars`
2. `docker-compose up -d --build`
3. Visit [http://localhost:8087](http://localhost:8087)

Notice that the **`index.php`** is completely "Blind" to the password—it only knows the *name* of the variable (`DB_PASSWORD`).

---
🚀 **[Back to Roadmap](../../README.md)** | 📚 **[View Lab Instructions](../../labs/07-environment-vars.md)**
