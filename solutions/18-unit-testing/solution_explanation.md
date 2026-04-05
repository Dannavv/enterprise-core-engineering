# Lab 18 Solution Explanation: Automated Verification 🧪

"Manual Testing" (clicking buttons to see if things work) is slow and prone to human error. This lab demonstrates **Unit Testing**—the practice of writing code that confirms your other code works correctly.

---

## 🛠️ The Implementation Detail

### 1. The "Pure Function" Design
In `logic.php`, we built a function that only takes inputs and returns a result. It doesn't talk to a database or a file. This makes it "Pure" and extremely easy to test in isolation.

### 2. Defensive Coding (The "Bouncer")
Our tests didn't just check "Happy Paths" (correct data). We specifically tested **Negative Inputs**. 
-   **The Win**: Because our test expected a `0` response for a negative salary, it forced us to add the `if ($gross < 0)` check in the actual logic. This is **Test-Driven Development (TDD)** in action.

### 3. The Power of `assert()`
PHP has a built-in `assert()` function. It takes a condition (e.g., `1+1 === 2`). If the condition is `false`, the script will throw a warning or error. This allows us to run hundreds of checks in milliseconds without manually reading the output.

---

## 🚀 Running the Solution
1. `cd solutions/18-unit-testing`
2. **Run the Tests**: Execute `php test_logic.php` in your terminal.
3. **The Result**: You should see a list of green checkmarks. If you go into `logic.php` and intentionally break the math (e.g., change `/ 100` to `/ 50`), the tests will instantly "Fail," warning you before you ever push the bug to production.

---
🚀 **[Back to Roadmap](../../README.md)** | 📚 **[View Lab Instructions](../../labs/18-unit-testing.md)**
