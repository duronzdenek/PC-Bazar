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
if(!isset($_SESSION['cat'])){
      ?>
    <script>
    window.location.replace('http://student.sspbrno.cz/~duron.zdenek/pcbazar/home.php');
    </script>
    <?php  
} 
?>                     
       <div class="container">
       
       <div class="row">      
        <div class="col-md-12">
          <h5><i class="fa fa-file-text" aria-hidden="true"></i>&nbspNalezené inzeráty</h5>
          <hr style="width: 100%; color: black; height: 1px; background-color:#aaa;" />   
        </div>      
      </div>
      
     <?php
     require_once("MySQL.php");
     $result=$conn->query("SELECT id FROM pcb_inzerat WHERE category='".$_SESSION['cat']."'");
     if(mysqli_num_rows($result)!=NULL)
     {
     
     echo "<div class='container'>
            <form action='' method='POST'>
            <table class='table'>
              ";
        $result=$conn->query("SELECT id, name , seen, description, path, category FROM pcb_inzerat WHERE category='".$_SESSION['cat']."'");      
        while ($row=mysqli_fetch_assoc($result)){;
        echo "                
               
               <thead class='thead-dark'>
              <tr>
                <th scope='col'>".$row['name']."</th> 
                <th scope='col'>Popis</th>
                <th scope='col'></th>
                <th scope='col'></th>
                <th scope='col'></th>
                <th scope='col'></th>
                <th scope='col'></th>
                <th scope='col'></th>
                <th scope='col'></th>
                <th scope='col'></th>
                <th scope='col'></th>
                <th scope='col'></th>
                <th scope='col'></th>
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
            </tr>
          ";
     
      if(isset($_POST[$row['id']])){
        redirect($row['id']);
      }
     }
     echo "
          </tbody>
          </table>
          </form>  
          </div>
          <br>
        <hr style='width: 100%; color: black; height: 1px; background-color:#aaa;' />           
            <div class='row'> 
              <div class='col-md-12'>
                <h5>&nbsp&nbsp&nbsp&nbsp&nbspVíce jich tu není...</h5>
              </div>
            </div>";
     }
     else{
       echo"<br> 
            <div class='row'> 
              <div class='col-md-12'>
                <h5>Nenašel jsem žádný inzerát...</h5>
              </div>
            </div>
            
          <div class='row'>
          <div class='col-md-2'>                       
            <br>                                 
                        
            <a class='btn btn-dark' href='search.php' role='button' ><i class='fa fa-search' aria-hidden='true'></i>&nbspHledat znovu                          
            </a>                            
          </div>
         </div> 
          ";
     }
     unset($_SESSION['cat']);
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