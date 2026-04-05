<?php
/**
 * Lab 11 Solution: Secure File Uploader 📤
 */

require_once 'upload_handler.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['document'])) {
    $message = handle_upload($_FILES['document']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 11: Secure Uploads</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f1f5f9; padding: 50px; display: flex; flex-direction: column; align-items: center; }
        .card { background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 450px; border-top: 6px solid #ef4444; }
        .status { padding: 15px; border-radius: 6px; margin-bottom: 20px; font-weight: bold; background: #eee; }
        .btn { background: #ef4444; color: white; border: none; padding: 12px 24px; border-radius: 6px; cursor: pointer; width: 100%; font-weight: bold; margin-top: 15px; }
        input[type="file"] { margin: 20px 0; display: block; }
    </style>
</head>
<body>

    <div class="card">
        <h1>📤 Secure Document Portal</h1>
        <p>Upload your student identity document (JPG or PDF only).</p>

        <?php if ($message): ?>
            <div class="status"><?php echo $message; ?></div>
        <?php endif; ?>

        <form method="POST" action="" enctype="multipart/form-data">
            <input type="file" name="document" required>
            <button type="submit" class="btn">Upload Securely</button>
        </form>

        <div style="font-size: 0.8rem; margin-top: 20px; color: #64748b; border-top: 1px solid #e2e8f0; padding-top: 15px;">
            <strong>Lab Test:</strong> Try to upload a <code>.txt</code> file and see it get blocked by the extension check. Then rename it to <code>.png</code> and see it get blocked by the <strong>MIME check</strong>!
        </div>
    </div>

</body>
</html>
