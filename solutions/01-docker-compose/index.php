<?php
// Lab 01 Solution: Confirming the Environment is Ready 🚀

echo "<style>
    body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7f6; color: #333; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
    .card { background: #fff; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-left: 5px solid #007bff; text-align: center; }
    h1 { color: #007bff; }
    p { font-size: 1.1rem; }
    .badge { background: #28a745; color: white; padding: 5px 10px; border-radius: 20px; font-size: 0.9rem; }
</style>";

echo "<div class='card'>";
echo "<h1>🚀 ERP Lab 01: Multi-Container Success!</h1>";
echo "<p>The PHP Web Server is up and running on <strong>Port 8081</strong>.</p>";
echo "<div class='badge'>Connected to PHP 8.2-Apache Engine</div>";
echo "<p style='margin-top:20px; font-style:italic;'>Next Step: Connect to the MySQL Database in Lab 02.</p>";
echo "</div>";
?>
