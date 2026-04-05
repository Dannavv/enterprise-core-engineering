# Lab 09 Solution Explanation: Input Validation & Regex 👮‍♂️

The most dangerous assumption a developer can make is: *"The user will always type what I expect."* This lab demonstrates how to use **Regular Expressions (Regex)** to force data into a strictly defined "Security Pattern."

---

## 🛠️ The Implementation Detail

### 1. Positive Validation (Allow-listing)
Instead of trying to find and block "bad" characters (like `'` or `<script>`), we use a **Positive Validation** strategy. We define exactly what a "good" Roll Number looks like and block **everything else**.
-   **The Pattern**: `/^2201(AI|CS|EE)[0-9]{2}$/`
-   **Why it works**: Even if a hacker adds a semicolon (`;`) or an SQL command after their roll number, the Regex will see that the string length and characters don't match the `2-digits-at-the-end` rule and reject the whole input.

### 2. Built-in vs. Manual Regex
-   **Roll Number**: We wrote a manual Regex because the "University Logic" is unique.
-   **Email**: We used PHP's `filter_var` with `FILTER_VALIDATE_EMAIL`. It is almost always better to use built-in filters for common types like Emails, Dates, or URLs, as they handle complex edge cases (like `+` signs in emails) better than a simple Regex.

---

## 🚀 Running the Solution
1. `cd solutions/09-input-validation`
2. `docker-compose up -d --build`
3. Visit [http://localhost:8089](http://localhost:8089)

Look at the **Test Results table**. Notice how the "Garbage Data" and "SQL Injection" attempts are automatically flagged as **FORBIDDEN** because they tried to break out of the defined pattern.

---
🚀 **[Back to Roadmap](../../README.md)** | 📚 **[View Lab Instructions](../../labs/09-input-validation.md)**
