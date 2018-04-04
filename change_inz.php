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
      <form method="POST">
       <div class="row">       
        <div class="col-md">   
          <h3 class="text-center"><i class="fa fa-cogs"></i>&nbspZměna inzerátu</h3>
          <a><i class="fa fa-question-circle" aria-hidden="true"></i>&nbspKlikněte na to, co si přejete změnit.</a> 
           <hr style="width: 100%; color: black; height: 1px; background-color:#aaa;" />  
        </div>                 
       </div>               

      <div class="row">
        <div class="col-md-2">
         <input class="btn btn-dark" type="submit" id="change_info" name="change_info" value="Změnit základní údaje"> 
        </div>
        &nbsp&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <div class="col-md-2">
         <input class="btn btn-dark" type="submit" id="change_cat" name="change_cat" value="Změnit kategorii"> 
        </div>
        <div class="col-md-4">
         <input class="btn btn-dark" type="submit" id="change_pic" name="change_pic" value="Změnit obrázek"> 
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
       
  if(isset($_POST['change_info'])){
            ?>
            <script>
            window.location.replace('http://student.sspbrno.cz/~duron.zdenek/pcbazar/change_inzerat.php');
            </script>
          <?php
  }
  if(isset($_POST['change_cat'])){
            ?>
            <script>
            window.location.replace('http://student.sspbrno.cz/~duron.zdenek/pcbazar/change_cat.php');
            </script>
          <?php
  }
  if(isset($_POST['change_pic'])){
            ?>
            <script>
            window.location.replace('http://student.sspbrno.cz/~duron.zdenek/pcbazar/change_pic.php');
            </script>
          <?php
  }
  if(isset($_POST['back'])){
  require_once("MySQL.php");
  unset($_SESSION['inzerat_id_change']);
  goProfile();
  }
  
  
?>

</body>
</html>
