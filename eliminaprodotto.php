<?php
    
    $conn = mysqli_connect("localhost", "root","","progetto") or die(mysqli_error($conn));
    $var = mysqli_real_escape_string($conn,$_GET["q"]);
    $query = "SELECT codice_prodotto from prodotto where nome='".$var."'";
    $res = mysqli_query($conn, $query);
    $entry=mysqli_fetch_assoc($res);
    $codice_prodotto=$entry['codice_prodotto'];
    $idcliente=$_COOKIE["idcliente"];


    $query="DELETE FROM carrello where codice_riga IN(SELECT MIN(codice_riga)FROM carrello where codice_prodotto=$codice_prodotto and codice_cliente=$idcliente GROUP BY codice_prodotto)";
    $res = mysqli_query($conn, $query);
    echo json_encode($res);
   
    mysqli_close($conn);

    exit;
?>