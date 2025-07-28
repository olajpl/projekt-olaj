<h1>Masowe dodawanie produktów</h1>
<form action="api/bulk_manual_save.php" method="POST">
  <input name="name[]">
  <input name="code[]">
  <button type="submit">Zapisz</button>
</form>
<form action="api/parse_invoice.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="invoice">
  <button type="submit">PDF</button>
</form>