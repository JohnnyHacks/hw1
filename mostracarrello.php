<?php
    header('Content-Type: application/json'); 

    $conn = mysqli_connect("localhost", "root", "", "progetto") or die("Errore: ".mysqli_connect_error());

    $idcliente=$_COOKIE["idcliente"];
    $query= "SELECT  count(p.nome) as numero,p.codice_prodotto, p.nome, p.quantita, p.prezzo, p.immagine 
    FROM prodotto p join carrello c on c.codice_prodotto=p.codice_prodotto
    where c.codice_cliente=$idcliente and p.supermercato in (select min(supermercato) from prodotto where p.nome=nome)
    group by p.nome";
    $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));

    $new_array=array();
  
    while($row = mysqli_fetch_object($res)){
        $new_array[]=array("nome"=> $row->nome, "quantita"=> $row->quantita, "prezzo"=> $row->prezzo, "immagine"=> $row->immagine, "numero"=> $row->numero);
    }

    echo json_encode($new_array);
    exit;
?>
