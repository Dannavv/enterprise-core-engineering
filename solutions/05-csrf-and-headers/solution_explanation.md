# Lab 05 Solution Explanation: CSRF & CSP Security 🛡️

This lab demonstrates two powerful defenses that move security beyond the server and into the **Browser**.

---

## 🛠️ The Defensive Layer

### 1. CSRF (Cross-Site Request Forgery) Token
**The Problem**: A hacker can create a invisible form on `evil-site.com` that submits a POST request to `your-erp.com/update-profile.php` while you are logged in. The browser sees your valid session cookies and processes the request.

**The Solution**:
-   We generate a `csrf_token` (a long, random string) and store it in the user's `$_SESSION`.
-   We inject this token into a **Hidden Input** in our form.
-   When the form is submitted, we compare the submitted token with the one in the session.
-   **Why it works**: A hacker on another website can see your cookies, but they **cannot read the HTML** of your page to find the hidden token. Without the token, the request is rejected.

### 2. CSP (Content Security Policy)
**The Problem**: If a hacker finds an XSS vulnerability, they might try to load a malicious script from their own server: `<script src="https://hacker.com/steal-data.js"></script>`.

**The Solution**:
-   We send a `Content-Security-Policy` header.
-   In this lab, we used `default-src 'self'; script-src 'self';`.
-   **Why it works**: The browser sees this instruction and says: "I will only load scripts from this exact domain." If it sees a script from `evil-hacker.com`, it will block it immediately—even if the script is successfully injected into the HTML.

---

## 🚀 Running the Solution
1. `cd solutions/05-csrf-and-headers`
2. `docker-compose up -d --build`
3. Visit [http://localhost:8085](http://localhost:8085)
4. **Test CSRF**: View the page source (Ctrl+U) to see the hidden token.
5. **Test CSP**: Open DevTools (F12) -> Console. You will see an error saying the script from `evil-hacker.com` was blocked by the security policy!

---
🚀 **[Back to Roadmap](../../README.md)** | 📚 **[View Lab Instructions](../../labs/05-csrf-and-headers.md)**
