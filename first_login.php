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
   include("horni_bar_checked.php");
  ?>
    
    <!-- Login /w first_login_then -->  
    
    
     <div class="container">       
     <form action="register_completed.php" method="POST">
     
           
      <div class ="row"> 
          <div class="col-md-12">
            <h4 class="text-start">Pro přidání inzerátu se musíte přihlásit.</h4>
          </div> 
      </div>
      
      <br>
      <br>
      
      <div class="row">       
        <div class="col-md">   
          <h3 class="text-center"><i class="fa fa-file-text" aria-hidden="true"></i>&nbspPřihlášení</h3> 
         <hr style="width: 100%; color: black; height: 1px; background-color:#aaa;" /> 
         </div>                 
       </div>
  
       <div class="row">      
         <div class="col-md-10">
           <p><i class="fa fa-question-circle-o" aria-hidden="true"></i>&nbspZadejte údaje, použíté při registraci.</p>
         </div>      
       </div>
 
      <div class="row">      
        <div class="col-md-4">       
          <div class="input-group">         
            <span class="input-group-addon" id="nickname">Přezdívka</span>          
            <input type="text" class="form-control" maxlength="20" aria-describedby="nickname" id="nickname" name="nickname"  value=<?=(isset($_POST['nickname'])?$_POST['nickname']:"")?>>        
          </div>      
        </div>  
      </div>
      <br>
      
      <div class="row">            
        <div class="col-md-4">           
          <div class="input-group">          
            <span class="input-group-addon" id="password">Heslo&nbsp</span>          
            <input type="password" class="form-control" maxlength="20" id="password" name="password">        
          </div>      
        </div>
      </div>
      
      <br>
      
      <div class="row">
       <div class="col-md-6">
        <input class="btn btn-secondary" type="submit" id="submit_login" name="submit_login" value="Přihlásit se"> 
       </div>
      </div>
     
     
     <?php

      if(isset($_POST['submit_dropdown_login'])){
        extract($_POST);
        $_SESSION['nickname']=$nickname_dropdown;
        $_SESSION['password']=$password_dropdown; 
        ?>
        <script>
          window.location.reload();
        </script>
        <?php  
      }
      
      
      
      if(isset($_SESSION['nickname']) OR isset($_SESSION['password'])){
        require_once("MySQL.php");
        
        $nickname_dropdown=$_SESSION['nickname'];
        $password_dropdown=$_SESSION['password'];
        
        $nickname_check = $conn->query("SELECT nickname FROM pcb_uzivatel WHERE nickname ='".$nickname_dropdown."'");
        
             
        if(mysqli_num_rows($nickname_check)){
          $sql="SELECT password FROM  pcb_uzivatel WHERE nickname ='".$nickname_dropdown."'";
          $kvery = $conn->query($sql);
          $row=mysqli_fetch_array($kvery);
          
          if($row['password']==$password_dropdown){
          
          echo"Potvrzeno, jméno: ".$nickname_dropdown. " heslo: ".$password_dropdown;
          
          }
          else{
            echo "<br>
                  <div class='row'>
                  <div class='col-md-6'>
                  <div class='alert alert-danger'>Špatně zadané <strong>heslo</strong>.</div>
                  </div>
                  </div>";          
          }
          
        }
        else{
            echo "<br>
                  <div class='row'>
                  <div class='col-md-6'>
                  <div class='alert alert-danger'>Špatně zadaná <strong>přezdívka</strong>.</div>
                  </div>
                  </div>";
        }
      
      }
      
      if(isset($_POST['submit_login'])){
        require_once("MySQL.php");
        login();
      }
      
      
      
     
     ?>
           
     </form>
     </div>   


    
    
    
                  
                                                                                                                                                                          
    <!-- Optional JavaScript -->                                                                         
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->                       
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>                       
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>                       
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>                                       
  </body>
</html>