# Olaj.pl V4 – Struktura Projektu

Ten projekt zawiera system sprzedaży live i zarządzania zamówieniami. Poniżej opis struktury plików i katalogów w repozytorium:

## 📁 Struktura katalogów

```
/assets/                  → style CSS, JS (frontend)
/chat-widget/            → frontendowy czat klienta (widget)
/classes/                → klasy PHP, np. OrderManager
/clients/                → moduł zarządzania klientami
/config/
  └── config.php         → główny plik połączenia z bazą
  └── config.local.php   → lokalna konfiguracja (ignorowana w .gitignore)
/dashboard/
  └── index.php          → główny panel po zalogowaniu
/docs/                   → changelog, ustalenia, schematy
/includes/
  └── auth.php           → zabezpieczenie stron przez sesję
/messages/               → moduł wiadomości (np. Messenger)
/orders/                 → zamówienia, widoki, zarządzanie
/products/               → produkty, magazyn, etykiety
/settings/               → konfiguracja systemu (drukarki, automatyzacje)
/templates/
  └── default/           → layout systemu (header, footer)
  └── topbar.php         → pasek górny z użytkownikiem
  └── sidebar.php        → menu boczne
/login.php               → logowanie administratora
/index.php               → frontend sklepu lub landing
```

## 🗂 Pliki pomocnicze

- `.gitignore` – ignoruje m.in. `config.local.php`, `vendor/`, `node_modules/`
- `README_DEV.md` – notatki i zasady pracy dla developerów
- `olaj_v4_schema_full.sql` – pełna struktura bazy danych
- `migrations/` – migracje SQL do wersjonowania zmian

## 🔐 Logowanie

- Domyślne konto testowe:
  - Email: `admin@olaj.pl`
  - Hasło: `admin123`
  
  ## Zmiana layoutu panelu admina (28.07.2025)

- Zmieniono styl panelu na jasny (light UI),
- Odchudzono topbar i footer – 50% niższy top, 33% niższy dół,
- Sidebar z jaśniejszym tłem (`#dcdcdc`) i czarnym tekstem,
- Footer przyklejony do dołu ekranu (flexbox),
- Kod CSS zaktualizowany w `assets/styles.css`.

Commit: `Nowy layout panelu admina – jasny motyw, odchudzony topbar i footer`
