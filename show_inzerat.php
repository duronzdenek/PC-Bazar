<?php 
session_start();
?>
<!doctype >
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
  if(empty($_SESSION['logged_id'])){
  include("horni_bar_checked.php");
  }
  else{
  include("horni_bar_logged.php");
  }
  
  if(empty($_SESSION['inzerat_id'])){
  ?>
    <script>
    window.location.replace('http://student.sspbrno.cz/~duron.zdenek/pcbazar/home.php');
    </script>
    <?php 
  }
  require_once("MySQL.php");
  plusOneSeen($conn,$_SESSION['inzerat_id']);
?>                 
 <div class="container">       
      <form action="options.php" method="POST">
       <div class="row">       
        <div class="col-md">   
          <h3 class="text-center"><i class="fa fa-archive"></i>&nbspInzerát</h3> 
         </div>                 
       </div>
      
      <br> 
      <div class="row">      
        <div class="col-md-12">
          <h5><i class="fa fa-file-text" aria-hidden="true"></i>&nbspInformace</h5>
        <hr style="width: 100%; color: black; height: 1px; background-color:#aaa;" /> 
        </div>      
      </div>
       
      <div class="row"> 
        <div class="col-md-6">
          <h5>Název: </h5> <p><?require_once("MySQL.php");echo output($conn,"pcb_inzerat","name",$_SESSION['inzerat_id'])." ";?></p>
        </div>
          <div class="col-md-3">
          <h5>Kategorie: </h5> <p><?require_once("MySQL.php");$x=output($conn,"pcb_inzerat","category",$_SESSION['inzerat_id']);echo categoryChoose($x)." ";?></p>
         </div>
         <div class="col-md-3">
          <h5>Viděné: </h5> <p><?require_once("MySQL.php");echo output($conn,"pcb_inzerat","seen",$_SESSION['inzerat_id']);?></p>
         </div>
      </div>
      <div class="row"> 
        <div class="col-md-6">
          <h5>Popis: </h5> <p><?require_once("MySQL.php");echo output($conn,"pcb_inzerat","description",$_SESSION['inzerat_id'])." ";?></p>
        </div>

        <div class="col-md-6">
          <h5>Obrázek: </h5><img src="<?require_once("MySQL.php");echo output($conn,"pcb_inzerat","path",$_SESSION['inzerat_id'])." ";?>" alt="<?$_SESSION['inzerat_id']?>"class="img-fluid"">
        </div>
      </div>
            <br> 
      <div class="row">      
        <div class="col-md-12">
          <h5><i class="fa fa-file-text" aria-hidden="true"></i>&nbspKontakt</h5>
        <hr style="width: 100%; color: black; height: 1px; background-color:#aaa;" /> 
        </div>      
      </div>
      <div class="row"> 
        <div class="col-md-6">
          <h5>Jméno a příjmení: </h5> 
          <p>
          <?
          require_once("MySQL.php");
          echo output($conn,"pcb_uzivatel","first_name",output($conn,"pcb_inzerat","id_pcb_uzivatel",$_SESSION['inzerat_id']))." ".output($conn,"pcb_uzivatel","last_name",output($conn,"pcb_inzerat","id_pcb_uzivatel",$_SESSION['inzerat_id']));
          ?>
          </p>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
          <h5>E-mailová adresa: </h5><p>
          <?
          require_once("MySQL.php");
          echo output($conn,"pcb_uzivatel","email",output($conn,"pcb_inzerat","id_pcb_uzivatel",$_SESSION['inzerat_id']));
          ?>
          </p>
         </div>
         <div class="col-md-6">
          <h5>Telefonní číslo: </h5><p>
          <?
          require_once("MySQL.php");
          echo output($conn,"pcb_uzivatel","number",output($conn,"pcb_inzerat","id_pcb_uzivatel",$_SESSION['inzerat_id']));
          ?>
          </p>
         </div>
      </div>
        
       </form>      
 </div>                                                                                                                                                                         
    <!-- Optional JavaScript -->                                                                         
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->                       
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>                       
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>                       
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>                                       
  </body>
</html>