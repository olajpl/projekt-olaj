<?php require_once __DIR__ . '/../includes/auth.php'; ?>
<h1>Edycja produktu</h1>
<form action="save_product.php" method="POST">
  <input name="name">
  <input name="code">
  <input type="checkbox" name="print_label"> Drukuj etykietę
  <button type="submit">Zapisz</button>
</form>