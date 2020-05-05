<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <link rel="stylesheet" href="<?php echo site_url( '/css/style.css' ) ?>" media="all">
</head>
<body>
<header><h1>Homepage</h1></header>
<main>
    <p>
        Welkom op de homepage
    </p>
    <p>
        Je ziet deze pagina omdat:
        <ol>
        <li>Alle URLs naar index.php (in de public folder) worden omgeleid. Dit is de Front Controller.</li>
        <li>De Router in index.php probeert nu de opgevraagde URL te "matchen" in de lijst met URL's die je hebt ingesteld (in private/routes.php)</li>
        <li>De URL is gematched en de router weet nu dat de functie home() in de class WebsiteController moet worden opgeroepen.</li>
        <li>In private/routes.php staat namelijk bij de route: 'WebsiteController@home', dus wordt de functie home aangeroepen in de WebsiteController.</li>
        <li>De home() functie in de WebsiteController class neemt de uitvoer over en maakt gebruik van de template engine.</li>
        <li>De template: 'homepage' (in de private/views map) wordt ingeladen  (de .php extentie mag je hierbij weglaten)</li>
    </ol>

    </p>
</main>

<footer>
    &copy; <?php echo date( 'Y' ) ?>
</footer>
</body>
</html>

