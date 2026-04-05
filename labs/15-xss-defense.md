# Lab 15: Output Sanitization (XSS Cross-Site Scripting Defense)
**Objective**: Build a "Filter" that stops a malicious user from injecting a "Script" into your database that steals other people's cookies.

## 💡 The Concept
1.  **XSS (Cross-Site Scripting)**: A hacker enters `<script>alert(document.cookie)</script>` as their "Preferred Name."
2.  **Vulnerability**: When an ADMIN views the user's profile, the script "runs" on the Admin's screen and sends the Admin's session cookie to the hacker.
3.  **Sanitization**: We use `htmlspecialchars($data, ENT_QUOTES, 'UTF-8')` on **EVERY** piece of output before it touches the user's screen.

## 🛠 The Task
Create a mini-profile page that is "Injection Proof":
1.  **Preparation**: Create a PHP variable `$attacker_input = "<script>console.log('Gotcha!');</script>";`.
2.  **Vulnerable Page**: Print `$attacker_input` directly. Look at your browser's console. You'll see "Gotcha!".
3.  **Safe Page**: Create an `echo_safe($data)` function that uses `htmlspecialchars()`.
4.  **Verification**: After using `echo_safe()`, your page should show the Literal `<script>` text on the screen, and the script should NOT run.

## 🔍 Discussion Questions
- Why is `htmlspecialchars()` better than `strip_tags()` for this purpose?
- If you use `echo_safe()` on data before saving it to the database, is that a good idea? Or should you only use it when *displaying* it? Explain.

---
🚀 **[Check the Solution & Explanation](../solutions/15-xss-defense/solution_explanation.md)**
