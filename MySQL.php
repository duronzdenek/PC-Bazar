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
    
    function categoryChoose($x){
      switch ($x) {
      case 1:
         return "Stolní Počítač";
          break;
      case 2:
         return "Notebook";
         break;
      case 3:
         return "Základní deska";
         break;
      case 4:
         return "Jiné";
         break;
      case 5:
         return "Procesor";
         break;
      case 6:
         return "Operační Paměť";
         break;
      case 7:
         return "Grafická karta";
         break;
      case 8:
         return "Pevný disk";
         break;
      case 9:
         return "Mechanika";
         break;
      case 10:
         return "PC skříň";
         break;
      case 11:
         return "Zdroj";
         break;
      case 12:
         return "Jiná počítačová komponenta";
         break;
      case 13:
         return "Monitor";
         break;
      case 14:
         return "Myš";
         break;
      case 15:
         return "Klávesnice";
         break;
      case 16:
         return "Sluchátka";
         break;
      case 17:
         return "Reproduktory";
         break;
      case 18:
         return "Mikrofón";
         break;
      case 19:
         return "Webkamera";
         break;
      case 20:
         return "Externí disk";
         break;
      case 21:
         return "Tiskárna";
         break;
      case 22:
         return "Záložní zdroj";
         break;
      case 23:
         return "Jiný počítačový doplněk";
         break;
      }
    }
    
    function redirect($id){
    $_SESSION['inzerat_id']=$id;
    ?>
    <script>
    window.location.replace('http://student.sspbrno.cz/~duron.zdenek/pcbazar/show_inzerat.php');
    </script>
    <?php 
    
    }
    
    function redirectChange($id){
    $_SESSION['inzerat_id_change']=$id;
    ?>
    <script>
    window.location.replace('http://student.sspbrno.cz/~duron.zdenek/pcbazar/change_inz.php');
    </script>
    <?php 
    }
    
    function output($conn,$table,$output,$what){
        $sql="SELECT ".$output." FROM ".$table." WHERE id ='".$what."'";
        $kvery = $conn->query($sql);
        $row = $kvery->fetch_array();
        return $row[$output];
    }
    
    
    function input($conn,$table,$col,$value,$id){
        $sql="UPDATE ".$table." SET ".$col."='".$value."' WHERE id ='".$id."'";
        return $conn->query($sql);
    }
    
    function goProfile(){
        ?>
    <script>
    window.location.replace('http://student.sspbrno.cz/~duron.zdenek/pcbazar/profile.php');
    </script>
    <?php
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
    
    function plusOneSeen($conn,$id){
      $seen=output($conn,"pcb_inzerat","seen",$id);
      $seen=$seen+1;
      $sql="UPDATE pcb_inzerat SET seen=".$seen." WHERE id=".$id;
      $kvery = $conn->query($sql);
    
    }
    
   
  
  function destruct() { 
    /* 6. Ukončení spojení */
    $conn->close();
  }	
		
?>
