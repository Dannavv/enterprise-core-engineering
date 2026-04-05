# Lab 09: Input Validation Logic (Regex & Data Hardening)
**Objective**: Build a "Gateway" that stops bad or incorrectly formatted data from ever reaching your database.

## 💡 The Concept
Validation is the first line of defense. We use **Regular Expressions (Regex)** to force data to follow a specific "Pattern."
-   **Email Pattern**: `^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$`
-   **Student Roll No**: `^[0-9]{2}01(AI|CS|EE)[0-9]{2}$`

## 🛠 The Task
Create a PHP "Validation Hub" with these tests:
1.  **Function 1**: Create `is_valid_roll($roll)` that uses `preg_match` to only allow rolls starting with `22`, followed by `01`, `AI/CS/EE`, and 2 numbers.
2.  **Function 2**: Create `is_valid_email($email)` using `filter_var` or a Regex.
3.  **The Test**: Write a script that checks an array of inputs and prints "Passed" or "Forbidden" for each. Use at least 5 "attack" or "garbage" inputs to test it.

## 🔍 Discussion Questions
- Why is it better to use a Regex instead of just checking `strlen()`?
- If a student enters `2201AI01; DROP TABLE users`, will your `preg_match` stop it? Why?
- Does validating on the Frontend (with JavaScript) mean we don't need to validate on the Backend? Explain.

---
🚀 **[Check the Solution & Explanation](../solutions/09-input-validation/solution_explanation.md)**
