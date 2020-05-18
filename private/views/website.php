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
<header>
    <h1>BuurtBoodschappen</h1>
</header>
<nav>
    <?php echo $this->section('navigation')?>
</nav>
<main>
    <section class="content">
	    <?php echo $this->section('content')?>
    </section>
    <aside>
        <div class="top-10">
	        <?php echo $this->section('sidebar')?>
        </div>
    </aside>
</main>

<footer>
    &copy; 2020
</footer>
</body>
</html>

