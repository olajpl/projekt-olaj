<?php require_once 'includes/auth.php'; ?>
<?php include 'templates/default/header.php'; ?>

<h2>Panel główny</h2>
<p>Witaj, <?= htmlspecialchars($_SESSION['user']['email']) ?>!</p>

<?php include 'templates/default/footer.php'; ?>
