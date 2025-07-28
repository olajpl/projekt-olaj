<?php
session_start();
$settingsFile = __DIR__ . '/security_config.json';
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
  <h2 class="text-xl font-bold mb-4">🛡️ Bezpieczeństwo</h2>
  <label class="block mb-2">Zezwól na autologowanie</label>
  <select class="input">
    <option>Tak</option>
    <option>Nie</option>
  </select>
  <label class="block mt-4 mb-2">Limit prób logowania</label>
  <input type="number" class="input" value="5">
  <button class="btn btn-primary mt-6">💾 Zapisz</button>
</div>
