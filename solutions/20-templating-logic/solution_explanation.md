# Lab 20 Solution Explanation: Modern Templating 🏛️

This is the final lab. We are moving from "Spaghetti PHP" (mixing DB queries, logic, and HTML in one file) to a professional **Separation of Concerns** architecture.

---

## 🛠️ The Architecture Detail

### 1. Separation of Concerns (SoC)
Notice that **`index.php`** is now very small. It doesn't know *how* to find student data, and it doesn't know *how* to draw a profile card. 
-   **Why it's essential**: In a real company, a "Frontend Developer" would work on the CSS and HTML in `template_functions.php`, while a "Backend Developer" works on the SQL in `data_provider.php`. They never touch each other's files.

### 2. The Design System (`theme.css`)
By using CSS Variables (`:root`), we built a system that is easy to update. 
-   **Dark Mode**: Instead of changing every single color in PHP, we just toggle a single class on the `<body>` tag. All the colors update automatically.

### 3. Inheritance & Reusability
The function `render_profile_card($student)` can now be used on 1,000 different pages. If you want to change the border radius of all cards, you only have to change it in **one** file—the CSS.

---

## 🚀 Running the Solution
1. `cd solutions/20-templating-logic`
2. `docker-compose up -d --build`
3. Visit [http://localhost:8100](http://localhost:8100)
4. **The Experiment**: Click the "Toggle Dark Mode" button. Notice how smoothly the transition happens because of the clean CSS separation.

---
🚀 **[Back to Roadmap](../../README.md)** | 📚 **[View Lab Instructions](../../labs/20-templating-logic.md)**
