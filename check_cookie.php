<?php  
    if(isset($_COOKIE["idcliente"])){
        $idcliente=$_COOKIE["idcliente"];
    }
    else{
        $idcliente=0;
    }

    $nomeProdotto=$_GET["q"];

    $array = array("nomeProdotto"=>$nomeProdotto,"idcliente"=>$idcliente);
    echo json_encode($array);
    exit;
?>