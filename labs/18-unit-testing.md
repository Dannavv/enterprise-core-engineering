# Lab 18: Automated Verification (Unit Tests - TDD)
**Objective**: Build a system that "Checks its own homework" to prevent your code from breaking in the future.

## 💡 The Concept
1.  **Unit Tests**: Small bits of code that "Assert" (Check) if a function is doing its job.
2.  **TDD (Test-Driven Development)**: Write the "Test" FIRST, then write the "Code" to pass it.
3.  **Assertion**: `assert(1 + 1 === 2, "Math is broken!");`.

## 🛠 The Task
Create a mini-test suite for a complex calculation:
1.  **The Code**: Create a function `calculate_net_salary($gross, $tax_rate)`.
2.  **The Test File**: Create `test_logic.php`:
    - Call `calculate_net_salary(100, 10)` and `assert()` it is equal to `90`.
    - Try giving it a negative number. Does your code return an error or a negative salary?
    - If it fails, fix the code, not the test!
3.  **Success**: Run your test script from the terminal (`php test_logic.php`). If it prints nothing, it passed!

## 🔍 Discussion Questions
- If you have 10,000 lines of code, why is it better to have Unit Tests instead of manually clicking buttons on a website to check if it's broken?
- What happens to your "Confidence" if you have 1,000 tests that all pass after you made a big change?
- Should you test "Negative" or "Input Garbage" cases (like giving a string when a number is expected)? Why?

---
🚀 **[Check the Solution & Explanation](../solutions/18-unit-testing/solution_explanation.md)**
