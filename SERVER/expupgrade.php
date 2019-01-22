<?php
 if(isset($_POST['utente'])){

    require_once('db_conn.php');

    $expupdate = "UPDATE utenti SET exp = exp + 5 WHERE utente = ?";
    $checkexp = "SELECT exp, privilegi FROM utenti WHERE utente = ?";
    $privilegi = "UPDATE utenti SET privilegi = true, exp = exp + 5 WHERE utente = ?";
    
    if ($pst=$con->prepare($checkexp)){

        $utente-> $_POST['utente'];
        
        $pst->bind_param("s",$utente);// creazione query
        $pst->execute();//esecuzione query

        $res = $pst-> get_result();
        while($tmp= $res->fetch() ){
            if ($tmp["privilegi"]==1){
                if( tmp["exp"] + 5 < 100){
                    if ($pst=$con->prepare($expupdate)){

                        $utente-> $_POST['utente'];
                        
                        $pst->bind_param("s",$utente);// creazione query
                        $pst->execute();//esecuzione query
                        echo "ok";
                    }else{
                        echo "expupdate error";
                    } 

                }else{
                    if ($pst=$con->prepare($privilegi)){

                        $utente-> $_POST['utente'];
                        
                        $pst->bind_param("s",$utente);// creazione query
                        $pst->execute();//esecuzione query
                        echo "ok" ;
                    }else{
                        echo "privilegi error";
                    }
                }    
            }
    
        }

        $pst->close();//chiude lo statement
        mysqli_close($con);//chiude la connessione
        
    }else{
        echo "error: 2" . mysqli_error($con);                    
    }
}else{
    echo "error: 3" . mysqli_error($con);                      
}
?>