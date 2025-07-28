<?php
session_start();
require_once __DIR__ . '/config/config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($email && $password) {
        $pdo = getPDO();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            header("Location: dashboard.php");
            exit;
        } else {
            $error = 'Nieprawidłowy email lub hasło.';
        }
    } else {
        $error = 'Uzupełnij wszystkie pola.';
    }
}
?>
<?php include 'templates/default/header.php'; ?>

<h2>Logowanie</h2>
<form method="post">
    <input name="email" placeholder="Email" type="email" required>
    <input name="password" placeholder="Hasło" type="password" required>
    <button type="submit">Zaloguj</button>
    <?php if ($error): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
</form>

<?php include 'templates/default/footer.php'; ?>
