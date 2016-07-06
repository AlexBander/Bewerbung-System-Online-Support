# Bewerbung-System-Online-Support

Per E-Mail oder Post, dieses System kann als Link per QR-Code oder PDF-Link unnötiges Papier sparen.

> v0.1.0 testing / working : OK!


## Die Idee:

Wie wäre es nur eine Postkarte oder Kurnbewerbung in die Post zu geben ohne diesen giganteischen Stapel an Papier.
Und doch eine vollständige Bewerbung abzugeben.
* Das Problem ist offenkundig, niemand möchte den Papieraufwand oder seine persönlichen Dokumente einfach irgendwo hochladen für jeden Zugänglich.
* E-Mail Anhang: zu groß
* 
> Ärgerlich.

Nun, es gibt eine schicke Lösung um Webseiten Links zu verpacken -> QR-Codes
Und es gibt die möglichkeiten mit PHP.

Aus der Kombination wird eine einfache Option zum übersenden der Information.

* 1. Wie ihr den QR-Code erstellt und in eure Dokumente bekommt, müsst ihr eueren Gegebenheiten anpassen (Online Generator, Desktop-Software, Smartphone oder über TeX).
* 2. Euer Server oder Webspace muss PHP können, dann läuft das auch mit dem bereitstellen der Subseiten.
* 3. Ihr müsst nur noch eure Daten hochladen.

# Was leistet dieses BSO-System?
* Bootstrap als anpassbares und d.Z. aktuelles Design im Web
* Automatisches Anzeigen der Dokumente in einem Ordner
* Automatisces Erstellen von Link zur Fullscreen Anzeige und zum Download
* "Preview" mit Blätter-Funktion
* 

How To:

* 1. git clone https://gitlab... /Ordner   (/Ordner ist optional)
oder
* 2. Download von gitlab und Upload auf deinen Webspace/Server
* 3. Editiere die [config.inc.php](src/config.inc.php), nach deinen Angaben sowie:
>*   Bsp.1:     $link = "bewerbung"; zu **"post"**;
          und/oder
>*   Bsp.2:      $methode="get";   zu **"wert"**;
* 4. Betitle die Datei `bewerbung.php` in `post.php` um
* 5. Dein Link für QR lautet dann -> https://yourwebsite.xy/**post.php**?**wert**=
* 6. Lade nun deinen Ordner (**1**) mit deinen Dokumenten hoch. !Achtung! = In der Version 0.1.0 erscheinen im "Preview" nur PDF Dokumente.
>*   Bsp.3: Ordner Name: **Docs15284564A**   Inhalt: meherer PDFs
* 7. Dein vollständige Link für QR lautet nun https://yourwebsite.xy/**post.php**?**wert**=**Docs15284564A**
* 8. Das System läuft nun. Du bist eigentlich schon Fertig.
* 9. Editiere die **index.php**, about.php und passe ggf. in der impressum.php die Datenschutz etc Daten deinen Wünschen und Vorstellungen an (Impressum: etc. und Button Kontakt musst du nichts weiter machen).
* 10. Schau dir erstmal das Ergebnis auf index.php an, dann auf  **post.php** ? **wert** =**Docs15284564A**
* Fertig.
