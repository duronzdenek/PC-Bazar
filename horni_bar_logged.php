<nav class="navbar navbar-expand-md  navbar-dark bg-dark" style="background:#aaa">                                                                     
      <ul class="navbar-nav">
        <li>                                                                                        
        <a class="nav-link font-weight-bold" href="home.php"><i class="fa fa-laptop" aria-hidden="true"></i>&nbspPočítačový Bazar</a>                                                                                     
        </li>
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        <li class="nav-item">                                                              
          <a href="new_inzerat.php" class="btn btn-secondary" role="button"><i class="fa fa-plus" aria-hidden="true"></i>&nbspVložit inzerát</a>                                                 
        </li> 
        &nbsp 
        <br>
       </ul>
       <?php
       
       if(isset($_SESSION['logged_id'])){
          require_once("MySQL.php");
          $sql_f="SELECT first_name FROM  pcb_uzivatel WHERE id ='".$_SESSION['logged_id']."'";
          $kvery = $conn->query($sql_f);
          $row_f=$kvery->fetch_array();
          $sql_l="SELECT last_name FROM  pcb_uzivatel WHERE id ='".$_SESSION['logged_id']."'";
          $kvery_l = $conn->query($sql_l);
          $row_l=$kvery_l->fetch_array();
       echo "
        <ul class='navbar-nav ml-auto justify-content-end'> 
          <li class='nav-item'>
            
            <a href='profile.php' class='nav-link font-weight-bold'>".$row_f['first_name']." ".$row_l['last_name']."</a>

          </li>
          <li class='nav-item'>
            
            <a href='options.php' class='nav-link'></i>&nbspNastavení</a>

          </li>
          
          <li class='nav-item'>
            
            <a href='signout.php' class='nav-link'></i>&nbspOdhlásit se</a>

          </li>
        </ul>                                                                                         
    </nav>
       
       ";
       
       
       }
       else{
       
       echo "
      <ul class='navbar-nav ml-auto justify-content-end'> 
        <li class='nav-item'>
       <!--Přihlášení menu -->
       <a href='login.php' class='btn btn-secondary' role='button'>&nbspPřihlásit se</a>
       <!--
        <div class='dropdown'>
          <button href='login.php' class='btn btn-secondary' type='button' id='login' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
          Přihlásit se
          </button>
         
       <div class='dropdown-menu'>
        <form class='px-4 py-3'>
         <div class='form-group'>
            <label for='nickname_dropdown'>Přezdívka</label>
            <input type='text' class='form-control' id='nickname_dropdown' name='nickname_dropdown'>
         </div>
           <div class='form-group'>
            <label for='password_dropdown'>Heslo</label>
            <input type='password' class='form-control' id='password_dropdown' name='password_dropdown'>
          </div>
          <button type='submit' class='btn btn-faded' id='submit_dropdown_login' name='submit_dropdown_login'>Přihlásit se</button>
       </form>
     
      <div class='dropdown-divider'></div>
        <a class='dropdown-item' href='register.php'>Nemáš účet? Vytvoř si ho zde!</a>
        <a class='dropdown-item' href='#'>Zapomenuté heslo?</a>
      </div>
    </div>
    -->
      <!--End_Přihlášení menu -->
                                                                                     
        </li>
        <li class='nav-item'>                                                              
          <a class='nav-link' href='register.php'>Nemáš účet? Vytvoř si ho zde!</a>                                                    
        </li>                  
       </ul>                                                                                         
    </nav>";
    }
    ?>
                                                     
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