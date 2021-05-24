<?php
    if(isset($_COOKIE["idcliente"])){
        header('Location: areaclienti.php');
        exit;
    }

    if (!empty($_POST["username"]) && !empty($_POST["password"]) )
    {
        $conn = mysqli_connect("localhost", "root", "", "progetto") or die(mysqli_error($conn));

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $query = "SELECT codice_cliente, username, password FROM cliente WHERE username='$username'";
    
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;
        if (mysqli_num_rows($res) > 0) {

            $entry = mysqli_fetch_assoc($res);
            if (password_verify($_POST['password'], $entry['password'])) {

                setcookie("idcliente", $entry['codice_cliente']);
                header("Location: areaclienti.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }
        }
        $error = "Username e/o password errati.";
    }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        $error = "Inserisci username e password.";
    }

?>

<html>
    <head>
        <link rel='stylesheet' href='strutturaStandard.css'>
        <link rel='stylesheet' href='menu.css'>
        <link rel='stylesheet' href='login.css'>

        <script src="menu.js" defer ></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Area clienti - Accesso</title>
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

        <section>
            <h1>Inserisci le tue credenziali</h1>
            <form name='login' method='post'>
    
                <div class="username">
                    <div><label for='username'>Nome utente</label></div>
                    <div class="cella"><input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>></div>
                </div>
                <div class="password">
                    <div><label for='password'>Password</label></div>
                    <div class="cella"><input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>></div>
                </div>

                <?php
                if (isset($error)) {
                    echo "<span class='errore'>$error</span>";
                }
                
                ?>

                <div class="accesso">
                    <input type='submit' value="Accedi">
                </div>
            </form>
            <div class="signup">Non hai un account? <a href="signup.php">Iscriviti</a>
        </section>

        <footer>
            SuperStore - Contatti: XXXX</br>
            Powered by Giovanni Traina O4602203
        </footer>

    </body>
</html>