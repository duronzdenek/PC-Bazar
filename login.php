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
    <!-- Horní Bar-->           
    <nav class="navbar navbar-expand-md  navbar-dark bg-dark" style="background:#aaa">                                                                     
      <ul class="navbar-nav">
        <li>                                                                                        
        <a class="nav-link font-weight-bold" href="home.php"><i class="fa fa-laptop" aria-hidden="true"></i>&nbspPočítačový Bazar</a>                                                                                     
        </li>
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        <li class="nav-item">                                                              
          <a href="#link" class="btn btn-secondary" role="button"><i class="fa fa-plus" aria-hidden="true"></i>&nbspVložit inzerát</a>                                                 
        </li> 
        &nbsp 
        <br>
       </ul>
       <ul class="navbar-nav ml-auto justify-content-end"> 
        <li class="nav-item">
      <!--Přihlášení menu -->
       <a href="login.php" class="btn btn-secondary" role="button">&nbspPřihlásit se</a>
       <!--
        <div class="dropdown">
          <button href="login.php" class="btn btn-secondary" type="button" id="login" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Přihlásit se
          </button>
         
       <div class="dropdown-menu">
        <form class="px-4 py-3">
         <div class="form-group">
            <label for="nickname_dropdown">Přezdívka</label>
            <input type="text" class="form-control" id="nickname_dropdown" name="nickname_dropdown">
         </div>
           <div class="form-group">
            <label for="password_dropdown">Heslo</label>
            <input type="password" class="form-control" id="password_dropdown" name="password_dropdown">
          </div>
          <button type="submit" class="btn btn-faded" id="submit_dropdown_login" name="submit_dropdown_login">Přihlásit se</button>
       </form>
     
      <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="register.php">Nemáš účet? Vytvoř si ho zde!</a>
        <a class="dropdown-item" href="#">Zapomenuté heslo?</a>
      </div>
    </div>
    -->
      <!--End_Přihlášení menu -->
    </li>
        <li class="nav-item">                                                              
          <a class="nav-link" href="register.php">Nemáš účet? Vytvoř si ho zde!</a>                                                    
        </li>                  
       </ul>                                                                                         
    </nav>
                                                     
    <div class="jumbotron jumbotron-fluid" style="background:#aaa">                  
      <div class="container">                                     
        <div class="row" style="background:#aaa">                            
          <div class="col-md-6">      <h1><i class="fa fa-laptop" aria-hidden="true"></i>&nbspPočítačový bazar</h1>      <h5>&nbsp &nbsp Prodej a nákup všeho ohledně počítačů...</h5>                            
          </div>                            
          <div class="col-md-4">                                
            <br>                                 
            <br>                         
            <input class="form-control mr-sm-2" type="text" placeholder="počítač, notebook, procesor...">                           
          </div>                     
          <div class="col-md-2">                       
            <br>                                 
            <br>                         
            <button type="button" class="btn btn-dark" type=submit><i class="fa fa-search" aria-hidden="true"></i>&nbspHledej                          
            </button>                            
          </div>                        
        </div>             
      </div>         
    </div>     
    <!-- End_Horní Bar -->  
    
    
    <!-- Login  -->  
     <div class="container">       
     <form action="login.php" method="POST">
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
        extract($_POST);
        
        $nickname_check = $conn->query("SELECT nickname FROM pcb_uzivatel WHERE nickname ='".$nickname."'");
      
        if(mysqli_num_rows($nickname_check)){
          $sql="SELECT password FROM  pcb_uzivatel WHERE nickname ='".$nickname."'";
          $kvery = $conn->query($sql);
          $row=mysqli_fetch_array($kvery);

          
          if($row['password']==$password){
          $sql_id="SELECT id FROM  pcb_uzivatel WHERE nickname ='".$nickname."'";
          $kvery_id=$conn->query($sql_id);
          $id=mysqli_fetch_array($kvery_id);
          $_SESSION['logged_id']=$id['id'];
          ?>
             <script>
               window.location.replace('http://student.sspbrno.cz/~duron.zdenek/pcbazar/home.php');
             </script>
          <?php
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