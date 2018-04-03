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
      <form action="" method="POST" enctype="multipart/form-data">
       <div class="row">             
        <div class="col-md-12">
          <h5><i class="fa fa-file-text" aria-hidden="true"></i>&nbspPřidání fotografie</h5> 
        </div>      
     </div>           
      
      <br>    
                   
        <div class="row">
           <div class="col-md-4">
             <div class=form-group>
              <input type="file" class="form-control-file" name="img1"> 
             </div>
           </div>
        </div>

        <?php 
  
  if(isset($_POST['submit_inzerat'])){
   $img1=$_FILES['img1']['tmp_name'];
    if(getimagesize($img1)===false)
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
          <p><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp Přidáním kvalitní fotky docílíte větší šance prodeje vašeho produktu. </p>
        </div>      
      </div>
     <hr style="width: 100%; color: black; height: 1px; background-color:#aaa;" />
      <p><i class="fa fa-exclamation-circle"></i>&nbspPřidáním inzerátu souhlasíte s použitím vašich osobních údajů (jména, emailu a tel. čísla) ve výše uvedeném inzerátu. </p>

      <div class="row">
        <div class="col-md-6">
          <input class="btn btn-dark" type="submit" id="submit_inzerat" name="submit_inzerat" value="Přidat inzerát"> 
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
    if(getimagesize($_FILES['img1']['tmp_name'])){
      extract($_POST);
    $name=$_SESSION['name'];      
    $popis=$_SESSION['description'];
    $category=$_SESSION['category'];
    $sql="INSERT INTO pcb_inzerat (name, description, id_pcb_uzivatel, seen, category) VALUES ('".$name."','".$popis."','".$_SESSION['logged_id']."','0', '".$category."')";
    $kvery = $conn->query($sql);
    $sql="SELECT id FROM pcb_inzerat ORDER BY id DESC LIMIT 1";
    $kvery = $conn->query($sql);   
    $row = $kvery->fetch_array();
    $id=$row['id'];
    $ext=pathinfo($_FILES['img1']['name'],PATHINFO_EXTENSION);
    $popis=htmlspecialchars($popis);
    $filepath = "images/".$id.".".$ext;
    $sql="UPDATE pcb_inzerat SET path='".$filepath."' WHERE  id ='".$id."'";
    $kvery = $conn->query($sql);                                                 
    $x=move_uploaded_file($_FILES['img1']['tmp_name'], $filepath);
    $_SESSION['inzerat_id']=$id;
    unset($_SESSION['name']);
    unset($_SESSION['description']);
    unset($_SESSION['category']);
    ?>
    <script>
    window.location.replace('http://student.sspbrno.cz/~duron.zdenek/pcbazar/show_inzerat.php');
    </script>
    <?php 
    } 
  }
?>

</body>
</html>