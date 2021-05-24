<?php
    if(!isset($_COOKIE['idcliente'])){
        header("Location: login.php");
        exit;
    }
?>

<html>

    <head>
        <link rel='stylesheet' href='strutturaStandard.css'>
        <link rel='stylesheet' href='products.css'>
        <link rel='stylesheet' href='menu.css'>
        <link rel='stylesheet' href='areaclienti.css'>
        <script src='areaclienti.js' defer></script>
        <script src='menu.js' defer></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Area clienti</title>
    </head>
    <body>

        <div id="linksMenu" class ="hidden">
            <div id="headerMenu">
                <span>SuperStore</span>
                <span id="X">X</span>
            </div>
            
            <div class='linea'></div>

            <div class="colonnaLinks">
            <a href='home.html'>Homepage</a>
            <div class='linea'></div>
            <a href='products.html'>Prodotti</a>
            <div class='linea'></div>
            <a href='puntivendita.php'>Punti vendita</a>
            <div class='linea'></div>
            <a href='login.php'>Area clienti</a>
            <div class='linea'></div>
            </div>
        </div>

        <header>
            <nav>
                <a href="home.html" id="logo"> SuperStore</div>
                <div id="links">
                    <a href='products.html'>Prodotti</a>
                    <a href='puntivendita.php'>Punti vendita</a>
                    <a href='login.php' class="pulsante">Area clienti</a>
                </div>

                <div id="menu">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </nav>
        </header>

        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>

        <section class="prodotti">
            <h1 id="scritta">Il mio carrello:</h1> 
            <label for="cerca">Cerca:</label><input type='text'>
            <div id="lista"></div>
        </section>
       
        <footer>
            SuperStore - Contatti: XXXX</br>
            Powered by Giovanni Traina O4602203
        </footer>

    </body>
</html>