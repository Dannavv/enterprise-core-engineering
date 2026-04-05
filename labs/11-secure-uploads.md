# Lab 11: Secure File Storage (Sanitization & MIME Validation)
**Objective**: Build a multi-layered defense to stop hackers from uploading a "Shell" (.php file) to your server.

## 💡 The Concept
File uploads are one of the most dangerous entry points. If a user uploads a file named `hack.php` instead of `profile.jpg`, and they "run" it on your server, they own your machine. We defend this by:
1.  **Extension Whitelist**: Only allow `.jpg`, `.png`, and `.pdf`.
2.  **Basename Sanitization**: Rename the file (e.g. `user_123.jpg`) instead of the user's original name.
3.  **MIME Check**: Use `getimagesize()` or `finfo` to check if the file is *actually* an image, or just a text file with a `.jpg` extension.

## 🛠 The Task
Create a secure "Document Uploader" with these filters:
1.  **Backend (upload.php)**: 
    - Check the original file extension.
    - Use `basename()` and `preg_replace()` to remove any weird characters.
    - Use `move_uploaded_file()` only if ALL security checks pass.
    - Create a hidden folder named `uploads/` (outside the web root if possible). 
2.  **The Test**: Try to upload a `.txt` file renamed to `.png`. Your script should catch it!

## 🔍 Discussion Questions
- If a user uploads `my..file.php.png`, why is it dangerous depending on your server settings?
- Why do we rename the files ourselves instead of using the victim's name?
- What would `chmod 777 uploads/` do to your security, and what should we use instead?

---
🚀 **[Check the Solution & Explanation](../solutions/11-secure-uploads/solution_explanation.md)**
