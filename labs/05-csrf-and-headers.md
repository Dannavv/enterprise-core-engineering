# Lab 05: CSRF Tokens & CSP Security Headers
**Objective**: Build a "Secret Key" for every form so a hacker cannot "submit" a form on your behalf from a different website.

## 💡 The Concept
1.  **CSRF (Cross-Site Request Forgery)**: A silent attack where a hacker tricks a logged-in user into clicking a link that secretly sends a POST request back to the ERP. We stop this by putting a "One-Time Secret Key" (the Token) in every form.
2.  **CSP (Content Security Policy)**: A header that tells the browser "Only load scripts from these 3 trusted CDNs." This stops hackers from injecting malicious JS into your page.

## 🛠 The Task
Create a secure form that is "CSRF Protected" and uses security headers:
1.  **Generation**: Create a function `get_csrf_token()` that saves a random string to `$_SESSION['csrf_token']`.
2.  **Integration**: Add an `<input type="hidden" name="csrf_token" value="...">` to an HTML form.
3.  **Validation**: Reject any POST request if the `csrf_token` doesn't match the one in the user's session.
4.  **Enforcement**: Add a security header to your PHP code:
    ```php
    header("Content-Security-Policy: default-src 'self'; script-src 'self' cdn.domain.com;");
    ```

## 🔍 Discussion Questions
- If a hacker doesn't know the victim's secret `$_SESSION['csrf_token']`, can they force a form submission?
- What would happen to JQuery or other external scripts if you didn't list them in your CSP header?

---
🚀 **[Check the Solution & Explanation](../solutions/05-csrf-and-headers/solution_explanation.md)**
