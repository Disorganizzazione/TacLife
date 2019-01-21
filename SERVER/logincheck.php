<?php
    if(isset($_POST['utente'])){
        require_once("db_conn.php");
        
        $sql = "SELECT utente, passw, privilegi FROM utenti WHERE  utente = ?";
        
        if ($pst=$con->prepare($sql)){

            $utente = $_POST['utente'];
            $passwcheck = $_POST['passw'];
            

            $pst->bind_param("s",$utente);// creazione query
            $pst->execute();//esecuzione query
            
			$pst-> bind_result($utent, $passwd, $privilegi);
            
            if($pst->affected_rows != 1){
                
                $result->utente = $utent;
                $result->passw = $passwd ;
                $result->privilegi = $privilegi;
            
                if($passwd == $passw){
                    echo json_encode($utent,$passwd,$privilegi);
                }               
                else{
                    echo "password errata";
                }

            }else{
                echo "Error: 1 2 3" . mysqli_error($con);                
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