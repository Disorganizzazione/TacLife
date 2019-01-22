<?php
    if (isset($_POST["ciclo"])){
        require_once("db_conn.php");//connessione al database

        $ciclo=$_POST["ciclo"];

        $query = "SELECT esercizio,lavoro,tempo,ripetizione FROM sequenza WHERE ciclo=?" ;//query da eseguire

        if($pst=$con->prepare($query)) {

            $pst->bind_param($ciclo);// creazione query
            $pst->execute();//esecuzione query

            
            $res=$pst->get_result();
            $result=array();
            while($tmp=$res->fetch_assoc()){
                $result[]=$tmp;
            }
            echo json_encode($result);
        }
    }else{
        echo "Error: no post" ;
    }
?>