# Lab 06 Solution Explanation: Clean Modular Patterns 🧱

As an ERP grows, you cannot put all your code in a single file. This lab demonstrates **Separation of Concerns** using functions and modules.

---

## 🛠️ The Architecture
We split the application into three specialized layers:

### 1. The Layout Module (`module_layout.php`)
This file is dedicated exclusively to the **View**. It contains the `render_sidebar()` function. 
-   **Why it's better**: If you want to add a new link to your menu, you change it **once** in this file, and all 100 pages of your ERP will automatically update. No more copy-pasting the same HTML menu everywhere.

### 2. The Data Module (`module_data.php`)
This file is dedicated to **Business Logic** and calculations. It handles how a GPA is calculated.
-   **Why it's better**: If the University changes the formula for GPA calculation, you only update the `calculate_gpa()` function. The rest of the website doesn't even need to know how the math works—they just call the function.

### 3. The Orchestrator (`index.php`)
This is the "Brain" that puts everything together. It uses `require_once` to load the tools it needs.
-   **`require_once` vs `include`**: We use `require_once` because these modules are **critical**. If the file is missing, the application should stop with a Fatal Error. The `_once` suffix ensures that even if we accidentally try to load the file twice, PHP will only load it once, preventing "Redeclared Function" errors.

---

## 🚀 Running the Solution
1. `cd solutions/06-modular-patterns`
2. `docker-compose up -d --build`
3. Visit [http://localhost:8086](http://localhost:8086)

Notice how clean the `index.php` looks compared to a "Spaghetti" file that has all the CSS, HTML, and Math mixed together!

---
🚀 **[Back to Roadmap](../../README.md)** | 📚 **[View Lab Instructions](../../labs/06-modular-patterns.md)**
