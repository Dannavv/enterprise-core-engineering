# Lab 06: Clean Modular Patterns (Procedural PHP & Functions)
**Objective**: Learn how to build a large system without creating a "spaghetti" of unmanageable code.

## 💡 The Concept
Large ERPs don't have thousands of pages of repeating code. They use **Procedural Functions**:
1.  Define common parts in a `functions.php`.
2.  Use `require_once` to load them.
3.  NEVER repeat your header or footer code manually.

## 🛠 The Task
Create a mini-portal with three separate files:
1.  **`module_layout.php`**: Create a function `render_sidebar($active_link)` that shows a list of navigation links and highlights the current one.
2.  **`module_data.php`**: Create a function `calculate_gpa($grades)` that performs a calculation.
3.  **`index.php`**:
    - Use `require_once` to pull in both files.
    - Call `render_sidebar("home")`.
    - Loop through an array of objects and call `calculate_gpa()` on each.

## 🔍 Discussion Questions
- What is the difference between `require`, `include`, and `require_once`?
- If you want to change the color of the sidebar on 100 pages, why is it better to have it in a separate function?
