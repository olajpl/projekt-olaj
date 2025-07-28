<?php
session_start();
$settingsFile = __DIR__ . '/invoicing_config.json';
$settings = file_exists($settingsFile) ? json_decode(file_get_contents($settingsFile), true) : [];
function setting($key, $default = '') {
  global $settings;
  return htmlspecialchars($settings[$key] ?? $default);
}
?>
<?php if (!empty($_SESSION['error_message'])): ?>
<div class="bg-red-100 text-red-800 p-2 rounded mb-4"><?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?></div>
<?php endif; ?>

<?php if (!empty($_SESSION['success_message'])): ?>
  <div class="bg-green-100 text-green-800 p-2 rounded mb-4"><?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?></div>
<?php endif; ?>

<div class="bg-white rounded-xl shadow p-6 max-w-3xl">
  <h2 class="text-xl font-bold mb-4">🧾 Integracja z Fakturownią</h2>
  <form method="POST" action="save_invoicing.php">
    <label class="block">Token API</label>
    <input type="text" name="invoice_token" class="input" value="<?= setting('invoice_token') ?>">
    <label class="block mt-2">Domena Fakturowni</label>
    <input type="text" name="invoice_domain" class="input" value="<?= setting('invoice_domain') ?>">
    <label class="block mt-2">Domyślny typ faktury</label>
    <select name="invoice_default_type" class="input">
      <option value="vat" <?= setting('invoice_default_type') === 'vat' ? 'selected' : '' ?>>Faktura VAT</option>
      <option value="paragon" <?= setting('invoice_default_type') === 'paragon' ? 'selected' : '' ?>>Paragon</option>
    </select>
    <button class="btn btn-primary mt-4">💾 Zapisz fakturowanie</button>
  </form>
</div>

<div class="mt-2">
  <button type="button" class="btn bg-yellow-500 text-white" onclick="testAPI('test_invoicing.php', this)">🧪 Testuj połączenie z Fakturownią</button>
  <div class="text-sm mt-1 result-box text-gray-700"></div>
</div>
<script>
function testAPI(endpoint, btn) {
  const result = btn.nextElementSibling;
  result.textContent = '⏳ Testuję...';
  fetch(endpoint)
    .then(res => res.json())
    .then(data => {
      result.textContent = data.status || data.error || '❌ Nieznany błąd';
    })
    .catch(() => {
      result.textContent = '❌ Błąd połączenia.';
    });
}
</script>
