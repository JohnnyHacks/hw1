<?php
    header('Content-Type: application/json');   

    $conn = mysqli_connect("localhost", "root", "", "progetto") or die("Errore: ".mysqli_connect_error());

    $query= "SELECT distinct codice_prodotto, nome, quantita, prezzo, immagine FROM prodotto";
    $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));

    $new_array=array();
    while($row = mysqli_fetch_object($res)){
        $new_array[]=array("nome"=> $row->nome, "quantita"=> $row->quantita, "prezzo"=> $row->prezzo, "immagine"=> $row->immagine);
    }

    echo json_encode($new_array);
    exit;
?>