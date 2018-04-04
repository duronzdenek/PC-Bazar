<?php
session_start();
?>
<!DOCTYPE>
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
if(isset($_SESSION['logged_id'])){
  include("horni_bar_logged.php");
}
else{
 include("horni_bar_checked.php");
}  
?>                   
    <div class="container">       
      <form action="" method="POST" enctype="text">
        
        <div class="row">       
        <div class="col-md">   
          <h3 class="text-center"><i class="fa fa-search"></i>&nbspHledám...</h3>
         </div>                 
       </div>    
       <br> 
  <div class="text-center">
    <div class="btn-group btn-group btn-group-toggle" data-toggle="buttons">
       <label class="btn btn-secondary">
           <input type="radio" name="category" value="1" id="option1" autocomplete="off"> Celý Počítač/Notebook
       </label>
       <label class="btn btn-secondary">
          <input type="radio" name="category" value="2" id="option2" autocomplete="off"> Počítačová komponenta
       </label>
       <label class="btn btn-secondary">
         <input type="radio" name="category" value="3" id="option3" autocomplete="off"> Počítačový doplněk
       </label>
       <label class="btn btn-secondary">
         <input type="radio" name="category" value="4" id="option4" autocomplete="off"> Jiný počítačový produkt
       </label>
    </div>
  </div>      
        <hr style="width: 100%; color: black; height: 1px; background-color:#aaa;" /> 
       <div class="text-center">
      <div class="row">
        <div class="col-md-6">
          <input class="btn btn-dark" type="submit" id="submit_search" name="submit_search" value="Přesněji..."> 
        </div>
      </div> 
      </div>
    <?php
     if(isset($_POST['submit_search'])){
      extract($_POST);
      if(empty($category)){
           echo " <br>
                  <div class='row'>
                  <div class='col-md-6'>
                  <div class='alert alert-danger'>Vyberte prosím kategorii.</div>
                  </div>
                  </div>";
          }
        } 
        ?>                                                                                                                                                                                   
    <!-- Optional JavaScript -->                                                                         
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->                       
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>                       
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>                       
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>                                       
      <?php 
       include_once("MySQL.php");
       if(isset($_POST['submit_search'])){
       extract($_POST);
       if(empty($category)){
         echo "IM SO EMPTY";
         
        } 
       else{
        $_SESSION['cat']=$category;
            ?>
          <script>
          window.location.replace('http://student.sspbrno.cz/~duron.zdenek/pcbazar/search1.php');
          </script>
          <?php 
        }
      }
    ?>
     </form>
    </div>
</body>
</html>