<?php
session_start();
$settingsFile = __DIR__ . '/shipping_config.json';
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
  <h2 class="text-xl font-bold mb-4">🚚 Wysyłka</h2>
  <p class="mb-4">Dodaj domyślnych kurierów i stawki:</p>
  <label class="block mb-2">Domyślny kurier</label>
  <select class="input">
    <option>InPost</option>
    <option>DHL</option>
    <option>DPD</option>
  </select>
  <label class="block mt-4 mb-2">Domyślny koszt wysyłki</label>
  <input type="text" class="input" value="14.99">
  <button class="btn btn-primary mt-6">💾 Zapisz</button>
</div>
<div class="mt-6 pt-6 border-t">
  <h3 class="text-lg font-semibold mb-2">🔗 Integracja kurierska (API)</h3>
  <label class="block">Broker kurierski</label>
  <select name="provider" class="input">
    <option value="furgonetka" <?= setting('provider') === 'furgonetka' ? 'selected' : '' ?>>Furgonetka</option>
    <option value="inpost" <?= setting('provider') === 'inpost' ? 'selected' : '' ?>>InPost</option>
    <option value="dhl" <?= setting('provider') === 'dhl' ? 'selected' : '' ?>>DHL</option>
  </select>
  <label class="block mt-2">API Key</label>
  <input type="text" name="api_key" class="input" value="<?= setting('api_key') ?>">
  <label class="block mt-2">Tryb testowy</label>
  <select name="sandbox_mode" class="input">
    <option value="0" <?= setting('sandbox_mode') === '0' ? 'selected' : '' ?>>Nie</option>
    <option value="1" <?= setting('sandbox_mode') === '1' ? 'selected' : '' ?>>Tak</option>
  </select>
  <button class="btn btn-primary mt-4">💾 Zapisz API</button>
</div>
<div class="mt-2">
  <button type="button" class="btn bg-yellow-500 text-white" onclick="testAPI('test_shipping_api.php', this)">🧪 Testuj połączenie z API kuriera</button>
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
