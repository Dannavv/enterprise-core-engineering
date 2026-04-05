# Lab 17: External Libraries (Composer & Dependencies)
**Objective**: Learn how to use "Open Source" code to solve common problems like sending Emails or logging.

## 💡 The Concept
We don't "Invent" everything ourselves. We use **External Libraries**:
1.  **Dependencies**: Managed in a file named `composer.json`.
2.  **Manager**: Uses the `composer` command-line tool.
3.  **Inclusion**: Use `require_once 'vendor/autoload.php';` to load everything.

## 🛠 The Task
Build a mini-project that uses a 3rd party tool:
1.  **Step 1**: Install Composer on your machine.
2.  **Step 2**: Create a `composer.json` describing your project.
3.  **Step 3**: Use `composer require monolog/monolog` to add a professional logging library.
4.  **Step 4**: **The Test**: Create a script that uses Monolog's `pushHandler(new StreamHandler('app.log'))` to write a single "Hello World" log message.
5.  **Step 5**: Verify the `app.log` file was created and contains the message in a professional format.

## 🔍 Discussion Questions
- Why is it safer to use a well-tested library like "Monolog" instead of writing your own file logging?
- What is the difference between `composer.json` and `composer.lock`? Why should you NEVER edit the `.lock` file manually?
