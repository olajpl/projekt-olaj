<?php
require_once __DIR__ . '/../../includes/auth.php';
require_once __DIR__ . '/../../config/config.php';
$pdo = getPDO();
$products = $pdo->query("SELECT * FROM product_labels_queue ORDER BY created_at ASC LIMIT 50")->fetchAll();
foreach ($products as $p) {
  echo "<div style='margin-bottom:10px;border:1px dashed #ccc;padding:10px'>";
  echo "🟨 Etykieta dla produktu ID: " . $p['product_id'];
  echo "</div>";
}
?>
<script>
setTimeout(() => window.print(), 500);
</script>