# Lab 12 Solution Explanation: Secure Password Management 🔐

A common developer "Amateur Move" is storing passwords in plain text or using outdated hashing like MD5. This lab demonstrates **Bcrypt Architecture**—the industry standard for securing user credentials.

---

## 🛠️ The Security Layers

### 1. The "One-Way" Principle
Unlike **Encryption** (which is two-way and can be decrypted), **Hashing** is a one-way trip. Once a password is turned into a hash, there is no mathematical way to reverse it back to plain text.
-   **Why it's secure**: If a hacker steals the database, they have no passwords—only a list of random-looking strings.

### 2. Automatic Salting
In the past, developers had to manually generate a "Salt" (random noise) to prevent "Rainbow Table" attacks. 
-   **Bcrypt Advantage**: PHP's `password_hash()` function automatically generates a unique, cryptographically strong salt for **every single user**. Even if two users have the same password (`123456`), their hashes will be completely different!

### 3. The "Slow" Algorithm (Cost Work)
Bcrypt is designed to be **deliberately slow**. 
-   **Why slow is good**: If a hacker tries to "Brute Force" a hash by guessing millions of combinations, the slow speed of Bcrypt makes it practically impossible to guess passwords in a reasonable timeframe.

### 4. Verification (`password_verify`)
This function is a miracle of security. It reads the hash, extracts the salt, and performs the mathematical check internally. It returns a simple `true` or `false`, preventing the developer from making logic mistakes in the verification process.

---

## 🚀 Running the Solution
1. `cd solutions/12-password-hashing`
2. `docker-compose up -d --build`
3. Visit [http://localhost:8092](http://localhost:8092)

---
🚀 **[Back to Roadmap](../../README.md)** | 📚 **[View Lab Instructions](../../labs/12-password-hashing.md)**
