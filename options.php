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
    <!-- Nastavení -->       
    <div class="container">       
      <form action="" method="POST">
       <div class="row">       
        <div class="col-md">   
          <h3 class="text-center"><i class="fa fa-cogs"></i>&nbspNastavení</h3>
          <a><i class="fa fa-question-circle" aria-hidden="true"></i>&nbspUveďte údaje, které si přejete změnit. Ostatní nechte nevyplněné.</a> 
         </div>                 
       </div>           
      
      <br>    
       <div class="row">      
        <div class="col-md-12">
        <h5><i class="fa fa-user" aria-hidden="true"></i>&nbspOsobní údaje</h5>
        <hr style="width: 100%; color: black; height: 1px; background-color:#aaa;" />   
        </div>      
       </div>      
      
      
      <div class="row">      
        
        <div class="col-md-6">       
          <div class="input-group">         
            <span class="input-group-addon" id="first_name">Změnit jméno</span>          
            <input type="text" class="form-control" maxlength="20" aria-describedby="first_name" id="first_name" name="first_name"  value=<?=(isset($_POST['first_name'])?$_POST['first_name']:"")?>>        
          </div>      
        </div>
                     
        <div class="col-md-6">        
          <div class="input-group">          
            <span class="input-group-addon" id="last_name">Změnit příjmení</span>          
            <input type="text" class="form-control" maxlength="20" aria-describedby="last_name" id="last_name" name="last_name" value=<?=(isset($_POST['last_name'])?$_POST['last_name']:"")?>>        
          </div>      
        </div>
              
     </div>
      <?php 
  
      if(isset($_POST['submit_change'])){
                 
          $first_name=$_POST['first_name'];
          $last_name=$_POST['last_name'];
          
          if(preg_match('/[^a-zA-ZáéíóúýčďěňřšťžůÁÉÍÓÚÝČĎĚŇŘŠŤŽŮ]+/',$first_name) OR preg_match('/[^a-zA-ZáéíóúýčďěňřšťžůÁÉÍÓÚÝČĎĚŇŘŠŤŽŮ]+/',$last_name)){
            echo "
                  <br>
                 <div class='row'>
                 <div class='col-md-6'> 
                 <div class='alert alert-danger'><strong>Jméno nebo příjmení</strong> bylo špatně zadáno. </div>
                 </div>
                 </div>";
          }
          
          }
          ?>     

     <br>
      
    <div class="row">
     <div class="col-md-6">        
          <div class="input-group">          
            <span class="input-group-addon" id="nickname">Změnit přezdívku</span>          
            <input type="text" class="form-control" maxlength="20" aria-describedby="nickname" id="nickname" name="nickname" value=<?if(isset($_POST['nickname'])?$_POST['nickname']:"")?> >        
          </div>      
      </div>

      <div class="col-md-6">
        <input href="password_change.php" class="btn btn-secondary" type="submit" id="pass_change" name="pass_change" value="Změnit heslo"> 
      </div>         
     </div>
     
     <?php 
     
     if(isset($_POST['pass_change'])){
            ?>
          <script>
           window.location.replace('http://student.sspbrno.cz/~duron.zdenek/pcbazar/password_change.php');
          </script>
    
    <?php
     }
       ?>
      
      <br>
      <div class="row">      
        <div class="col-md-12">
        <h5><i class="fa fa-envelope" aria-hidden="true"></i>&nbspKontaktní údaje</h5>
        <hr style="width: 100%; color: black; height: 1px; background-color:#aaa;" />   
        </div>      
      </div>


        
      <div class="row">            
        <div class="col-md-6">           
          <div class="input-group">
          <span class="input-group-addon" id="email">Změnit E-mail</span>
            <input type="email" class="form-control"  aria-describedby="email" id="email" name="email" value=<?=(isset($_POST['email'])?$_POST['email']:"")?>>        
          </div>      
        </div>
      </div>
        
      <br>      

       <div class="row">     
        <div class="col-md-6">           
          <div class="input-group">          
            <span class="input-group-addon" id="number">Změnit telefonní číslo</span>          
            <input type="tel" class="form-control" maxlength="9" aria-describedby="number" id="number" name="number" value=<?=(isset($_POST['number'])?$_POST['number']:"")?>>        
          </div>      
        </div>      
      </div>
      
      <br>
      <div class="row">      
        <div class="col-md-12">
         <h5><i class="fa fa-unlock"></i>&nbspPotvrzení heslem</h5>  
          <hr style="width: 100%; color: black; height: 1px; background-color:#aaa;" />   
        </div>      
      </div>
      
      <div class="row">            
        <div class="col-md-6">            
          <div class="input-group">        
            <span class="input-group-addon" id="password">Heslo&nbsp</span>          
            <input type="password" class="form-control" maxlength="20" id="password" name="password">        
          </div>      
        </div>
        <br>
        <br>
      

      <div class="row">
        <div class="col-md-6">
         <input class="btn btn-dark" type="submit" id="submit_change" name="submit_change" value="Změnit údaje"> 
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
          
          $nickname=$_POST['nickname'];
   
          $x=check($conn,"pcb_uzivatel","nickname",$nickname);
          if(preg_match('/[^1-9a-zA-ZáéíóúýčďěňřšťžůÁÉÍÓÚÝČĎĚŇŘŠŤŽŮ]+/',$nickname)){
          echo " 
                 <div class='row'>
                 <div class='col-md-6'> 
                 <div class='alert alert-danger'><strong>Přezdívka</strong> byla špatně zadána. Musí obsahovat jen písmena a číslice. </div>
                 </div>
                 </div>";
          }
          elseif(mysqli_num_rows($x) > 0) {
          echo "
                 <div class='row'>
                 <div class='col-md-6'> 
                 <div class='alert alert-danger'>Tato <strong>přezdívka</strong> již byla použita. </div>
                 </div>
                 </div>";
           }
          
       
       }
  
      if(isset($_POST['submit_change'])){
          require_once "MySQL.php";
          $email=$_POST['email'];
          if(mysqli_num_rows(check($conn,"pcb_uzivatel","email",$email))> 0){
            echo "   <div class='row'>
                     <div class='col-md-6'>
                     <div class='alert alert-danger'>Tato <strong>emailová adresa</strong> již byla použita.</div>
                     </div>
                     </div>";
          }
  
          
          $number=$_POST['number'];
         if(false==ereg("^[0-9]*$", $number)){
           echo " <div class='row'>
                  <div class='col-md-6'>
                  <div class='alert alert-danger'>Špatně zadané <strong>telefonní číslo</strong>.</div>
                  </div>
                  </div>";
         }
        
         elseif(mysqli_num_rows(check($conn,"pcb_uzivatel","number",$number)) > 0){
           echo "
                  <div class='row'>
                  <div class='col-md-6'>
                  <div class='alert alert-danger'>Toto <strong>telefonní číslo</strong> již bylo použito.</div>
                  </div>
                  </div>";
          }
         
       }
       
  if(isset($_POST['submit_change'])){
  
   require_once "MySQL.php";
      extract($_POST);
      if(output($conn,"pcb_uzivatel","password")==$password){
      if(mysqli_num_rows(check($conn,"pcb_uzivatel","nickname",$nickname)) OR mysqli_num_rows(check($conn,"pcb_uzivatel","email",$email)) OR mysqli_num_rows(check($conn,"pcb_uzivatel","number",$number)) == 1){
       }
      elseif(preg_match('/[^1-9a-zA-ZáéíóúýčďěňřšťžůÁÉÍÓÚÝČĎĚŇŘŠŤŽŮ]+/',$nickname) OR preg_match('/[^a-zA-ZáéíóúýčďěňřšťžůÁÉÍÓÚÝČĎĚŇŘŠŤŽŮ]+/',$first_name) OR preg_match('/[^a-zA-ZáéíóúýčďěňřšťžůÁÉÍÓÚÝČĎĚŇŘŠŤŽŮ]+/',$last_name) ){
      
      }  
      elseif(false==ereg("^[0-9]*$", $number)){
      
      }
      else{
          if(!empty($nickname)){
             input($conn,"pcb_uzivatel","nickname",$nickname,$_SESSION['logged_id']);
             echo "input nickname hotov";
         }
         if(!empty($first_name)){
             input($conn,"pcb_uzivatel","first_name",$first_name,$_SESSION['logged_id']);    
         }
         if(!empty($last_name)){
             input($conn,"pcb_uzivatel","last_name",$last_name,$_SESSION['logged_id']);   
         } 
         if (!empty($email)){
             input($conn,"pcb_uzivatel","email",$email,$_SESSION['logged_id']);  
         }
         if(!empty($number)){
             input($conn,"pcb_uzivatel","number",$number,$_SESSION['logged_id']);  
          }
          ?>
            <script>
            window.location.replace('http://student.sspbrno.cz/~duron.zdenek/pcbazar/change_completed.php');
            </script>
          <?php
      }
    }
    else{
               echo "
                  <div class='row'>
                  <div class='col-md-6'>
                  <div class='alert alert-danger'>Špatně zadané heslo.</div>
                  </div>
                  </div>";
    }  
  }
?>

</body>
</html>
