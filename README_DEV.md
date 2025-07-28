
# Olaj.pl V4 – Wskazówki developerskie

## 🔄 Zasady modyfikacji bazy danych

1. **Nie edytuj ręcznie pliku `olaj_v4_schema_full.sql`!**
2. Wszystkie zmiany bazy danych zapisuj jako oddzielne pliki SQL w folderze `migrations/`
3. Nazwa pliku powinna zawierać datę i krótki opis np. `2025_07_28_add_color_to_products.sql`
4. Po zmianach zapisz je również w `docs/CHANGELOG.md`

## 📋 Zasady pracy w zespole

- Wszystkie zmiany commituj z jasnym opisem.
- Przed wypchnięciem (push) – sprawdź, czy działa lokalnie.
- Jeśli coś dodajesz (np. nową tabelę, funkcję), opisz ją krótko w README lub changelogu.

## 📦 Struktura katalogów

- `migrations/` – migracje SQL (zmiany bazy)
- `docs/` – ustalenia, changelog
- `config/`, `classes/`, `products/` – główne moduły systemu
