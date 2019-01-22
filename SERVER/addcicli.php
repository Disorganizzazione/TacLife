<?php
    if (isset($_POST["ciclo"])){
        require_once("db_conn.php");//connessione al database

        $ciclo=$_POST["ciclo"];
        $descr=$_POST["descr"];


        $query="INSERT INTO cicli(ciclo,descr) VALUES(?,?)";//query da eseguire

        if($pst=$con->prepare($query)){
            $pst->bind_param("is",$ciclo,$descr);// creazione query
            $pst->execute();//esecuzione query

            echo "1";
        }else{
            echo "Error prepare";
        }
    }else{
        echo "error post";
    }
?>