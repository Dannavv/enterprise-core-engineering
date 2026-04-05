# Lab 12: Secure Password Management (Hashing & Verifying)
**Objective**: Learn why you should NEVER store a user's password in plain text or Simple MD5.

## 💡 The Concept
If a hacker steals your database, and your passwords are in plain text, every account is compromised. To prevent this, we use **One-Way Hashing**:
1.  **Hashing**: `password_hash()` turns `myPassword123` into a long, random-looking string called a "salt-included hash."
2.  **Verifying**: `password_verify()` checks if the user's input matches that hash without ever "reversing" it.

## 🛠 The Task
Create a secure user registration and login mock-up:
1.  **Step 1**: Use `password_hash($password, PASSWORD_BCRYPT)` to hash a student's password and print the result.
2.  **Step 2**: Use `password_verify()` to compare a "correct" and an "incorrect" attempt against that hash.
3.  **Step 3**: Try to find a way to "decrypt" the hash. If your code is secure, you should find it impossible!

## 🔍 Discussion Questions
- What is the difference between "Encryption" (Two-way) and "Hashing" (One-way)?
- If two users have the same password ("123456"), will their hashes look the same? Why?
