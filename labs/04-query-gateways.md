# Lab 04: Defeating SQL Injection (Prepared Statements & Wrappers)
**Objective**: Build a query system that is impossible for a hacker to break using SQL Injection.

## 💡 The Concept
SQL Injection is the most common way hackers "steal" your database. We stop it by NEVER putting a variable directly into a query. Instead, we use a placeholder (`?`) and "bind" the safe variable to it.

## 🛠 The Task
Create a PHP "Query Gateway" that forces every database call to be safe:
1.  **The Goal**: Develop a wrapper function `executeQuery($sql, $params)`. It should:
    - Automatically `prepare()` the SQL query.
    - Loop through your input array and `bind_param()` all inputs safely.
    - Return the result set or an error if the query fails.
2.  **The Test**: Try to run a login check using an attack input like `' OR '1'='1`. Your safe query should find no user, whereas a raw query would log the attacker in.

## 🔍 Discussion Questions
- If using `mysqli_real_escape_string` is safe, why is using a Prepared Statement even *more* secure?
- What does the `bind_param` string (e.g. "ssi") stand for, and why is it important to be accurate?
