# Lab 11 Solution Explanation: Secure File Storage 📤

Allowing users to upload files is one of the highest-risk features in any ERP. This lab demonstrates a **Multi-Layered "Bouncer" Strategy** to keep the server safe.

---

## 🛠️ The Security Layers

### 1. The Extension Whitelist
We don't try to block "bad" files (Blacklisting). Instead, we only allow a few "good" ones: `.jpg`, `.png`, and `.pdf`.

### 2. The MIME Type Check (`finfo`)
**Critical Hack Prevention**: A standard hacker trick is to rename `attack.php` to `attack.png`. The server sees the `.png` extension and thinks it's an image. 
-   **The Solution**: We use the `finfo_file()` function, which opens the file and reads its **internal binary signature**. If it says it's a `.png` but the inside looks like text, we reject it immediately.

### 3. Basename Sanitization (Massive Renaming)
**Why we do it**: If a user uploads `../../config.php`, and we save it using their name, we might accidentally overwrite our own system files. 
-   **The Solution**: We throw away the user's filename completely and generate a new one like `doc_1712345678_abcd1234.jpg`.

### 4. Folder Security
We store files in a dedicated **`uploads/`** directory. In a real-world enterprise system, this folder is often moved **outside** the web root (e.g., in `/var/storage/`) so that even if a hacker uploads a PHP file, they have no URL to browse to it and "run" it.

---

## 🚀 Running the Solution
1. `cd solutions/11-secure-uploads`
2. Create the folder: `mkdir uploads && chmod 777 uploads`
3. Start the lab: `docker-compose up -d --build`
4. Visit [http://localhost:8091](http://localhost:8091)

---
🚀 **[Back to Roadmap](../../README.md)** | 📚 **[View Lab Instructions](../../labs/11-secure-uploads.md)**
