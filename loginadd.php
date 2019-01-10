<?php
    if(isset($_POST['utente']))}{
        require_once("db_conn.php");// connessione al database

        $query = "insert into 'utenti'('utente', 'passw', 'dataN') values (?,?,?)";


        if ($pst=$con->prepare($sql)){

            $utente-> $_POST['utente'];
            $passw-> $_POST['passw'];
            $dataN-> $_POST['dataN'];//preparaziione dati

            $pst->bind_param("sss",$utente,$passw,$dataN);// creazione query

            $pst->execute();//esecuzione query

            if($pst->affected_rows == 1){
                echo 1 ;
                

            }else{
                echo "error: " . mysqli_error($con);                
            }

            $pst->close();//chiude lo statement
            mysqli_close($con);//chiude la connessione
            
        }else{
            echo "error: " . mysqli_error($con);                    
        }
    }else{
        echo "error: " . mysqli_error($con);                      
    }

?>