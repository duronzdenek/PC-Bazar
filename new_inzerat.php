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
      <form action="new_inzerat.php" method="POST">
       <div class="row">       
        <div class="col-md">   
          <h3 class="text-center">&nbspVložit inzerát</h3> 
         </div>                 
       </div>           
      
      <br>    
      <!-- inzerát popis -->
       <div class="row">      
        <div class="col-md-12">
        <h5><i class="fa fa-file-text" aria-hidden="true"></i>&nbspInzerát</h5>  
        </div>      
       </div>    
      <hr style="width: 100%; color: black; height: 1px; background-color:#aaa;" /> 
      
      <div class="row">      
        
        <div class="col-md-12">       
          <div class="input-group">         
          
            <span class="input-group-addon" id="name">Název</span>                
            <input type="text" class="form-control" maxlength="30" aria-describedby="name" id="name" name="name"  value=<?=(isset($_POST['name'])?$_POST['name']:"")?>>        

          </div>      
        </div>
     </div>
      <div class="row">      
        <div class="col-md-6">
          <p><i class="fa fa-question-circle-o" aria-hidden="true"></i>&nbspZde uveďte název produktu, který si přejete přidat.</p>
        </div>      
      </div>
    <br>
      <div class="row">
        <div class="col-xs-1">      
        <span class="input-group-addon" id="popis"for="popis">Popis</span>
        </div>
        <div class="col-md-8">
        <textarea class="form-control" rows="5" id="popis" maxlength="250" value=<?=(isset($_POST['popis'])?$_POST['popis']:"")?>></textarea>     
        </div>
      </div>
      <div class="row">      
        <div class="col-md-6">
          <p><i class="fa fa-question-circle-o" aria-hidden="true"></i>&nbspKrátky popis produktu, který slouží pro upřesnění informací a kvality nabízeného produktu. Popis může mít 250 písmen.</p>
        </div>      
      </div>              
         <div class="row">
         <div class="input-group">
                <div class="col-md-2">
                <span class="input-group-addon" id="nickname">Přidání obrázků</span>
                </div>
        </div>
        <div class="row">
            <div class="col-md-4">
             <span class="input-group-btn">
                 <span class="btn btn-default btn-file">
                     <input type="file" name="img1" id="img1">
                 </span>
             </span>
            </div>
            <div class="col-md-4">
             <span class="input-group-btn">
                 <span class="btn btn-default btn-file">
                     <input type="file" name="img2" id="img2">
                 </span>
             </span>
            </div>
            <div class="col-md-4">
             <span class="input-group-btn">
                 <span class="btn btn-default btn-file">
                     <input type="file" name="img3" id="img3">
                 </span>
             </span>
            </div>
        </div>
    </div>
        <?php 
  
  if(isset($_POST['submit_inzerat'])){
    if(getimagesize($_FILES['img1']['tmp_name1'])==FALSE || getimagesize($_FILES['img2']['tmp_name2'])==FALSE || getimagesize($_FILES['img3']['tmp_name3'])==FALSE)
    {
      echo "
      <div class='row'>
        <div class='col-md-6'> 
          <div class='alert alert-danger'>Zvolte prosím obrázek. </div>
        </div>
      </div>"; 
    }
  }
          ?>
       <div class="row">      
        <div class="col-md-12">
          <p><i class="fa fa-question-circle-o" aria-hidden="true"></i>&nbspMůžete přidat 3 obrázky produktu, který nabízíte. Přidáním kvalitních fotek docílíte větší šance prodeje vašeho produktu. </p>
        </div>      
      </div>
     <hr style="width: 100%; color: black; height: 1px; background-color:#aaa;" />
      <p><i class="fa fa-exclamation-circle"></i>&nbspPřidáním inzerátu souhlasíte s použitím vašich osobních údajů (jména, emailu a tel. čísla) ve výše uvedeném inzerátu. </p>

      <div class="row">
      <div class="col-md-6">
      <input class="btn btn-secondary" type="submit" id="submit_inzerat" name="submit_inzerat" value="Přidat inzerát"> 
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
  
  if(isset($_POST['submit_inzerat'])){
    if(getimagesize($_FILES['img1']['tmp_name1'])!=FALSE){
        $info = pathinfo($_FILES['img1']['name']);
        $ext = $info['extension'];
        require_once "MySQL.php";
         $query = "INSERT INTO pcb_image values ('.$id_pcb_inzerat.')";
        if($conn->query($query)===TRUE)
          {
          $name=$conn->insert_id;
          $newname = $name."".$ext; 
          $target = 'images/'.$newname;
          move_uploaded_file( ($_FILES['img1']['tmp_name']), $target);
          }
        else
          {
          die("Couldn't enter data: ".$mysqli->error);
          }  
      
    }
  }
?>

</body>
</html>