<?php
require_once __DIR__ . '/config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $newPassword = trim($_POST['password']);
    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user) {
        echo "❌ Użytkownik o podanym emailu nie istnieje.";
    } else {
        $hash = password_hash($newPassword, PASSWORD_DEFAULT);
        $update = $pdo->prepare("UPDATE users SET password = ? WHERE email = ?");
        $update->execute([$hash, $email]);
        echo "✅ Hasło zaktualizowane dla użytkownika: " . htmlspecialchars($email);
    }
}
?>

<h2>Aktualizuj hasło użytkownika</h2>
<form method="post">
    <input name="email" type="email" placeholder="Email" required>
    <input name="password" type="text" placeholder="Nowe hasło" required>
    <button type="submit">Aktualizuj</button>
</form>