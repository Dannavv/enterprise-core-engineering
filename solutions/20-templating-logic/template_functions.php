<?php
/**
 * 🧱 Layout Engine: Separation of Concerns
 * This function handles ONLY the visual display of data.
 */

function render_profile_card($student) {
    ?>
    <div class="profile-card">
        <div class="avatar"><?php echo substr($student['name'], 0, 1); ?></div>
        <h1><?php echo htmlspecialchars($student['name']); ?></h1>
        <span class="roll-id">🆔 Roll No: <?php echo htmlspecialchars($student['roll_no']); ?></span>
        
        <p>Department: <span class="tag"><?php echo htmlspecialchars($student['dept']); ?></span></p>
        
        <div style="margin-top:20px; border-top: 1px solid var(--border); padding-top:15px; font-size: 0.8rem; color: #64748b;">
            Academic Status: 🟢 ACTIVE
        </div>
    </div>
    <?php
}
