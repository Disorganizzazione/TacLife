<?php
    if(isset($_POST['utente'])){
        require_once("db_conn.php");
        
        $uten = $_POST['utente'];
        $passwcheck = $_POST['passw'];

        $sql = "SELECT utente, passw, privilegi FROM utenti WHERE utente = ?";
        
        if ($pst=$con->prepare($sql)){

            $pst->bind_param("s",$uten);// creazione query
            $pst->execute();//esecuzione query
            
            $res = $pst->get_result();
            //$result = array(); 
            while($tmp = $res->fetch_assoc()){
            //if($pst->affected_rows != 1){
                //$res["utente"] = $utente;
                //$res["passwd"]= $passwd ;
                //$res["privilegi"]= $privilegi;
            
                if($res['passw'] == $passwcheck){
                   // echo $utente ." - ". $passwd ." - ". $privilegi ."<br>";
                    
                    echo $res;
                }               
                else{
                    echo "password errata";
                }

            //}else{
              //  echo "Error: 1 2 3" . mysqli_error($con);                
            //}
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