<?php
    if(isset($_POST['utente'])){
        require_once("db_conn.php");// connessione al database

        $utente-> $_POST['utente'];
        $passw-> $_POST['passw'];
        $dataN-> $_POST['dataN'];//preparaziione dati

        $query = "INSERT INTO utenti(utente, passw, dataN) VALUES (?,?,?)";//query da eseguire


        if ($pst=$con->prepare($sql)){

            $utente-> $_POST['utente'];
            $passw-> $_POST['passw'];
            $dataN-> $_POST['dataN'];//preparaziione dati

            $pst->bind_param("sss",$utente,$passw,$dataN);// creazione query

            $pst->execute();//esecuzione query

            if($pst->affected_rows == 1){
                echo "evviva" ; 
                

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