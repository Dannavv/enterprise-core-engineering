# Lab 01: Multi-Container Architecture (Docker Compose)
**Objective**: Learn how modern applications separate their logic (Web) from their data (Database).

## 💡 The Concept
Applications are no longer "one big block." They are built as a team of specialists. One container handles the "Brain" (PHP/Apache) and another handles the "Memory" (MySQL). They communicate over an internal network that is hidden from the public.

## 🛠 The Task
Create a `docker-compose.yml` file that starts two independent services:
1.  **Web Service**: Use the `php:8.2-apache` engine. Ensure it handles traffic on Port 80.
2.  **Database Service**: Use a MySQL 8.0 engine. Set a root password via environment variables.

### Your Goal:
- Successfully start both containers using a single command.
- Create a simple page that acts as the "Frontend" which confirms the server is running.

## 🔍 Discussion Questions
- Why is it better to have the Database in its own container instead of installing it on the Web server?
- If you stop the Web container, does the data in the Database container disappear?

---
🚀 **[Check the Solution & Explanation](../solutions/01-docker-compose/solution_explanation.md)**
