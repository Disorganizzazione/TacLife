<?php
    require_once("db_conn.php"); //connessione al database

    $query="SELECT * FROM cicli";//query da eseguire

    if ($pst=$con->prepare($query)){
        $pst->execute();//esecuzione query


        $res=$pst->get_result();
        $result=array();

        while($tmp = $res->fetch_assoc()){
            $result[]=$tmp;
        }
        echo json_encode($result);
    }else {
        echo "errore prepare()";
    }
?>