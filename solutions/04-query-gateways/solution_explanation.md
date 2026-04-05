# Lab 04 Solution Explanation: The Query Gateway 🛡️

SQL Injection happens when a database confuses **Code** with **Data**. This lab builds a "Gateway" that makes that confusion impossible.

---

## 🛠️ The Implementation Detail

### 1. Why `mysqli_real_escape_string` isn't enough
While escaping strings can stop simple attacks, it is still prone to bypasses (like encoding attacks). The "Core Engineering" standard is to use **Prepared Statements**.

### 2. How the Wrapper Works (`executeQuery`)
In `index.php`, we built a helper function that:
-   **Automates Type Detection**: It loops through your inputs and identifies if they are Integers (`i`) or Strings (`s`). This eliminates the common developer mistake of getting the "ssi" string wrong.
-   **Separates Logic from Value**: We use the `?` placeholder. When the database receives the query, it "pre-compiles" the logic. When the values come later, they are treated strictly as text/numbers, never as executable SQL.

### 3. The Result of the Attack
When the hacker sends `' OR '1'='1`:
-   **In the Dangerous way**: The database executes `WHERE username = '' OR '1'='1'`, which is always true. **HACKED.**
-   **In the Secure way**: The database looks for a user whose literal username is the text string `"' OR '1'='1"`. Since no such user exists, it returns zero results. **SECURE.**

---

## 🚀 Running the Solution
1. `cd solutions/04-query-gateways`
2. `docker-compose up -d --build` (Make sure to build to get the `mysqli` driver!)
3. Visit [http://localhost:8084](http://localhost:8084)

---
🚀 **[Back to Roadmap](../../README.md)** | 📚 **[View Lab Instructions](../../labs/04-query-gateways.md)**
