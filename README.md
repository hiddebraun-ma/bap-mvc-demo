## MVC starter project

Gebruik dit starter project om snel aan de slag te gaan met het leren van het werken in de MVC structuur (model view controller)
Dit project maakt gebruikt van een paar *third party* libraries. Kant en klare *open-source* code van andere developers die je gratis mag gebruiken! Dat scheelt veel uren zelf code schrijven.

## LET OP: eerst dit doen!

Hiervoor moet je PHP en composer op de command line werkend hebben. 
Heb je dat nog niet werkend, [kijk dan eerst op de BAP website](http://bap.mediadeveloper.amsterdam/md1/periode-4/opdrachten/) hoe je dat doet en ga dan pas verder.

### Installeren van externe code via composer
Om die *third party* libraries te installeren heb je een werkende PHP op de command-line nodig en ook het programmatjes *composer*.
Zorg dat je dat eerst hebt geïnstalleerd en voer in de hoofdmap van dit project dan dit commando uit:  

```composer install```

Dit commando installeert alle afhankelijkheden die je hebt ingesteld in het bestand ```composer.json```.
 
---

### Router (SimpleRouter)
De *router* is het onderdeel in de MVC structuur dat alle URL's van je website kent (die stel jij zelf in namelijk) 
Als je een URL intypt in je browser gaat deze als eerste door de router heen.  
De router roept vervolgens de juiste code aan die er bij hoort (de controller) 
Is de URL onbekend, dan wordt de 404 not found pagina getoond.  

Lees de documentatie van de SimpleRouter : https://github.com/skipperbent/simple-php-router#getting-started

---

### Views / Template engine - Plates
Een template engine zorgt voor de *view* of ook wel de *weergave* van je website. Meestal is dit HTML.
Een template engine maakt het makkelijk om stukjes HTML te hergebruiken en om de *gegevens* en *PHP code* te scheiden van de *weergave*.
Zo kun je makkelijker aanpassingen doen aan je website als deze ingewikkelder wordt of aangepast moet worden.
  
Lees de documentatie: [http://platesphp.com/](http://platesphp.com/)
 
 
 