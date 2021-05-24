<?php
     if(isset($_COOKIE["idcliente"])){
         header('Location: areaclienti.php');
         exit;
     } 

    if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["name"]) && 
        !empty($_POST["surname"]))
    {
        $error = array();
        $conn = mysqli_connect("localhost", "root", "", "progetto");

        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
            $error[] = "Username non valido";
        } else {
            $username = mysqli_real_escape_string($conn, $_POST['username']);

            $query = "SELECT username FROM cliente WHERE username = '$username'";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Username già utilizzato";
            }
        }
  
        if (strlen($_POST["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        } 
       
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $res = mysqli_query($conn, "SELECT email FROM cliente WHERE email = '$email'");
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Email già utilizzata";
            }
        }

        if (count($error) == 0) {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $surname = mysqli_real_escape_string($conn, $_POST['surname']);

            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO cliente(nome, cognome, username, password, email) VALUES('$name', '$surname', '$username', '$password','$email')";
            
            if (mysqli_query($conn, $query)) {
                setcookie("idcliente", mysqli_insert_id($conn));
                mysqli_close($conn);
                header("Location: areaclienti.php");
                exit;
            } else {
                $error[] = "Errore di connessione al Database";
            }
        }
        mysqli_close($conn);
    }
    elseif(isset($_POST["username"]) || isset($_POST["password"]) || isset($_POST["email"]) || isset($_POST["name"]) || isset($_POST["surname"])){
        $error = "Inserisci tutte le informazioni";
    }
?>

<html>
    <head>
        <link rel='stylesheet' href='strutturaStandard.css'>
        <link rel='stylesheet' href='menu.css'>
        <link rel='stylesheet' href='login.css'>
        <script src='signup.js' defer></script>
        <script src='menu.js' defer></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Area clienti - Registrazione</title>
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
            <h1>Inserisci le tue informazioni</h1>
            <form name='signup' method='post' enctype="multipart/form-data" autocomplete="off">
                <div class="names">
                    <div class="name">
                        <div><label for='name'>Nome</label></div>
                        <div class="cella"><input type='text' name='name' <?php if(isset($_POST["name"])){echo "value=".$_POST["name"];} ?> ><span>Campo vuoto</span></div>
                    </div>
                    <div class="surname">
                        <div><label for='surname'>Cognome</label></div>
                        <div class="cella"><input type='text' name='surname' <?php if(isset($_POST["surname"])){echo "value=".$_POST["surname"];} ?> ><span>Campo vuoto</span></div>
            
                    </div>
                </div>
                <div class="username">
                    <div><label for='username'>Nome utente</label></div>
                    <div class="cella"><input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>> <span></span></div>
                   
                </div>
                <div class="email">
                    <div><label for='email'>Email</label></div>
                    <div class="cella"><input type='text' name='email' <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>> <span></span></div>
                   
                </div>
                <div class="password">
                    <div><label for='password'>Password</label></div>
                    <div class="cella"><input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>><span>Inserisci almeno 8 caratteri</span></div>
                    
                </div>
                <div class="submit">
                    <input type='submit' value="Registrati" id="submit">
                </div>
            </form>
            
            <?php
                if (isset($error)) {
                    echo "<span class='errore'>$error</span>";
                }
                
                ?>

            <div class="signup">Hai un account? <a href="login.php">Accedi</a>
        </section>

        <footer>
            SuperStore - Contatti: XXXX</br>
            Powered by Giovanni Traina O4602203
        </footer>

    </body>
</html>