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
<?php
if(isset($_SESSION['logged_id'])){
  header('Location: home.php');
}
?>                               
  <body>       
  <?php
   include("horni_bar_checked.php");  
  ?>
    
    <!-- Email_checker-->
    <div class="container">                                     
        <div class="row"">                            
          <div class="col-md-6">      <h4><i class="fa fa-envelope" aria-hidden="true"></i>&nbspKontrola mailové adresy</h4>                            
          </div>
         </div>
         <hr>
         <div class="row">                            
          <p>&nbsp &nbsp Zde zadejte kód, který jsme vám zaslali na emailovou adresu:</p>
          </div>
          <div class="row"> 
          <div class="col-md-4">                                                         
            <input class="form-control mr-sm-2" type="text" placeholder="Kód z emailu.">                           
          </div>                     
          <div class="col-md-2">                       
                        
            <button type="button" class="btn btn-dark" type=submit id="Code_Sent"><i class="fa fa-check" aria-hidden="true"></i>&nbspProvést                          
            </button>                            
          </div>                     
        </div>
        <br>
        <div class="row">
        <div class="col-md-9">
          <p>Proč provádíme kontrolu mailu? Zjišťujeme jen, jestli je vámi zadaný mail funkční.</p>
        </div>
        <div class="col-md-12">
          <button type="submit" class="btn btn-link">Zaslat nový kód? Klikněte zde.</button>  
        </div>
        </div >          
      </div>
      
      <?php
       
       $email=$_SESSION['email'];
       $chars="abcdefghijklmnopqrstuvwxyz0123456789";
       $code = "";  
       for ($i = 0; $i < $length; $i++) {
          $code .= $chars[rand(0,7)];
       }                            
       
       $msg="Dobrý den, váš kód pro registraci na Počítačovém bazaru je: ".$code; 
       mail($email,"PCBazar",$msg);
       
       
       
       
        
      ?>
             
    
          
    <!-- End_Horní Bar -->                  
                                                                                                                                                                          
    <!-- Optional JavaScript -->                                                                         
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->                       
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>                       
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>                       
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>                                       
  </body>
</html>