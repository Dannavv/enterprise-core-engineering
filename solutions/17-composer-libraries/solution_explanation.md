# Lab 17 Solution Explanation: External Libraries (Composer) 🎼

Professional developers don't rewrite code that already exists and is well-tested. This lab demonstrates how to use **Composer** to leverage the massive PHP open-source ecosystem.

---

## 🛠️ The Dependency Toolchain

### 1. The `composer.json` Manifest
This file is the "Shopping List" for your project. Instead of manually downloading ZIP files from websites, we tell Composer which libraries we need (like `monolog/monolog`) and what version we want.

### 2. The `vendor/` Folder & `autoload.php`
When you run `composer install`, Composer creates a `vendor/` folder containing all the code for your libraries. It also generates a "Magic File" called **`autoload.php`**.
-   **Why it's essential**: You only need to `require` this one file in your app, and all your hundreds of external libraries are instantly available for use.

### 3. Monolog: The Standard for Logging
In **Lab 08**, we wrote our own `file_put_contents` logger. While that was good for learning, **Monolog** is the industry standard used by frameworks like Laravel and Symfony.
-   **Advantage**: It handles rotation, database logging, Slack alerts, and structured data automatically.

---

## 🚀 Running the Solution
1. `cd solutions/17-composer-libraries`
2. **Install Dependencies**: `docker run --rm -v $(pwd):/app composer install` 
   *(Alternatively, if you run the docker-compose, I have set up the Dockerfile to include composer, but you must run the install command inside the container).*
3. Create the logs folder: `mkdir logs && chmod 777 logs`
4. Visit [http://localhost:8097](http://localhost:8097)

---
🚀 **[Back to Roadmap](../../README.md)** | 📚 **[View Lab Instructions](../../labs/17-composer-libraries.md)**
