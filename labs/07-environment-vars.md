# Lab 07: Configuration Privacy (Environment Variables & .env)
**Objective**: Learn how to keep your secret database passwords OUT of your code.

## 💡 The Concept
If you hardcode a database login (`$db_pass = 'mypassword123';`) in your PHP script and then push your code to GitHub, everyone in the world can see it. Instead, we use **Environment Variables**:
1.  Store secrets in a local file named `.env`.
2.  Your PHP code reads them at runtime using `getenv()`.
3.  NEVER commit your `.env` to GitHub.

## 🛠 The Task
Create a project that hides its configuration:
1.  **File 1**: Create an `.env` file with `DB_PASSWORD=my_secure_pass`.
2.  **File 2**: Create a `config.php` that uses `parse_ini_file` or a manual line-by-line reader to load the variables into `$_ENV`.
3.  **File 3**: Use `getenv('DB_PASSWORD')` or any other method to print "Connected to DB with password: [hidden]".

## 🔍 Discussion Questions
- If you don't commit the `.env` to Git, how does your teammate or the server get the configuration?
- Why is it a security risk to store API keys and passwords directly in your `.php` files?

---
🚀 **[Check the Solution & Explanation](../solutions/07-environment-vars/solution_explanation.md)**
