# Lab 03: Secure Identity Tracking (PHP Sessions)
**Objective**: Build a login system that cannot be easily spoofed or stolen by a hacker.

## 💡 The Concept
Sessions are how a website remembers who you are. To secure them, we must:
1.  **Obfuscation**: Hide the default PHP session name.
2.  **Hardening**: Force the browser to treat the session cookie as "Top Secret" (no JavaScript allowed to read it).
3.  **Fingerprinting**: Record the user's specific browser identity. If it changes during the session, it means someone is trying to steal it.

## 🛠 The Task
Create a PHP script that initializes a secure session environment:
1.  **Configure**: Change the session name before starting (e.g., Use `ERP_SECURE_ID`).
2.  **Lockdown**: Use `ini_set` or cookie parameters to enable `httponly` and `samesite=Strict`.
3.  **Validate**: On every page load, compare the current `$_SERVER['HTTP_USER_AGENT']` with a stored version from when the user first logged in.
4.  **Verification**: Open your browser dev tools, go to Cookies, and verify that your custom name is there and the "HttpOnly" flag is checked.

## 🔍 Discussion Questions
- What attack does `HttpOnly` prevent?
- If a student logs in on Chrome and then tries to use the same session on Firefox, what should your code do?
