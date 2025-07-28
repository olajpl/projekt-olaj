<?php
session_start();
$settingsFile = __DIR__ . '/printing_config.json';
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
  <h2 class="text-xl font-bold mb-4">🖨️ Drukowanie etykiet</h2>
  <form method="POST" action="save_printing.php">
    <label class="block mb-2">Automatyczne drukowanie</label>
    <select name="auto_print" class="input">
      <option value="1" <?= setting("auto_print") === "1" ? "selected" : "" ?>>Tak</option>
      <option value="0">Nie</option>
    </select>

    <label class="block mt-4 mb-2">Interwał odświeżania (ms)</label>
    <input type="text" name="refresh_interval" value="<?= setting("refresh_interval", "15000") ?>" class="input" value="15000">

    <label class="block mt-4 mb-2">Rozmiar etykiety</label>
    <select name="label_size" class="input">
      <option>35x20</option>
      <option selected>50x30</option>
      <option>70x50</option>
      <option>100x50</option>
    </select>

    <button class="btn btn-primary mt-6">💾 Zapisz</button>
  </form>
</div>
