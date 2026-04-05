# Lab 13 Solution Explanation: Data Integrity & ACID 💎

In an ERP or Bank, "Half-Saves" are a catastrophe. This lab demonstrates how to use **Transactions** to ensure your database follows the "All-or-Nothing" rule.

---

## 🛠️ The Implementation Detail

### 1. The "Transaction Buffer"
When we execute `$db->begin_transaction()`, MySQL stops "saving" changes permanently. Instead, it holds them in a private buffer (like a rough draft).
-   **Why it's secure**: Only the current user can see these "uncommitted" changes. Other users on the website still see the old data.

### 2. The Rollback Mechanism
In the `index.php`, we simulated a "Server Crash" using `throw new Exception`.
-   **The Experiment**: The code successfully removes $100 from Alice. If the script crashes there, Bob never gets the $100—meaning $100 has "disappeared" from the world.
-   **The Win**: Because we put the logic inside a `try...catch` block, PHP catches the crash and tells MySQL to **`rollback()`**. Alice's money is instantly returned, and the system stays mathematically correct.

### 3. ACID Properties
This lab specifically demonstrates the **Atomicity** property of ACID:
-   **A**tomicity: Every update in a transaction must succeed, or all must fail.
-   **C**onsistency: Data must follow all rules (like account balances not being negative).
-   **I**solation: Multiple users don't see each other's "rough drafts."
-   **D**urability: Once "Committed," the data is saved forever, even if the power goes out.

---

## 🚀 Running the Solution
1. `cd solutions/13-atomic-transactions`
2. `docker-compose up -d --build`
3. Visit [http://localhost:8093](http://localhost:8093)
4. **Experiment**: Click "Simulate Crash." Notice how the alert message says "Changes Undone" and the account balances stay at $500, even though the code *tried* to remove money!

---
🚀 **[Back to Roadmap](../../README.md)** | 📚 **[View Lab Instructions](../../labs/13-atomic-transactions.md)**
