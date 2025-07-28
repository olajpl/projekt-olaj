<?php
session_start();
$settingsFile = __DIR__ . '/automation_config.json';
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
  <h2 class="text-xl font-bold mb-4">🤖 Automatyzacje</h2>
  <p>Wybierz szablony odpowiedzi na komentarze klientów:</p>
  <textarea class="input mt-2" rows="5">Dziękujemy za komentarz! Produkt został dodany do Twojego koszyka.</textarea>
  <button class="btn btn-primary mt-6">💾 Zapisz</button>
</div>
<div class="mt-6 pt-6 border-t">
  <h3 class="text-lg font-semibold mb-2">🧠 Asystent AI / Analiza komentarzy</h3>
  <label class="block">Włącz analizę AI</label>
  <select name="ai_enabled" class="input">
    <option value="1" <?= setting('ai_enabled') === '1' ? 'selected' : '' ?>>Tak</option>
    <option value="0" <?= setting('ai_enabled') === '0' ? 'selected' : '' ?>>Nie</option>
  </select>
  <label class="block mt-2">Model AI</label>
  <select name="gpt_model" class="input">
    <option value="gpt-4" <?= setting('gpt_model') === 'gpt-4' ? 'selected' : '' ?>>GPT-4</option>
    <option value="llama3" <?= setting('gpt_model') === 'llama3' ? 'selected' : '' ?>>LLaMA 3</option>
  </select>
  <label class="block mt-2">Częstotliwość raportu</label>
  <select name="raport_interval" class="input">
    <option value="live" <?= setting('raport_interval') === 'live' ? 'selected' : '' ?>>Po transmisji</option>
    <option value="daily" <?= setting('raport_interval') === 'daily' ? 'selected' : '' ?>>Codziennie</option>
    <option value="weekly" <?= setting('raport_interval') === 'weekly' ? 'selected' : '' ?>>Co tydzień</option>
  </select>
  <button class="btn btn-primary mt-4">💾 Zapisz AI</button>
</div>