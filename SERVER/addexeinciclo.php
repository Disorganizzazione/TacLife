<?php
    if (isset($_POST["ciclo"])){
        require_once("db_conn.php");//connessione al database

        $ciclo=$_POST["ciclo"];
        $esercizio=$_POST["esercizio"];
        $lavoro=$_POST["lavoro"];
        $pausa=$_POST["pausa"];
        $ripetizioni=$_POST["ripetizioni"];


        $query="INSERT INTO cicli(ciclo,esercizio,lavoro,pausa,ripetizioni) VALUES(?,?,?,?,?)";//query da eseguire

        if($pst=$con->prepare($query)){
            $pst->bind_param("iiiii",$ciclo,$esercizio,$lavoro,$pausa,$ripetizioni);// creazione query
            $pst->execute();//esecuzione query

            echo "1";
        }else{
            echo "Error prepare";
        }
    }else{
        echo "error post";
    }
?>