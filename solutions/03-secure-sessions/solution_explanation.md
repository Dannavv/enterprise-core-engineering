# Lab 03 Solution Explanation: Secure Identity Tracking 🛡️

Sessions are the "key" to a user's account. This lab demonstrates how to make that key impossible to steal or copy.

---

## 🛠️ The Hardening Layer
We used three specific layers of defense to protect user identity:

### 1. Obfuscation (`session_name`)
By default, PHP uses `PHPSESSID`. Hackers look for this specifically to identify the backend technology. By changing it to `ERP_SECURE_ID`, we practice **"Security by Obscurity"** as an initial layer.

### 2. Cookie Lockdown (`session_set_cookie_params`)
This is the most critical step. We configured the session cookie with flags:
-   **`httponly`**: This tells the browser that **only the server** can read this cookie. JavaScript (and therefore XSS scripts) cannot access it. Even if a site has an XSS vulnerability, the hacker cannot steal the session!
-   **`samesite=Strict`**: This tells the browser never to send the cookie if the request originated from another website. This effectively kills **CSRF (Cross-Site Request Forgery)** attacks.

### 3. Fingerprinting (Validation)
Even if a hacker somehow steals the session ID, we have a "Fingerprint" check in `index.php`.
-   We record the user's `HTTP_USER_AGENT` on first login.
-   On every following page load, we check if it matches.
-   If a hacker tries to use the same session ID from a different browser (e.g., you logged in on Chrome, they are using Firefox), the code will detect the mismatch and instantly destroy the session.

---

## 🚀 Running the Solution
1. `cd solutions/03-secure-sessions`
2. `docker-compose up -d`
3. Visit [http://localhost:8083](http://localhost:8083)

---
🚀 **[Back to Roadmap](../../README.md)** | 📚 **[View Lab Instructions](../../labs/03-secure-sessions.md)**
