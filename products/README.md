# 📦 Moduł Produktów – Olaj.pl V4

Ten moduł odpowiada za zarządzanie produktami w systemie Olaj.pl V4. Zawiera funkcje do:

- przeglądania i filtrowania listy produktów,
- edycji i dodawania pojedynczego produktu,
- masowego dodawania produktów (ręcznie i z pliku PDF),
- drukowania etykiet dla produktów (automatycznie i z kolejki).

## 📁 Struktura katalogów

```
products/
├── index.php                  # Lista produktów z filtrami, wyszukiwarką i akcjami masowymi
├── edit.php                   # Formularz edycji produktu z zakładkami (ogólne, magazyn, dostawcy)
├── save_product.php           # Backend do zapisu produktu (z opcją drukowania etykiety)
├── bulk_add.php               # Masowe dodawanie produktów (ręczne + PDF)
├── api/
│   ├── bulk_manual_save.php   # Zapis ręcznie dodanych produktów
│   └── parse_invoice.php      # Parser faktur PDF (symulowany)
└── labels/
    ├── print_pending.php      # Lista etykiet oczekujących na druk
    └── mark_printed.php       # Endpoint oznaczający etykiety jako wydrukowane
```

## 🗃️ Wymagane tabele

```sql
CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  code VARCHAR(100) NOT NULL UNIQUE,
  nc12 VARCHAR(100),
  price DECIMAL(10,2),
  vat_rate DECIMAL(5,2) DEFAULT 23.00,
  weight DECIMAL(10,3) DEFAULT 0.000,
  stock INT DEFAULT 0,
  active TINYINT(1) DEFAULT 1,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE product_labels_queue (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_id INT NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE stock_movements (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_id INT NOT NULL,
  type ENUM('przyjęcie','sprzedaż','korekta') NOT NULL,
  quantity INT NOT NULL,
  note TEXT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

## 🖨️ Drukowanie etykiet

- Etykiety trafiają do kolejki (`product_labels_queue`)
- Można je wydrukować z `labels/print_pending.php`
- Po druku oznaczane przez `mark_printed.php`

## ✅ Autor
Moduł przygotowany jako część projektu **Olaj.pl V4**