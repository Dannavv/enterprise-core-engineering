# Lab 10: Asynchronous Backends (AJAX & JSON Response Hosting)
**Objective**: Build a page that "talks" to the server without refreshing the entire screen.

## 💡 The Concept
1.  **AJAX (Asynchronous JavaScript and XML)**: A bit of JS code that "calls" a PHP file in the background.
2.  **JSON (JavaScript Object Notation)**: The language PHP uses to "talk back" to JS. It looks like this: `{"success": true, "message": "Saved!"}`.
3.  **Endpoint**: A single PHP file (like `handler.php`) that only outputs JSON, not HTML.

## 🛠 The Task
Create a two-sided "Dynamic Data" page:
1.  **Frontend (index.html)**: Create a button and a simple JavaScript function using `fetch()` or `jQuery.ajax()` to call `process.php`.
2.  **Backend (process.php)**: 
    - Don't output any HTML. Use `header('Content-Type: application/json');`.
    - Create an array `['success' => true, 'timestamp' => time()]`.
    - Use `json_encode($data)` to send it back.
3.  **Response**: On your webpage, have the JS show the `timestamp` on the screen when the button is clicked.

## 🔍 Discussion Questions
- If you forget `header('Content-Type: application/json');`, how will the browser's JavaScript interpret the data?
- Why is it better to use a single "Handler" file (Endpoint) instead of 100 different PHP files for every button?
- What happens if the `process.php` script has a PHP error? How will the JSON response look? 

---
🚀 **[Check the Solution & Explanation](../solutions/10-ajax-json/solution_explanation.md)**
