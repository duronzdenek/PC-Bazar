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
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="login" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Přihlásit se
          </button>
         
       <div class="dropdown-menu">
        <form class="px-4 py-3">
         <div class="form-group">
            <label for="nickname">Přezdívka</label>
            <input type="text" class="form-control" id="nickname">
         </div>
           <div class="form-group">
            <label for="password">Heslo</label>
            <input type="password" class="form-control" id="password">
          </div>
          <button type="submit" class="btn btn-faded" id="Login_submit">Přihlásit se</button>
       </form>
        <div class="dropdown-divider"></div>
       <a class="dropdown-item" href="register.php">Nemáš účet? Vytvoř si ho zde!</a>
        <a class="dropdown-item" href="#">Zapomenuté heslo?</a>
      </div>
    </div>
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
    <!-- Registrace -->       
    <div class="container">       
      <form action="register.php" method="POST">
       <div class="row">       
        <div class="col-md">   
          <h3 class="text-center"><i class="fa fa-file-text" aria-hidden="true"></i>&nbspRegistrační formulář</h3> 
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
          <div class="input-group">         
            <span class="input-group-addon" id="first_name">Jméno</span>          
            <input type="text" class="form-control" maxlength="20" aria-describedby="first_name" id="first_name" name="first_name"  value=<?=(isset($_POST['first_name'])?$_POST['first_name']:"")?>>        
          </div>      
        </div>
                     
        <div class="col-md-6">        
          <div class="input-group">          
            <span class="input-group-addon" id="last_name">Příjmení</span>          
            <input type="text" class="form-control" maxlength="20" aria-describedby="last_name" id="last_name" name="last_name" value=<?=(isset($_POST['last_name'])?$_POST['last_name']:"")?>>        
          </div>      
        </div>
              
     </div>
      <div class="row">      
        <div class="col-md-10">
          <p><i class="fa fa-question-circle-o" aria-hidden="true"></i>&nbspUvádí se pod vámi přidanými inzeráty.</p>
        </div>      
      </div>
      <?php 
  
      if(isset($_POST['submit_register'])){
                 
          $first_name=$_POST['first_name'];
          $last_name=$_POST['last_name'];
   
          if(empty($first_name)OR empty($last_name)){
           echo "
                 <div class='row'>
                 <div class='col-md-6'> 
                 <div class='alert alert-danger'><strong>Jméno a příjmení</strong> musí být vyplněno. </div>
                 </div>
                 </div>";
          }
          
          }
          
          ?>     

    <div class="row">
     <div class="col-md-6">        
          <div class="input-group">          
            <span class="input-group-addon" id="nickname">Přezdívka</span>          
            <input type="text" class="form-control" maxlength="20" aria-describedby="nickname" id="nickname" name="nickname" value=<?=(isset($_POST['nickname'])?$_POST['nickname']:"")?> >        
          </div>      
        </div>         
     </div>
     
      <div class="row">      
        <div class="col-md-6">
          <p><i class="fa fa-question-circle-o" aria-hidden="true"></i>&nbspSlouží k přihlašování na váš účet.</p>
        </div>      
      </div>
     <?php 
  
      if(isset($_POST['submit_register'])){
          
          require_once "MySQL.php";
          
          $nickname=$_POST['nickname'];
   
          $nickname_check = $conn->query("SELECT nickname FROM pcb_uzivatel WHERE nickname ='".$nickname."'");
   
          if(empty($nickname)){
           echo "
                 <div class='row'>
                 <div class='col-md-6'> 
                 <div class='alert alert-danger'><strong>Přezdívka</strong> musí být vyplněna. </div>
                 </div>
                 </div>";
          }
          elseif(mysqli_num_rows($nickname_check) > 0) {
          echo "
                 <div class='row'>
                 <div class='col-md-6'> 
                 <div class='alert alert-danger'>Tato <strong>přezdívka</strong> již byla použita. </div>
                 </div>
                 </div>";
           }
       }
       ?>
      
      <div class="row">            
        <div class="col-md-6">           
          <div class="input-group">          
            <span class="input-group-addon" id="password">Heslo&nbsp</span>          
            <input type="password" class="form-control" maxlength="20" id="password" name="password">        
          </div>      
        </div>
        
        <div class="col-md-6">           
          <div class="input-group">
            <span class="input-group-addon" id="password">Zadejte heslo znovu&nbsp</span>                   
            <input type="password" class="form-control" maxlength="20" id ="password_check" name="password_check" placeholder=" ">        
          </div>      
        </div>       
      </div>    
      <div class="row">      
        <div class="col-md-10">
          <p><i class="fa fa-question-circle-o" aria-hidden="true"></i>&nbspSlouží pro přihlášení na váš účet.</p>
        </div>      
      </div>
           <?php  
      if(isset($_POST['submit_register'])){
       
        $password=$_POST['password'];
        $password_check=$_POST['password_check'];
        
         if (empty($password)) 
         {
        echo "<div class='row'>
             <div class='col-md-6'> 
             <div class='alert alert-danger'><strong>Heslo</strong> nesmí být prázdné.</div>
              </div>
              </div>";
         } 
        
        if($password!=$password_check){
        echo "<div class='row'>
             <div class='col-md-6'> 
             <div class='alert alert-danger'>Špatně zadané <strong>heslo</strong>.</div>
              </div>
              </div>"; 
        }
       
      }
      ?>
       
      <!-- End_Osobní údaje-->
      <!-- Kontaktní údaje-->
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
          <span class="input-group-addon" id="email">E-mail</span>
            <input type="email" class="form-control"  aria-describedby="email" id="email" name="email" value=<?=(isset($_POST['email'])?$_POST['email']:"")?>>        
          </div>      
        </div>
        <br>      

            
        <div class="col-md-6">           
          <div class="input-group">          
            <span class="input-group-addon" id="number">Telefonní číslo</span>          
            <input type="tel" class="form-control" maxlength="9" aria-describedby="number" id="number" name="number" value=<?=(isset($_POST['number'])?$_POST['number']:"")?>>        
          </div>      
        </div>      
      </div>
      
      <div class="row">      
        <div class="col-md-10">
          <p><i class="fa fa-question-circle-o" aria-hidden="true"></i>&nbspKontaktní informace pro zájemce vašich inzerátů. Telefonní číslo uvádějte ve formátu "703123123".</p>
        </div>      
      </div>
      
      <?php
          if(isset($_POST['submit_register'])){
          require_once "MySQL.php";
          $email=$_POST['email'];
          $email_check = $conn->query("SELECT email FROM pcb_uzivatel WHERE email ='".$email."'");
          if(mysqli_num_rows($email_check) > 0){
            echo "   <div class='row'>
                     <div class='col-md-6'>
                     <div class='alert alert-danger'>Tato <strong>emailová adresa</strong> již byla použita.</div>
                     </div>
                     </div>";
          }
          elseif(empty($email)){
           echo "   <div class='row'>
                     <div class='col-md-6'>
                     <div class='alert alert-danger'>Zadejte <strong>emailovou adresu</strong>.</div>
                     </div>"
                     ; 
          }
          $number=$_POST['number'];
          $number_check =$conn->query("SELECT number FROM pcb_uzivatel WHERE number ='".$number."'");
         if(false==ereg("^[0-9]*$", $number)){
           echo " <div class='row'>
                  <div class='col-md-6'>
                  <div class='alert alert-danger'>Špatně zadané <strong>telefonní číslo</strong>.</div>
                  </div>
                  </div>";
         }
        
         elseif(mysqli_num_rows($number_check) > 0){
           echo "
                  <div class='row'>
                  <div class='col-md-6'>
                  <div class='alert alert-danger'>Toto <strong>telefonní číslo</strong> již bylo použito.</div>
                  </div>
                  </div>";
          }
         
       }
        ?>
      <!--End_Kontaktní údaje -->

      <div class="row">
      <div class="col-md-6">
      <input class="btn btn-secondary" type="submit" id="submit_register" name="submit_register" value="Registrovat se"> 
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
  
  if(isset($_POST['submit_register'])){
  
   require_once "MySQL.php";
   extract($_POST);
   
     $nickname_check = $conn->query("SELECT nickname FROM pcb_uzivatel WHERE nickname ='".$nickname."'");
     $email_check = $conn->query("SELECT email FROM pcb_uzivatel WHERE email ='".$email."'");
     $number_check =$conn->query("SELECT number FROM pcb_uzivatel WHERE number ='".$number."'");
   
      if(mysqli_num_rows($nickname_check) OR mysqli_num_rows($email_check) OR mysqli_num_rows($number_check) > 0){
      
       }  
      elseif($password!=$password_check){
      }
      elseif(empty($nickname) || empty($first_name) || empty($last_name) || empty($password) || empty($email) || empty($number) ){
      }
      else{
    // input into database
    $query = 
    "INSERT INTO pcb_uzivatel 
    (nickname, first_name, last_name, password, email, number)

     values

    ('$nickname', '$first_name','$last_name','$password','$email','$number')";
  
  
    $success = $conn->query($query);

    if (!$success) {
      die("Couldn't enter data: ".$mysqli->error);
    }
    else{
    ?>
    <script>
    window.location.replace('http://student.sspbrno.cz/~duron.zdenek/pcbazar/register_completed.php');
    </script>
    
    <?php
    }
    
    
  }
  
  mysqli_close($conn);
  }
  
?>

</body>
</html>
