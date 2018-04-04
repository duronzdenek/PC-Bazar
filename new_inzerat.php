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
 include("horni_bar_logged.php");
if(!isset($_SESSION['logged_id'])){
   ?> 
    <script>                                                                                                         
    window.location.replace('http://student.sspbrno.cz/~duron.zdenek/pcbazar/first_login.php');
    </script>
    <?php
}
?>                   
    <!-- New_inzerát -->       
    <div class="container">       
      <form action="new_inzerat.php" method="POST" enctype="multipart/form-data">
       <div class="row">       
        <div class="col-md">   
          <h3 class="text-center">&nbspVložit inzerát</h3> 
         </div>                 
       </div>           
      
      <br>    
      <!-- inzerát popis -->
       <div class="row">      
        <div class="col-md-12">
        <h5><i class="fa fa-file-text" aria-hidden="true"></i>&nbspZákladní informace - 1.krok</h5>  
        </div>      
       </div>    
      <hr style="width: 100%; color: black; height: 1px; background-color:#aaa;" /> 
      
      <div class="row">      
        
        <div class="col-md-12">       
          <div class="input-group">         
          
            <span class="input-group-addon" id="name">Název</span>                
            <input type="text" class="form-control" maxlength="30" aria-describedby="name" id="name" name="name"  value=<?if(isset($_SESSION['name'])){ echo $_SESSION['name'];}elseif(isset($_POST['name'])){echo $_POST['name'];}?>>        

          </div>      
        </div>
     </div>
     <?php
     if(isset($_POST['submit_inzerat'])){
      extract($_POST);
      if(empty($name)){
           echo " <br>
                  <div class='row'>
                  <div class='col-md-6'>
                  <div class='alert alert-danger'>Vyplňte prosím název.</div>
                  </div>
                  </div>";
          }
        }
          
          ?>
     <br>
           <div class="row">      
        
        <div class="col-md-3">       
          <div class="input-group">         
          
            <span class="input-group-addon" id="price">Cena</span>                
            <input type="text" class="form-control" maxlength="30" aria-describedby="price" id="price" name="price" value=<?if(isset($_SESSION['price'])){ echo $_SESSION['price'];}elseif(isset($_POST['price'])){echo $_POST['price'];}?>>        
            
          </div>      
        </div>
     </div>
           <div class="row">      
        <div class="col-lr-5">
          <p> &nbsp&nbsp&nbsp<i class="fa fa-question-circle" aria-hidden="true"></i>&nbspCenu uvádějte v Kč.</p>
        </div>      
      </div>
                 <?php
     if(isset($_POST['submit_inzerat'])){
      extract($_POST);
      if(empty($price)){
           echo "
                  <div class='row'>
                  <div class='col-md-6'>
                  <div class='alert alert-danger'>Vyplňte prosím cenu.</div>
                  </div>
                  </div>";
          }
        elseif(is_numeric($price)==false){
           echo "
                  <div class='row'>
                  <div class='col-md-6'>
                  <div class='alert alert-danger'>Uvádějte jen číslo.</div>
                  </div>
                  </div>";
          }
        }
        
          
          ?>
     
     <div class="row">
        &nbsp&nbsp&nbsp
        <div class="col-xs-1">      
        <span class="input-group-addon" id="popis"for="popis">Popis</span>
        </div>
        <div class="col-md-10">
        <textarea class="form-control" rows="5" id="popis" name="popis" maxlength="1000"><?if(isset($_SESSION['description'])){ echo $_SESSION['description'];}elseif(isset($_POST['popis'])){echo $_POST['popis'];}?></textarea>     
        </div>
      </div>
      <div class="row">      
        <div class="col-lr-5">
          <p> &nbsp&nbsp&nbsp<i class="fa fa-question-circle" aria-hidden="true"></i>&nbspKrátky popis produktu, který slouží pro upřesnění informací a kvality nabízeného produktu. Popis může mít 1000 písmen.</p>
        </div>      
      </div>
           <?php
     if(isset($_POST['submit_inzerat'])){
      extract($_POST);
      if(empty($popis)){
           echo "
                  <div class='row'>
                  <div class='col-md-6'>
                  <div class='alert alert-danger'>Vyplňte prosím popis.</div>
                  </div>
                  </div>";
          }
        }
          
          ?>
      
      <br>
      <div class="row">      
        <div class="col-md-12">
          <h5><i class="fa fa-file-text" aria-hidden="true"></i>&nbspKategorie</h5> 
          <hr style="width: 100%; color: black; height: 1px; background-color:#aaa;" />
        </div>      
      </div>

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
    <?php
     if(isset($_POST['submit_inzerat'])){
      extract($_POST);
      if(empty($category)){
           echo "
                  <div class='row'>
                  <div class='col-md-6'>
                  <div class='alert alert-danger'>Vyberte prosím kategorii.</div>
                  </div>
                  </div>";
          }
        }
          
          ?> 
      <hr style="width: 100%; color: black; height: 1px; background-color:#aaa;" /> 
      <div class="row">
        <div class="col-md-6">
          <input class="btn btn-dark" type="submit" id="submit_inzerat" name="submit_inzerat" value="Upřesnit kategorii"> 
        </div>
      </div>   
    </div>
    </form>                
    <!-- End_Registrace -->                                                                                                                                                                         
    <!-- Optional JavaScript -->                                                                         
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->                       
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>                       
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>                       
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>                                       

<?php 
  include_once("MySQL.php");
  if(isset($_POST['submit_inzerat'])){
    extract($_POST);
    if(empty($name) OR empty($popis) OR empty($category) OR is_numeric($price)==false OR empty($price)){
    
    }
    else{
    $name=htmlspecialchars($name);
    $popis=htmlspecialchars($popis);
    $_SESSION['price']=$price; 
    $_SESSION['name']=htmlspecialchars($name);      
    $_SESSION['description']=htmlspecialchars($popis);
    $_SESSION['category']=$category;
    ?>
      <script>
      window.location.replace('http://student.sspbrno.cz/~duron.zdenek/pcbazar/new_inzerat1.php');
      </script>
    <?php 
    } 
  }
?>

</body>
</html>