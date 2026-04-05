# Lab 14: Rate Limiting (Brute Force Defense Logic)
**Objective**: Build a system that "throttles" someone who is trying to guess thousands of passwords in a minute.

## 💡 The Concept
1.  **Rate Limiting**: Monitor how many requests come from a single user or IP address.
2.  **Tracking**: Save "Request ID," "User ID," and "Timestamp" in a database table named `rate_limits`.
3.  **Enforcement**: Use `COUNT(*)` to see how many requests have come in the last **60 seconds**.
4.  **Action**: If the count is > 5, tell the user "Too Many Attempts. Wait 60 seconds."

## 🛠 The Task
Create a simple "Throttler" function in PHP:
1.  **Preparation**: Create a MySQL table `rate_limits`.
2.  **Function**: Create `is_rate_limited($user_id)`.
3.  **Implementation**: 
    - `INSERT` the current hit into the table.
    - `SELECT COUNT(*)` where `user_id = ?` and `timestamp > ...`.
    - If the result is too high, return `true`.
4.  **Verification**: Write a loop that calls your logic 10 times in a row. It should "Pass" the first 5 times and "Fail" (Rate Limit) the next 5.

## 🔍 Discussion Questions
- Why is it better to use a database for rate limiting instead of a browser cookie?
- How would you "Clear" the old hits from your `rate_limits` table once you have millions of rows?

---
🚀 **[Check the Solution & Explanation](../solutions/14-rate-limiting/solution_explanation.md)**
