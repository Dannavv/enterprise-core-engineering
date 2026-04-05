# Lab 10 Solution Explanation: Asynchronous Backends ⚡

Modern web applications don't refresh the page every time you click a button. This lab demonstrates **AJAX**—the technology that makes sites feel "App-like."

---

## 🛠️ The Implementation Detail

### 1. The API Principle (`process.php`)
We created a specialized PHP file that acts as an **API Endpoint**. It is critical that this file follows the rules of machine-to-machine communication:
-   **No HTML**: If you put a single `<html>` tag or even a space before `<?php`, the JSON will be corrupted.
-   **Content-Type Header**: By sending `application/json`, we tell the browser "this is structured data, not a visual page."
-   **`json_encode`**: PHP's internal function converts a complex associative array into a string that JavaScript understands natively.

### 2. The Fetch Request (`index.html`)
On the frontend, we used the modern JavaScript **`fetch()`** API:
-   **Non-Blocking**: The browser sends the request in the "background." The user can still scroll and interact with the page while the server is thinking.
-   **`response.json()`**: This "promise-based" function takes the raw text from PHP and turns it back into a JavaScript object—allowing us to access `data.timestamp` as if it were a local variable.

---

## 🚀 Running the Solution
1. `cd solutions/10-ajax-json`
2. `docker-compose up -d --build`
3. Visit [http://localhost:8090](http://localhost:8090)
4. **Interact**: Click the "Update Server Time" button. Notice how only the small gray box updates, while the rest of the page stays perfectly still.

---
🚀 **[Back to Roadmap](../../README.md)** | 📚 **[View Lab Instructions](../../labs/10-ajax-json.md)**
