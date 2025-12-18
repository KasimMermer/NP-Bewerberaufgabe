# Code of Conduct

## Git

### Branches

Die Branches sollten nach dem [Gitflow Workflow](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow) benannt werden.

```
- main - Produktionsbereit
- dev - Integration aller Features
- feature/xyz - Neue Features
- hotfix/xyz - Kritische Fehlerbehebungen
- fix/xyz - Kleinere Fehlerbehebungen
- experiment/xyz - Experimentelle Features
- docs/xyz - Dokumentationsänderungen
- version/xyz - Versionsänderungen
- release/xyz - Vorbereitung auf einen neuen Release
- chore/xyz - Wartungsarbeiten
- test/xyz - Testbezogene Änderungen
- refactor/xyz - Code-Refaktorisierungen
- style/xyz - Code-Stiländerungen
```

Es dürfen KEINE Direkt-Commits auf den `main` und `dev` Branches gemacht werden. Alle Änderungen müssen über Pull Requests erfolgen!

### Commits

Die Commit-Nachrichten sollten klar und prägnant sein und den Zweck der Änderung deutlich machen. Verwenden Sie die imperative Form (z.B. "Füge Feature hinzu" statt "Feature hinzugefügt").
Sie folgen einem standardisierten Format: `<Art>: <Kurze Beschreibung>`
Arten können sein:

```
- feat: Neue Funktionalität
- fix: Fehlerbehebung
- docs: Dokumentationsänderungen
- style: Code-Stiländerungen (Formatierung, Leerzeichen, etc.)
- refactor: Code-Refaktorisierungen
- test: Hinzufügen oder Ändern von Tests
- chore: Wartungsarbeiten (Build-Prozess, Abhängigkeiten, etc.)
- version: Versionsänderungen
```

Die Commits sollten so atomar wie möglich sein, d.h. jeder Commit sollte nur eine Änderung oder ein Anliegen behandeln.

## Versioning

Alle commits sollten den [Conventional Commits](https://www.conventionalcommits.org/en/v1.0.0/) folgen und können durch [Semantic Commits](https://gist.github.com/joshbuchea/6f47e86d2510bce28f8e7f42ae84c716) erweitert werden.

Die Versionsnummerierung folgt dem [Semantic Versioning](https://semver.org/lang/de/) Schema: `MAJOR.MINOR.PATCH-PRERELEASE`

```
- MAJOR: Inkompatible API-Änderungen
- MINOR: Abwärtskompatible neue Funktionen
- PATCH: Abwärtskompatible Fehlerbehebungen
- PRERELEASE: Vorabversionen (z.B. alpha, beta, rc)
```

Beispiele:

```
- 1.0.0 - Erste stabile Version
- 1.1.0 - Neue Funktionen hinzugefügt
- 1.1.1 - Fehlerbehebungen
- 2.0.0-alpha - Erste Alpha-Version der nächsten Hauptversion
```

Die Version muss auch unbedingt in der Plugin-Datei aktualisiert werden.

- Wordpress Plugin Header
- die Konstante `PLUGIN_NAME_VERSION`

## Code Style

### Formatierung

Der Code sollte einem einheitlichen Stil folgen, um die Lesbarkeit und Wartbarkeit zu verbessern.

Verwendet werden sollte [PHP CodeSniffer](https://github.com/PHPCSStandards/PHP_CodeSniffer/) und [PHP CS Fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer), um den Code automatisch zu formatieren und sicherzustellen, dass er den festgelegten Standards entspricht.
Zusätzlich sollte [WP Coding Standards](https://github.com/WordPress/WordPress-Coding-Standards) verwendet werden, um sicherzustellen, dass der Code den WordPress-spezifischen Standards entspricht.

Es gibt für alle gängigen IDEs Plugins, die diese Tools integrieren und automatisch beim Speichern ausführen können.

### Code Struktur

Die Plugin Root-Datei sollte nur die notwendigsten Includes und Initialisierungen enthalten.
Sämtliche Logik sollte in separaten Klassen und Dateien organisiert werden, um die Wartbarkeit zu verbessern.
Diese Klassen sollten in einem eigenen Verzeichnis (z.B. `src/` oder `includes/`) abgelegt werden.

## Lokale Entwicklungsumgebung

### Versionen & Tools

Es wird empfohlen, eine lokale Entwicklungsumgebung mit [Local by Flywheel](https://localwp.com/) oder anderen Tools einzurichten, um das Plugin zu testen und zu entwickeln.
Bei Ninjapiraten nutzen wir Local.

Die Entwicklungs umgebung sollte eine aktuelle Version von WordPress und WooCommerce enthalten, um sicherzustellen, dass das Plugin mit den neuesten Versionen kompatibel ist.
(Stand 17.12.2026: WordPress 6.9, WooCommerce 10.4)

Die PHP-Version sollte mindestens 8.0 sein und als Server sollte Apache oder Nginx verwendet werden.

Die verwendete IDE kann an sich frei gewählt werden, wir empfehlen jedoch VSCode oder NeoVim mit entsprechenden Plugins für PHP, WordPress und WooCommerce Entwicklung.
Für VSCode und NeoVim können auch vorgefertigte Konfigurationsdateien genutzt werden, um die Einrichtung zu erleichtern.

# Die Aufgabe

## Kontext

Du entwickelst ein Plugin namens “NP Shipping Note & Gift Wrap” für WooCommerce.

## Funktionsumfang

### 1) Checkout-Erweiterung (PHP + HTML)

Im WooCommerce-Checkout sollen zwei neue Eingabefelder erscheinen:

- Geschenkkartentext (Textarea, optional, max. 500 Zeichen)
- Geschenkverpackung (Checkbox, optional)
  - Wenn aktiv: +4,99 € als zusätzliche Position (Fee) im Warenkorb/Checkout

#### Anforderungen

- Felder müssen sauber in den Checkout integriert werden (WooCommerce Hooks).
- Daten müssen serverseitig validiert/sanitized gespeichert werden.

### 2) Daten speichern & anzeigen (PHP)

- Die Werte sollen bei Bestellung gespeichert werden. (order meta)
- Anzeige:
  - Im WooCommerce-Admin in der Bestellansicht (Order Edit Screen)
  - In den Bestell-E-Mails (z. B. unterhalb der Kundendetails)
  - Optional: im „Mein Konto“ Bereich in der Bestellansicht

### 3) UI/UX (JS + CSS)

- Geschenkverpackung: Wenn Checkbox aktiv ist, soll direkt unterhalb eine kurze Info erscheinen:
  - „Geschenkverpackung wird mit 4,99 € berechnet.“
- Zeichen-Zähler für Lieferhinweis (z. B. „120/500“), live aktualisiert.
- Kleine, unaufdringliche Styles (CSS) für Zähler/Info.

### Anforderungen

- JS/CSS sauber enqueue’n (nicht inline im Template).
- Kein jQuery-Zwang (Vanilla JS reicht; jQuery ist ok, wenn begründet).

### 4) Git & Code-Qualität

- Abgabe als Git-Repository.
- Erwartet wird ein sinnvoller Verlauf:
  - Initialer Plugin-Skeleton-Commit
  - Checkout-Felder
  - Speichern/Anzeige
  - JS/CSS
  - README/Polish
- Einhaltung von WordPress Coding Standards soweit praktikabel.

## Bonus Funktionen

Kein muss, nur wenn Lust und Zeit da ist:

- Plugin-Setting (Admin): Fee-Höhe (Default 4,99 €) konfigurierbar
- i18n: Textdomain + vorbereitete Übersetzbarkeit
- Unit/Integration-Idee: kurze Notiz im README, wie man es testen würde
- Edge Case: Fee nur bei physischen Produkten (nicht bei rein virtuellen Waren)

## Infos zum Start

Als Grundlage für Informationen dient natürlich das [Wordpress Plugin Developer Handbook](https://developer.wordpress.org/plugins/intro/) und das [WooCommerce Plugin Developer Handbook](https://developer.woocommerce.com/docs/).

So ziemlich jedes Problem mit Wordpress wurde schon einmal gelöst und ist mit großer Wahrscheinlichkeit in [StackOverflow](https://stackoverflow.com/) oder im [Wordpress Support Forum](https://wordpress.org/support/forums/) dokumentiert.

Auch KI (wie z.B. ChatGPT) kann und darf bei der Entwicklung helfen, sollte aber nicht blind vertraut werden. Reines Vibecoding führt oft zu schlechten Ergebnissen und wird negativ bewertet.

Viel Erfolg und Spaß bei der Entwicklung!
