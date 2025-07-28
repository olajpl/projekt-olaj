<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../templates/default/header.php';

$tab = $_GET['tab'] ?? 'general';
$validTabs = ['general', 'printing', 'notifications', 'facebook', 'security', 'shipping', 'automation', 'theme'];
$tabFile = in_array($tab, $validTabs) ? "$tab.php" : 'general.php';
?>

<div class="main-content">
  <h1 class="text-2xl font-semibold mb-4">⚙️ Ustawienia systemu</h1>

  <ul class="tabs mb-4 flex gap-4 border-b text-sm">
    <li><a href="?tab=general" class="tab <?= $tab === 'general' ? 'active font-bold text-blue-700' : '' ?>">General</a></li>
    <li><a href="?tab=printing" class="tab <?= $tab === 'printing' ? 'active font-bold text-blue-700' : '' ?>">Printing</a></li>
    <li><a href="?tab=notifications" class="tab <?= $tab === 'notifications' ? 'active font-bold text-blue-700' : '' ?>">Notifications</a></li>
    <li><a href="?tab=facebook" class="tab <?= $tab === 'facebook' ? 'active font-bold text-blue-700' : '' ?>">Facebook</a></li>
    <li><a href="?tab=security" class="tab <?= $tab === 'security' ? 'active font-bold text-blue-700' : '' ?>">Security</a></li>
    <li><a href="?tab=shipping" class="tab <?= $tab === 'shipping' ? 'active font-bold text-blue-700' : '' ?>">Shipping</a></li>
    <li><a href="?tab=automation" class="tab <?= $tab === 'automation' ? 'active font-bold text-blue-700' : '' ?>">Automation</a></li>
    <li><a href="?tab=theme" class="tab <?= $tab === 'theme' ? 'active font-bold text-blue-700' : '' ?>">Theme</a></li>
  </ul>

  <?php include $tabFile; ?>
</div>

<?php require_once __DIR__ . '/../templates/default/footer.php'; ?>
