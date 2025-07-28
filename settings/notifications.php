<?php
session_start();
$settingsFile = __DIR__ . '/notifications_config.json';
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
  <h2 class="text-xl font-bold mb-4">🔔 Powiadomienia</h2>
  <p class="mb-4">Wybierz aktywne kanały powiadomień:</p>
  <form>
    <label class="block"><input type="checkbox" checked> Dzwoneczek panelu</label>
    <label class="block"><input type="checkbox" checked> Powiadomienia systemowe</label>
    <label class="block"><input type="checkbox"> E-mail</label>
    <label class="block"><input type="checkbox"> Messenger</label>
    <label class="block"><input type="checkbox"> Push (PWA)</label>
    <button class="btn btn-primary mt-6">💾 Zapisz</button>
  </form>
</div>
<div class="mt-6 pt-6 border-t">
  <h3 class="text-lg font-semibold mb-2">📧 E-mail / SMTP</h3>
  <label class="block">Serwer SMTP</label>
  <input type="text" name="smtp_host" class="input" value="<?= setting('smtp_host') ?>">
  <label class="block mt-2">Port</label>
  <input type="text" name="smtp_port" class="input" value="<?= setting('smtp_port', '587') ?>">
  <label class="block mt-2">Login SMTP</label>
  <input type="text" name="smtp_user" class="input" value="<?= setting('smtp_user') ?>">
  <label class="block mt-2">Hasło SMTP</label>
  <input type="password" name="smtp_pass" class="input" value="<?= setting('smtp_pass') ?>">
  <label class="block mt-2">E-mail nadawcy</label>
  <input type="text" name="from_email" class="input" value="<?= setting('from_email') ?>">
  <button class="btn btn-primary mt-4">💾 Zapisz SMTP</button>
</div>
<div class="mt-2">
  <button type="button" class="btn bg-yellow-500 text-white" onclick="testAPI('test_smtp.php', this)">🧪 Testuj połączenie SMTP</button>
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
