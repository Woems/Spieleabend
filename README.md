Spieleabend (noch in der Entwicklung)
=====================================

Dies ist eine Webseite auf der man seine Spielesammlung verwalten kann. Man kann Spiele anlegen, Spiele zur eigenen Sammlung hinzufügen, Spieleabende organisieren und man kann die Ergebnisse dokumentieren.

Installation
------------
```Shell
cp config/config.php.sample config/config.php
vi config/config.php
```
danach einfach die config/Spieleabend.sql importieren.

Verzeichnissstruktur
--------------------
* config - Konfigurationsdateien
* images - Bilder
* libs - Alle PHP Klassen bibliotheken
* templates - HTML Dateien (Jede Seite besteht auf Header, Body, Footer)
* public - Statische Inhalte (z.B: jQuery, Bootstrap)

Git
---
```Shell
# Einmalig GIT Configurieren
git config --global user.name "Your Name"
git config --global user.email e@mail.de

# Clonen
git clone https://github.com/Woems/Spieleabend.git
cd Spieleabend

# Neusten Stand herunterladen
git pull

# Neusten Stand hochladen
git push

# Dateien hinzufügen
git status
git add test.txt   # oder "git add ." um alle Dateien die geändert worden vorzumerken
git commit -m "Test hinzugefügt"  # Vorgemerkte Dateien dem Repository hinzufügen
```
