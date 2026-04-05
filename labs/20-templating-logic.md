# Lab 20: Clean Production Templating (UI Logic & CSS Separation)
**Objective**: Build a user interface that reflects a modern, "Premium" look while keeping your PHP logic separate from your HTML.

## 💡 The Concept
1.  **Templating**: Separation of "Logic" (PHP) from "Layout" (HTML).
2.  **Design System**: Using a consistent CSS file for buttons, fonts, and colors across 1,000 pages.
3.  **Inheritance**: Using a "Base" layout (e.g. `header.php` and `footer.php`) so you only have to change one file to update the entire site.

## 🛠 The Challenge
Build a "Student Profile" mock-up with a clean, decoupled layout:
1.  **Frontend (profile.php)**: 
    - Don't put any `SELECT * FROM users` at the TOP of your HTML.
    - Put all your database logic in a function `get_student_data($roll)`.
    - At the bottom of `profile.php`, call `render_profile_card($student)`.
2.  **Layout (theme.css)**: 
    - Create a CSS file that gives a professional "Card" look with a custom font like "Inter."
    - Add a "Dark Mode" class using a simple body class.
3.  **Verification**: Open the page. If the code is organized, you should be able to change the profile's "Font" or "Color" in one CSS file without touching any PHP.

## 🔍 Discussion Questions
- If you have 100 pages, and your client wants a "New Logo" on every page, why is it better to have a `header.php`?
- What happens to your code readability if you mix 50 lines of PHP and 50 lines of HTML in the same file?
- Which is easier to fix: a small PHP error in a small function, or a small PHP error hidden inside 500 lines of HTML code?
