<?php
require_once "MySQL_chyby.class.php";
    
    /* 1. vytvoření instance mysqli, sočasně se připojí k serveru a zaktivní databázi */
    require_once "../CONNECT/CONNECT.php";
    $conn = new mysqli($host, $user, $pass, $db) or die("ERROR - Not conected to database");
    /* 2. nastavení, v jakém kódování se mají data z databáze prezentovat */
    $conn->set_charset("UTF8");

    
    function login($conn){
        extract($_POST);
        
        $nickname_check = $conn->query("SELECT nickname FROM pcb_uzivatel WHERE nickname ='".$nickname."'");
      
        if(mysqli_num_rows($nickname_check)){
          $sql="SELECT password FROM  pcb_uzivatel WHERE nickname ='".$nickname."'";
          $kvery = $conn->query($sql);
          $row=$kvery->fetch_array();
          
          if($row['password']==$password){
          $sql_id="SELECT id FROM  pcb_uzivatel WHERE nickname ='".$nickname."'";
          $kvery_id=$conn->query($sql_id);
          $id=$kvery_id->fetch_array();
          $_SESSION['logged_id']=$id['id'];
          
          ?>
             <script>
               window.location.replace('http://student.sspbrno.cz/~duron.zdenek/pcbazar/home.php');
             </script>
          <?php
          }
          else{
             echo   "<br>
                     <div class='row'>
                     <div class='col-md-6'>
                     <div class='alert alert-danger'>Špatně zadané <strong>heslo</strong>.</div>
                     </div>
                     </div>";
          }
          
        }
        else{
            echo  "<br>
                    <div class='row'>
                    <div class='col-md-6'>
                    <div class='alert alert-danger'>Špatně zadaná <strong>přezdívka</strong>.</div>
                    </div>
                    </div>"  ;
        }
        
    }
    
    function output($conn,$table,$output){
    if($table=="pcb_uzivatel"){ 
        $id=$_SESSION['logged_id']; 
        $sql="SELECT ".$output." FROM pcb_uzivatel WHERE id ='".$id."'";
        $kvery = $conn->query($sql);
        $row = $kvery->fetch_array();
        return $row[$output];
      }
    }
    
    
    function input($conn,$table,$col,$value){
        $id=$_SESSION['logged_id']; 
        $sql="UPDATE ".$table." SET ".$col."='".$value."' WHERE id ='".$id."'";
        return $conn->query($sql);
    }
    
    function check($conn,$table,$col,$value){
       $sql = $conn->query("SELECT ".$col." FROM ".$table." WHERE ".$col." ='".$value."'");
       return $sql;
    }
    
    function seen($conn){
        require_once("MySQL.php");
        $result=$conn->query("SELECT id FROM pcb_inzerat WHERE id_pcb_uzivatel ='".$_SESSION['logged_id']."'");
        if(mysqli_num_rows($result)!=NULL){
            $x= mysqli_num_rows($result);
              $seen=$conn->query("SELECT sum(seen) FROM pcb_inzerat WHERE id_pcb_uzivatel='".$_SESSION['logged_id']."'");
              $row=$seen->fetch_array();
              echo $row['sum(seen)'];
        }
        else{
            echo "0";
    }
    }
    
   
  
  function __destruct() { 
    /* 6. Ukončení spojení */
    $conn->close();
  }	
		
?>
