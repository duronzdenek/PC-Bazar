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
if(isset($_SESSION['logged_id'])){
  include("horni_bar_logged.php");
}
else{
 include("horni_bar_checked.php");
}  
?>                     
       <div class="container">
       
       <div class="row">      
        <div class="col-md-12">
        <h5><i class="fa fa-file-text" aria-hidden="true"></i>&nbspPoslední přidané inzeráty</h5>
        <hr style="width: 100%; color: black; height: 1px; background-color:#aaa;" />   
      </div>      
      </div>
      
     <?php
     require_once("MySQL.php");
     $result=$conn->query("SELECT id FROM pcb_inzerat ORDER BY id DESC");
     if(mysqli_num_rows($result)!=NULL)
     {
     echo "<div class='container'>
            <form action='' method='POST'>
            <table class='table'>
              ";
     
    
     $rows=$result->fetch_array();
     $rows=$rows['id'];
     
     while($rows!=0){ 
    
        $result=$conn->query("SELECT id, name , seen, description, path, category, price FROM pcb_inzerat WHERE id='".$rows."'");      
        $row=$result->fetch_array();
        echo "                
               
               <thead class='thead-dark'>
              <tr>
                <th scope='col'>".$row['name']."</th> 
                <th scope='col'>Popis</th>
                <th colspan='11' scope='col'></th>
                <th scope='col'>Počet zobrazení</th>
                <th scope='col'>Kategorie </th> 
              </tr>
          </thead>
          <tbody>
               <tr>
                <th><img src='".$row['path']."' class='img-fluid' max-width:'3'></th>
                <td colspan='12'>".$row['description']."</td>
                <td>".$row['seen']."</td>
                <td>".categoryChoose($row['category'])."</td>
              </tr>
            <tr>  
            <td><input class='btn btn-dark' type='submit' id='".$row['id']."' name='".$row['id']."' value='Přejít na inzerát'><td>
            <th colspan='10'>Cena: ".$row['price']." Kč</th>                             
            </tr>
          ";
     
      if(isset($_POST[$row['id']])){
        redirect($row['id']);
      }
        $rows=$rows-1;
        $ech[]=$row['id'];
     }
     echo '
          </tbody>
          </table>
          </form>  
          </div>';
     }
     ?>
    
    <br>       
</div>                                                                                                                                                                         
    <!-- Optional JavaScript -->                                                                         
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->                       
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>                       
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>                       
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>                                       
  </body>
</html>