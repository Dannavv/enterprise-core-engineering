# Lab 13: Data Integrity (Database Transactions - ACID)
**Objective**: Build a system that "All-Saves" or "None-Saves" to prevent partial, "broken" or "phantom" data.

## 💡 The Concept
Imagine you are moving money between two banks, or shifting a student from one department to another. If the computer crashes *after* removing them from Dept A but *before* adding them to Dept B, they are deleted forever. We stop this with **Atomic Transactions**:
1.  **BEGIN**: Tell MySQL "Start a group of changes."
2.  **COMMIT**: Tell MySQL "All changes are good, save them ALL at once."
3.  **ROLLBACK**: Tell MySQL "Something went wrong, UNDO everything back to the start."

## 🛠 The Task
Create a PHP script that performs a multi-step update on two tables:
1.  **Step 1**: Use `$conn->begin_transaction();`.
2.  **Step 2**: Perform an `UPDATE` on a "Bank A" table.
3.  **Step 3**: Introduce an intentional error (like a `die()`).
4.  **Step 4**: Notice the database is STILL unchanged.
5.  **Step 5**: If everything is successful, use `$conn->commit();` to finalize it.

## 🔍 Discussion Questions
- What are the four properties of **ACID** in database theory?
- If several people try to update the same row at the exact same millisecond, how does MySQL handle it?

---
🚀 **[Check the Solution & Explanation](../solutions/13-atomic-transactions/solution_explanation.md)**
