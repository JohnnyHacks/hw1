<?php
            if($_GET['q']=="supermercato")
            {
                $conn = mysqli_connect("localhost", "root", "", "progetto") or die("Errore: ".mysqli_connect_error());

                $query= "SELECT count(*) as numeroSupermercati, nome as nomeCatena FROM supermercato";
                $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));

                
                $array=array();
                while($row = mysqli_fetch_object($res)){
                    $array=array("numeroSupermercati"=>$row->numeroSupermercati,"nomeCatena"=>$row->nomeCatena);
                }

                $query = "SELECT codice_supermercato as codice, indirizzo, città, telefono, numero_reparti as numeroReparti FROM supermercato";
                $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));

                while($row = mysqli_fetch_object($res)){
                    $array[]=array("codice"=>$row->codice,"indirizzo"=>$row->indirizzo,"città"=>$row->città, "telefono"=>$row->telefono,"numeroReparti"=>$row->numeroReparti);     
                }

                echo json_encode($array);
                mysqli_close($conn);
            }

            if($_GET['q']=="reparto")
            {
                $conn = mysqli_connect("localhost", "root", "", "progetto") or die("Errore: ".mysqli_connect_error());

                $query= "SELECT supermercato, tipologia FROM reparto";
                $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
            
                $array2=array();
                while($row = mysqli_fetch_object($res)){
                    $array2[]=array("codiceSupermercato"=>$row->supermercato, "tipologiaReparto"=>$row->tipologia);
                }

                echo json_encode($array2);
                mysqli_close($conn);
            }
?>