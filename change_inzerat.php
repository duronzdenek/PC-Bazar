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
include("horni_bar_logged.php");
include_once("MySQL.php");
$id=output($conn,"pcb_inzerat","id_pcb_uzivatel",$_SESSION['inzerat_id_change']);

if($_SESSION['inzerat_id_change']==$id){
          ?>
            <script>
            window.location.replace('http://student.sspbrno.cz/~duron.zdenek/pcbazar/home.php');
            </script>
          <?php
}

?>                  
    <!-- Nastavení -->       
    <div class="container">       
      <form action="" method="POST">
       <div class="row">       
        <div class="col-md">   
          <h3 class="text-center"><i class="fa fa-cogs"></i>&nbspZměna inzerátu</h3>
          <a><i class="fa fa-question-circle" aria-hidden="true"></i>&nbspUveďte údaje, které si přejete změnit. Ostatní nechte nevyplněné.</a> 
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
          <div class="input-group">         
            <span class="input-group-addon" id="name">Změnit název</span>          
            <input type="text" class="form-control" maxlength="20" aria-describedby="name" id="name" name="name"  value=<?if(isset($_POST['name'])?$_POST['name']:"")?>>        
          </div>      
        </div>
                     
     </div> 
    
     <br>
     <div class="row">      
        
        <div class="col-md-3">       
          <div class="input-group">         
          
            <span class="input-group-addon" id="price">Cena</span>                
            <input type="text" class="form-control" maxlength="30" aria-describedby="price" id="price" name="price" value=<?if(isset($_POST['price'])){echo $_POST['price'];}?>>        
            
          </div>      
        </div>
     </div>
           <div class="row">      
        <div class="col-lr-5">
          <p> &nbsp&nbsp&nbsp<i class="fa fa-question-circle" aria-hidden="true"></i>&nbspCenu uvádějte v Kč.</p>
        </div>      
      </div>
      
           
     <?php
     if(isset($_POST['submit_change'])){
     extract($_POST);
     
     
     if(is_numeric($price)==false){
           echo "
                  <div class='row'>
                  <div class='col-md-6'>
                  <div class='alert alert-danger'>Uvádějte jen číslo.</div>
                  </div>
                  </div>";
          }
          
    }
          ?>
     <br>
      <div class="row">
        &nbsp&nbsp&nbsp
        <div class="col-xs-1">      
        <span class="input-group-addon" id="popis"for="popis">Popis</span>
        </div>
        <div class="col-md-10">
        <textarea class="form-control" rows="5" id="popis" name="popis" maxlength="1000"><?if(isset($_POST['popis'])){echo $_POST['popis'];}?></textarea>     
        </div>
      </div>
      
      <br>
      

      <div class="row">
        <div class="col-md-2">
         <input class="btn btn-dark" type="submit" id="submit_change" name="submit_change" value="Změnit údaje"> 
        </div>
        <div class="col-md-2">
         <input class="btn btn-dark" type="submit" id="back" name="back" value="Zpět na profil"> 
        </div>
      </div>
     </form>   
    </div>                                                                                                                                                                                        
    <!-- Optional JavaScript -->                                                                         
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->                       
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>                       
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>                       
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>                                       

<?php 
       
  if(isset($_POST['submit_change'])){
   require_once "MySQL.php";
      extract($_POST);
      if(is_numeric($price)==true){
        if(!empty($name)){
          input($conn,"pcb_inzerat","name",$name,$_SESSION['inzerat_id_change']);   
        }
        if(!empty($popis)){
          input($conn,"pcb_inzerat","description",$popis,$_SESSION['inzerat_id_change']);
        }
        if(!empty($price)){
          input($conn,"pcb_inzerat","price",$price,$_SESSION['inzerat_id_change']);
        }
      }     
     $red=$_SESSION['inzerat_id_change'];
     unset($_SESSION['inzerat_id_change']);
     redirect($red);      
    }
   if(isset($_POST['back'])){
    require_once("MySQL.php");
    unset($_SESSION['inzerat_id_change']);
    goProfile();
   }
?>

</body>
</html>
