<?php
session_start();
?>
<!doctype>
<html lang="en">                             
  <head>                                                 
    <title>PC Bazar                                            
    </title>                                                 
    <!-- Required meta tags -->                                                          
    <meta charset="utf-8">                                                 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">                                                 
    <!-- Bootstrap CSS -->                                                          
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">                             
  </head>
<body>
<?php
  include("horni_bar_logged.php")
?>
                        
    <div class="container">       
      <form action="options.php" method="POST">
       <div class="row">       
        <div class="col-md">   
          <h3 class="text-center"><i class="fa fa-user"></i>&nbspProfil uživatele</h3> 
         </div>                 
       </div>           
      
      <br>    
      <!-- Osobní údaje -->
       <div class="row">      
        <div class="col-md-12">
        <h5><i class="fa fa-user" aria-hidden="true"></i>&nbspOsobní údaje</h5>
        <hr style="width: 100%; color: black; height: 1px; background-color:#aaa;" />   
        </div>      
       </div>      
      
     
      <div class="row"> 
      <div class="col-md-6">
          <h6>Jméno a příjmení:</h6> <p><?require_once("MySQL.php");echo output($conn,"pcb_uzivatel","first_name",$_SESSION['logged_id'])." ";echo output($conn,"pcb_uzivatel","last_name",$_SESSION['logged_id']);?></p>
      </div>
      
      <div class="col-md-6">
           <h6>Přezdívka:</h6>  <p><?require_once("MySQL.php");echo output($conn,"pcb_uzivatel","nickname",$_SESSION['logged_id']);?></p>
      </div>
      </div> 
       
      <br>
      <div class="row">      
        <div class="col-md-12">
        <h5><i class="fa fa-envelope" aria-hidden="true"></i>&nbspKontaktní údaje</h5>
        <hr style="width: 100%; color: black; height: 1px; background-color:#aaa;" />   
        </div>      
      </div>

      <div class="row"> 
        <div class="col-md-6">
          <h6>E-mail:</h6> <p><?require_once("MySQL.php");echo output($conn,"pcb_uzivatel","email",$_SESSION['logged_id']);?></p>
        </div>
      
       <div class="col-md-6">
           <h6>Telefonní číslo:</h6>  <p><?require_once("MySQL.php");echo output($conn,"pcb_uzivatel","number",$_SESSION['logged_id']);?></p>
       </div>
      </div>
      
      <br>
      <div class="row">      
        <div class="col-md-12">
        <h5><i class="fa fa-envelope" aria-hidden="true"></i>&nbspÚdaje o inzerátech</h5>
        <hr style="width: 100%; color: black; height: 1px; background-color:#aaa;" />   
      </div>      
      </div>
       
      <div class="row"> 
        <div class="col-md-6">
          <h6>Počet přidaných inzerátů:</h6> <p><?require_once("MySQL.php");$result=$conn->query("SELECT id FROM pcb_inzerat WHERE id_pcb_uzivatel ='".$_SESSION['logged_id']."'");if(mysqli_num_rows($result)!=NULL){echo mysqli_num_rows($result);}else{echo "0";};?></p>
        </div>
      
       <div class="col-md-6">
           <h6>Počet zobrazení tvých inzerátů</h6>  <p><?seen($conn);?></p>
       </div>
      </div>
      
      
      <br>
      <div class="row">
      <div class="col-md-6">
      <input  class="btn btn-dark" type="submit" name="change_submit"  value="Změnit údaje"> 
      </div>
      </div>
     </form> 
    <br>
      <div class="row">      
        <div class="col-md-12">
        <h5><i class="fa fa-file-text" aria-hidden="true"></i>&nbspAktivní inzeráty</h5>
        <hr style="width: 100%; color: black; height: 1px; background-color:#aaa;" />   
      </div>      
      </div>
      
     <?php
     require_once("MySQL.php");
     $result=$conn->query("SELECT id, name , seen FROM pcb_inzerat WHERE id_pcb_uzivatel ='".$_SESSION['logged_id']."'");
     if(mysqli_num_rows($result)!=NULL)
     {
     echo "<div class='container'>
            <form action='' method='POST'>
            <table class='table'>
              ";
     
     echo "
           <thead class='thead-dark'>
              <tr>
                <th scope='col' colspan='4'>Název</th>
                <th scope='col'>Počet zobrazení</th>
                <th scpoe='col'>Zobrazit inzerát</th>
                <th scpoe='col'>Upravit inzerát</th> 
              </tr>
          </thead>
          <tbody>
          ";
     
     while($row = mysqli_fetch_assoc($result)){ 
        $x="change".$row['id'];
        echo "
              <tr>
                <td colspan='4'>".$row['name']."</td>
                <td>".$row['seen']."</td> 
                <td><input class='btn btn-dark' type='submit' id='".$row['id']."' name='".$row['id']."' value='Přejít na inzerát'></td>
                <td><input class='btn btn-dark' type='submit' id='change".$row['id']."' name='".$x."' value='Upravit inzerát'></td>
              </tr>
          ";
     
      if(isset($_POST[$row['id']])){
        redirect($row['id']);
      }
     if(isset($_POST[$x])){
        redirectChange($row['id']); 
     }
     }
     echo '
          </tbody>
          </table>
          </form>  
          </div>';
     }
     ?>
    
    <br>       
</div>

<?php
if(isset($_POST['show_inzerat'])){
  $num=$_POST['cislo'];   
  $e=count($ech);
  if($e>=$num AND is_numeric($num)){
    $e=$e-$num;
    $x=$ech[$e];
    redirect($x);
  }

}

?>                
    <!-- End_Registrace -->                                                                                                                                                                         
    <!-- Optional JavaScript -->                                                                         
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->                       
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>                       
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js' integrity='sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh' crossorigin='anonymous'></script>                       
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js' integrity='sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ' crossorigin='anonymous'></script>                                       


</body>
</html>
