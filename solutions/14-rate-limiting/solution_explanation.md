# Lab 14 Solution Explanation: Rate Limiting Defense 🚦

A "Brute Force" attack happens when a hacker tries thousands of passwords per minute. This lab demonstrates how to build a **Database-Backed Throttler** to stop them in their tracks.

---

## 🛠️ The Implementation Detail

### 1. Persistent Tracking (`rate_limits` table)
Instead of relying on browser Cookies or Sessions (which a hacker can easily clear), we track "Hits" in a master database table. 
-   **Why it's secure**: It records the **IP Address** and **User ID**. Even if the hacker clears their cookies or uses 10 different browsers, the server still sees the same IP address hitting it too fast.

### 2. The "Sliding Window" Logic
In `throttler.php`, we use a special SQL query:
`SELECT COUNT(*) ... WHERE hit_timestamp > (NOW() - INTERVAL 60 SECOND)`.
-   **How it works**: This doesn't look at "per day"—it looks at the **last 60 seconds of history**. 
-   **The Enforcer**: As soon as that count crosses our threshold (e.g., 5 hits), the `limited` flag flips to `true`, and our application stops processing their login request.

### 3. Cleanup Strategy (Discussion)
In a real enterprise system, this table will grow very fast. 
-   **The Solution**: We typically set up a **CRON Job** or a **Scheduled Event** in MySQL to run every hour:
    `DELETE FROM rate_limits WHERE hit_timestamp < (NOW() - INTERVAL 1 DAY)`. 
    This keeps the table small and fast.

---

## 🚀 Running the Solution
1. `cd solutions/14-rate-limiting`
2. `docker-compose up -d --build`
3. Visit [http://localhost:8094](http://localhost:8094)

The page will automatically run 10 simulated login attempts. You will see that the first 5 "PASS" and the remaining 5 are instantly "BLOCKED."

---
🚀 **[Back to Roadmap](../../README.md)** | 📚 **[View Lab Instructions](../../labs/14-rate-limiting.md)**
