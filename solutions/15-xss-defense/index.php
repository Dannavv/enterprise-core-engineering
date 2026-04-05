<?php
/**
 * Lab 15 Solution: XSS Defense & Output Sanitization 🛡️
 */

// --- 🕵️ STEP 1: PREPARATION (ATTACKER INPUT) ---
// Imagine this was pulled from a database "User Bio" field.
$attacker_input = "<script>alert('🚨 XSS ATTACK SUCCESSFUL! I can steal your cookies now.'); console.log('Hacked!');</script>";
$hacker_name    = "<b>Arpit</b><img src=x onerror=alert('Image_Attack')>";

// --- 🕵️ STEP 2: THE DEFENSE FUNCTION ---
/**
 * 🛡️ echo_safe: The "Sanitization Shield"
 * We turn sensitive HTML characters into harmless text.
 * < becomes &lt;
 * > becomes &gt;
 * " becomes &quot;
 */
function echo_safe($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 15: XSS Defense</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f1f5f9; padding: 50px; display: flex; flex-direction: column; align-items: center; }
        .container { background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 10px 15px rgba(0,0,0,0.1); width: 700px; border-top: 8px solid #f43f5e; }
        .box { padding: 20px; border-radius: 8px; margin-top: 15px; border: 1px solid #e2e8f0; }
        .vulnerable { background: #fee2e2; border-left: 5px solid #ef4444; }
        .safe { background: #dcfce7; border-left: 5px solid #10b981; }
        h3 { margin-bottom: 5px; }
        code { background: #eee; padding: 2px 4px; border-radius: 4px; }
    </style>
</head>
<body>

    <div class="container">
        <h1>🛡️ Lab 15: XSS (Cross-Site Scripting) Defense</h1>
        <p>In this lab, we test the difference between "Trusting User Input" and "Escaping User Output."</p>

        <!-- 🚩 VULNERABLE SECTION -->
        <div class="box vulnerable">
            <h3>🔴 VULNERABLE DISPLAY (Raw Echo)</h3>
            <p>The code below just does <code>echo \$attacker_input;</code>. If you see an alert box, the hacker won!</p>
            <div style="padding: 10px; background: white; border: 1px dashed red;">
                <!-- UNCOMMENT THE LINE BELOW AT YOUR OWN RISK TO SEE THE ATTACK -->
                <!-- <?php // echo $attacker_input; ?> -->
                <p>(The active attack is commented out in code for safety, but try viewing <code>$hacker_name</code> below if you dare!)</p>
                <?php echo $hacker_name; ?>
            </div>
        </div>

        <!-- ✅ SAFE SECTION -->
        <div class="box safe">
            <h3>🟢 SAFE DISPLAY (Sanitized Output)</h3>
            <p>The code below uses <code>echo_safe(\$attacker_input);</code>. It turns the tags into harmless text.</p>
            <div style="padding: 10px; background: white; border: 1px solid #10b981; font-family: monospace;">
                <?php echo echo_safe($attacker_input); ?>
            </div>
        </div>

        <p style="margin-top: 25px; font-size: 0.9rem; color: #64748b;">
            <strong>Experiment:</strong> Look at the Page Source (Right-click -> View Page Source). 
            Notice how the <code>&lt;script&gt;</code> tags are converted into <code>&amp;lt;script&amp;gt;</code>. 
            The browser shows the text but <strong>refuses to run the logic</strong>.
        </p>
    </div>

</body>
</html>
