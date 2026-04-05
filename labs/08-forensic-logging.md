# Lab 08: Forensic Incident Tracing (Logging System)
**Objective**: Build a system that "marks every move" so we can find exactly who is causing an error.

## 💡 The Concept
Large systems fail. When they do, we need a **Forensic Log**:
1.  Who is it? (Session user ID).
2.  Where is it? (Page URL).
3.  What did they do? (Message).
4.  When? (Timestamp).

## 🛠 The Task
Create a simple "Activity Monitor" for your application:
1.  **Function**: Create a function `log_activity($message, $level = 'INFO')`.
2.  **Implementation**: Use `date('Y-m-d H:i:s')` to get the timestamp.
3.  **Storage**: Use `file_put_contents()` with `FILE_APPEND` to save Every activity into a hidden file named `audit.log`.
4.  **Verification**: Write a script that "logs" Every page visit and Every login attempt. Read the `audit.log` once you're done.

## 🔍 Discussion Questions
- Why is it important to use `FILE_APPEND` instead of overwriting the log file every time?
- If a user reports an error, what part of your log message will help you find the problem in several Gigabytes of logs?

---
🚀 **[Check the Solution & Explanation](../solutions/08-forensic-logging/solution_explanation.md)**
