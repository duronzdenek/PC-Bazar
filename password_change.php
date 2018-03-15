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
?>                  
      
    <div class="container">       
      <form action="" method="POST">
      
      
      
      <div class="row">       
        <div class="col-md">   
          <h3 class="text-center"><i class="fa fa-file-text" aria-hidden="true"></i>&nbspZměna hesla</h3>
          <hr style="width: 100%; color: black; height: 1px; background-color:#aaa;" />  
         </div>                 
       </div>  
       
        
      <div class="row">            
        <div class="col-md-6">           
          <div class="input-group">          
            <span class="input-group-addon" id="new_password">Nové heslo</span>          
            <input type="password" class="form-control" maxlength="20" id="new_password" name="new_password">        
          </div>      
        </div>
        
         <div class="col-md-6">           
          <div class="input-group">
            <span class="input-group-addon" id="again_password">Nové heslo znovu</span>                   
            <input type="password" class="form-control" maxlength="20" id ="again_password" name="again_password" placeholder=" ">        
          </div>      
         </div>       
        </div>
        
      <br>
        
      <div class="row">            
        <div class="col-md-6">           
          <div class="input-group">          
            <span class="input-group-addon" id="old_password">Staré heslo&nbsp</span>          
            <input type="password" class="form-control" maxlength="20" id="old_password" name="old_password">        
          </div>      
        </div>
      </div>
      
      <br>
      
      <div class="row">
       <div class="col-md-6">
        <input class="btn btn-dark" type="submit" id="submit_pass" name="submit_pass" value="Změnit heslo"> 
        </div>
      </div>
         
     </form>   
    </div>                
    <!-- End_Registrace -->                                                                                                                                                                         
    <!-- Optional JavaScript -->                                                                         
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->                       
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>                       
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>                       
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>                                       

<?php 
  
  if(isset($_POST['submit_pass'])){
  
   require_once "MySQL.php";
   extract($_POST);
   
   $old_pass=output($conn,"pcb_uzivatel","password");
   
   if($old_password==$old_pass){
      if($new_password==$again_password){
      input($conn,"pcb_uzivatel","password",$new_password);
                ?>
            <script>
            window.location.replace('http://student.sspbrno.cz/~duron.zdenek/pcbazar/change_completed.php');
            </script>
          <?php
                  
      }
      else{
      echo " <div class='row'>
             <div class='col-md-6'>
             <div class='alert alert-danger'>Špatně zadané<strong>nové heslo</strong>.</div>
             </div>
             </div>";
      }
   }
   else{
              echo "
                  <div class='row'>
                  <div class='col-md-6'>
                  <div class='alert alert-danger'>Špatně zadané<strong>staré heslo</strong>.</div>
                  </div>
                  </div>";
   }
  }
       
?>

</body>
</html>
