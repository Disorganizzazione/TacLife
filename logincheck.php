<?php
    if(isset($_POST['utente'])){
        require_once('db_conn.php');
        
        $sql = "SELECT utente, passwd, privilegi FROM utenti WHERE  utente=?";
        
        if ($pst=$con->prepare($sql)){

            $utente-> $_POST['utente'];
            $passwd-> $_POST['passw'];//preparazione dati
            

            $pst->bind_param("s",$utente);// creazione query

            $pst->execute();//esecuzione query

            $pst-> bind_result($utente, $passw, $privilegi);
            
            if($pst->affected_rows == 1){
                $result->utente = $utente;
                $result->passwd = $passw ;
                $result->privilegi = $privilegi;
            
                if($passwd == $passw){
                    echo json_encode($result);
                }               
                else{
                    echo "Error: 0";
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