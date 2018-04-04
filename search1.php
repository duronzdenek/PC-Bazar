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

if(!isset($_SESSION['cat'])){
    ?>
    <script>
    window.location.replace('http://student.sspbrno.cz/~duron.zdenek/pcbazar/home.php');
    </script>
    <?php 
}
?>                   
    <div class="container">       
      <form action="" method="POST" enctype="text">
      
              
        <div class="row">       
        <div class="col-md">   
          <h3 class="text-center"><i class="fa fa-search"></i>&nbspPřesněji...</h3>
         </div>                 
       </div> 
             
      <br>
    
    <?php 
    if($_SESSION['cat']==1){
    echo"
    <div class='text-center'>
      <div class='btn-group btn-group btn-group-toggle' data-toggle='buttons'>
       <label class='btn btn-secondary active'>
           <input type='radio' name='category' value='1' id='option1' autocomplete='off'> Stolní počítač
       </label>
       <label class='btn btn-secondary'>
          <input type='radio' name='category' value='2' id='option2' autocomplete='off'> Notebook
       </label>
      </div>
    </div>";
    }
    elseif($_SESSION['cat']==2){
    echo"
    <div class='text-center'>
      <div class='btn-group btn-group btn-group-toggle' data-toggle='buttons'>
       <label class='btn btn-secondary active'>
           <input type='radio' name='category' value='3' id='option1' autocomplete='off'> Základní deska
       </label>
       <label class='btn btn-secondary'>
          <input type='radio' name='category' value='5' id='option2' autocomplete='off'> Procesor
       </label>
       <label class='btn btn-secondary'>
          <input type='radio' name='category' value='6' id='option2' autocomplete='off'> Operační paměť
       </label>
       <label class='btn btn-secondary'>
          <input type='radio' name='category' value='7' id='option2' autocomplete='off'> Grafická karta
       </label>
       <label class='btn btn-secondary'>
          <input type='radio' name='category' value='8' id='option2' autocomplete='off'> Pevný disk
       </label>
       <label class='btn btn-secondary'>
          <input type='radio' name='category' value='9' id='option2' autocomplete='off'> Mechanika
       </label>
       <label class='btn btn-secondary'>
          <input type='radio' name='category' value='10' id='option2' autocomplete='off'> PC Skříň
       </label>
       <label class='btn btn-secondary'>
          <input type='radio' name='category' value='11' id='option2' autocomplete='off'> Zdroj
       </label>
       <label class='btn btn-secondary'>
          <input type='radio' name='category' value='12' id='option2' autocomplete='off'> Jiné
       </label>
      </div>
    </div>";
    }
    elseif($_SESSION['cat']==3){
     echo"
    <div class='text-center'>
      <div class='btn-group btn-group btn-group-toggle' data-toggle='buttons'>
       <label class='btn btn-secondary active'>
           <input type='radio' name='category' value='13' id='option1' autocomplete='off'> Monitor
       </label>
       <label class='btn btn-secondary'>
          <input type='radio' name='category' value='14' id='option2' autocomplete='off'> Myš
       </label>
       <label class='btn btn-secondary'>
          <input type='radio' name='category' value='15' id='option2' autocomplete='off'> Klávesnice
       </label>
       <label class='btn btn-secondary'>
          <input type='radio' name='category' value='16' id='option2' autocomplete='off'> Sluchátka
       </label>
       <label class='btn btn-secondary'>
          <input type='radio' name='category' value='17' id='option2' autocomplete='off'> Reproduktory
       </label>
       <label class='btn btn-secondary'>
          <input type='radio' name='category' value='18' id='option2' autocomplete='off'> Mikrofón
       </label>
       <label class='btn btn-secondary'>
          <input type='radio' name='category' value='19' id='option2' autocomplete='off'> Webkamera
       </label>
       <label class='btn btn-secondary'>
          <input type='radio' name='category' value='20' id='option2' autocomplete='off'> Externí disk
       </label>
       <label class='btn btn-secondary'>
          <input type='radio' name='category' value='21' id='option2' autocomplete='off'> Tiskárna (toner, inkoust...)
       </label>
       <label class='btn btn-secondary'>
          <input type='radio' name='category' value='22' id='option2' autocomplete='off'> Záložní zdroj
       </label>
       <label class='btn btn-secondary'>
          <input type='radio' name='category' value='23' id='option2' autocomplete='off'> Jiné
       </label>
      </div>
    </div>";
    }
    elseif($_SESSION['cat']==4){
    echo "
       <div class='row'>      
        <div class='col-md-12'>
          <div class='text-center'>
          <h5>&nbspNo zkusíme to...</h5> 
          </div>
        </div>      
      </div>";
    
    }
    
    if(isset($_POST['submit_inzerat'])){
      extract($_POST);
      if($_SESSION['cat']==4){
      
      }
      elseif(empty($category)){
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
       <div class="text-center">
      <div class="row">
        <div class="col-md-6">
          <input class="btn btn-dark" type="submit" id="submit_search" name="submit_search" value="Hledat"> 
        </div>
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
  include_once("MySQL.php");
  if(isset($_POST['submit_search'])){
    extract($_POST);
    if(!empty($category))
    {
    $_SESSION['cat']=$category;
    }    
    ?>
    <script>
    window.location.replace('http://student.sspbrno.cz/~duron.zdenek/pcbazar/search2.php');
    </script>
    <?php 
    } 
?>

</body>
</html>