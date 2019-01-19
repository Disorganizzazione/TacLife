<?php
 if(isset($_POST['utente']){
    require_once('db_conn.php');

    $expupdate = "UPDATE utenti SET exp = exp + 5 WHERE utente = ?"
    $checkexp = "SELECT exp, privilegi FROM utenti WHERE utente = ?"
    $privilegi = "UPDATE utenti SET privilegi = true, exp = exp + 5 WHERE utente = ?"
    
    if ($pst=$con->prepare($checkexp)){

        $utente-> $_POST['utente'];
        
        $pst->bind_param("s",$utente);// creazione query
        $pst->execute();//esecuzione query

        $pst-> bind_result($exp,$privilegi);

        if($pst->affected_rows == 1){
             if ($privilegi==TRUE){
                 if($exp +5 <=100){
                    if ($pst=$con->prepare($expupdate)){

                        $utente-> $_POST['utente'];
                        
                        $pst->bind_param("s",$utente);// creazione query
                        $pst->execute();//esecuzione query
                    }else{
                        echo "expupdate error"

                    }
                        $pst-> bind_result($exp,$privilegi);
                        
                 }
             }

           

        }else{
            echo "Error: 1" . mysqli_error($con);                
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