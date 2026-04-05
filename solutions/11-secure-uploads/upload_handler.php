<?php
/**
 * Secure Upload Handler: The "Bouncer" for Files 🛡️
 */

function handle_upload($file_array) {
    $target_dir = __DIR__ . "/uploads/";
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'pdf'];
    $allowed_mimes      = ['image/jpeg', 'image/png', 'application/pdf'];

    // 1. BASIC CHECK: Did the file actually arrive?
    if ($file_array['error'] !== UPLOAD_ERR_OK) {
        return "❌ Upload Error (Code: {$file_array['error']})";
    }

    // 2. EXTENSION WHITELIST: Get the real extension
    $file_info = pathinfo($file_array['name']);
    $ext = strtolower($file_info['extension']);

    if (!in_array($ext, $allowed_extensions)) {
        return "🚫 FORBIDDEN: Only JPG, PNG, and PDF allowed.";
    }

    // 3. MIME TYPE VALIDATION: Don't trust the extension!
    // A hacker can rename 'shell.php' to 'shell.jpg'.
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $real_mime = $finfo->file($file_array['tmp_name']);

    if (!in_array($real_mime, $allowed_mimes)) {
        return "🚨 SECURITY ALERT: File content does not match its extension! (Actual MIME: $real_mime)";
    }

    // 4. BASENAME SANITIZATION: Rename the file to something secure
    // We remove all original characters and use a unique ID + timestamp.
    $new_filename = "doc_" . time() . "_" . bin2hex(random_bytes(4)) . "." . $ext;
    $final_path = $target_dir . $new_filename;

    // 5. MOVE: Final physical move
    if (move_uploaded_file($file_array['tmp_name'], $final_path)) {
        return "✅ SUCCESS: File saved securely as <b>$new_filename</b>";
    } else {
        return "❌ SYSTEM ERROR: Could not save file. Check folder permissions.";
    }
}
