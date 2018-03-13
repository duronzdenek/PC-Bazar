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
                 
    <!-- Registrace -->       
    <div class="container">       
      <form action="register.php" method="POST">
       <div class="row">       
        <div class="col-md">   
          <h3 class="text-center"><i class="fa fa-user"></i>Profil uživatele</h3> 
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
          <h6>Jméno a příjmení:</h6> <p><?require_once("MySQL.php");output($conn,"pcb_uzivatel","first_name");output($conn,"pcb_uzivatel","last_name");?></p>
      </div>
      
      <div class="col-md-6">
           <h6>Přezdívka:</h6>  <p><?require_once("MySQL.php");output($conn,"pcb_uzivatel","nickname");?></p>
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
          <h6>E-mail:</h6> <p><?require_once("MySQL.php");output($conn,"pcb_uzivatel","email");?></p>
        </div>
      
       <div class="col-md-6">
           <h6>Telefonní číslo:</h6>  <p><?require_once("MySQL.php");output($conn,"pcb_uzivatel","number");?></p>
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
      <input href="home.php "class="btn btn-dark" type="submit"  value="Změnit údaje"> 
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
      
     <div class="container">            
      <table class="table table-striped">
         <thead>
                 <tr>
                 <th>Firstname</th>
                 <th>Lastname</th>
                 <th>Email</th>
                 </tr>
        </thead>
        <tbody>
             <tr>
               <td>John</td>
               <td>Doe</td>
               <td>john@example.com</td>
             </tr>
             <tr>
               <td>Mary</td>
               <td>Moe</td>
               <td>mary@example.com</td>
             </tr>
             <tr>
               <td>July</td>
               <td>Dooley</td>
               <td>july@example.com</td>
            </tr>
       </tbody>
     </table>
</div>   
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
