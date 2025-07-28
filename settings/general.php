<?php
session_start();
$settingsFile = __DIR__ . '/settings.json';
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
  <h2 class="text-xl font-bold mb-4">⚙️ Ustawienia ogólne</h2>
  <form method="POST" action="save_general.php">
    <label class="block mb-2">Nazwa systemu</label>
    <input type="text" name="site_name" value="<?= setting("site_name", "Olaj.pl") ?>" class="input" value="Olaj.pl">

    <label class="block mt-4 mb-2">Tryb systemu</label>
    <select name="mode" class="input">
      <option value="prod" <?= setting("mode") === "prod" ? "selected" : "" ?>>Produkcyjny</option>
      <option value="test">Testowy</option>
    </select>

    <label class="block mt-4 mb-2">Strefa czasowa</label>
    <input type="text" name="timezone" value="<?= setting("timezone", "Europe/Warsaw") ?>" class="input" value="Europe/Warsaw">

    <label class="block mt-4 mb-2">Format daty/godziny</label>
    <input type="text" name="datetime_format" value="<?= setting("datetime_format", "Y-m-d H:i") ?>" class="input" value="Y-m-d H:i">

    <label class="block mt-4 mb-2">Domyślny rozmiar etykiety</label>
    <select name="default_label_size" class="input">
      <option value="35x20">35x20</option>
      <option value="50x30" <?= setting("default_label_size") === "50x30" ? "selected" : "" ?>>50x30</option>
      <option value="70x50">70x50</option>
      <option value="100x50">100x50</option>
    </select>

    <label class="block mt-4 mb-2">Interwał powiadomień (ms)</label>
    <input type="text" name="notification_interval" value="<?= setting("notification_interval", "30000") ?>" class="input" value="30000">

    <button class="btn btn-primary mt-6">💾 Zapisz</button>
  </form>
</div>
