<?php

header('Content-Type: application/json');

//Ricetta random
if($_GET["type"]=="ricetta_random"){
    $url='https://www.themealdb.com/api/json/v1/1/random.php';

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $risultato = curl_exec($ch);
    curl_close($ch);

    echo $risultato;
}


//Valori nutrizionali contenuto
if($_GET["type"]=="valori_nutrizionali"){
    $app_id='83ec4d19';
    $app_key='dbd6eea56a1f5ff8ff21a2403c48126f';

    $prodotto_value = urlencode($_GET["q"]);
    $url='https://api.edamam.com/api/nutrition-data?app_id='.$app_id.'&app_key='.$app_key.'&ingr=1%20'.$prodotto_value;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $risultato = curl_exec($ch);
    curl_close($ch);

    echo $risultato;
}

?>