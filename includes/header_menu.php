

<!--Navigation bar start-->
<nav class="navbar fixed-top navbar-expand-sm navbar-dark" style="background-color:rgba(45,169,255)">
            <div class="container">
                    <a href="index.php" class="navbar-brand" class="images/jholan1.png" style="font-family: 'Delius Swash Caps'">Jholsan Uniformes</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="nav navbar-nav">
                       <li class="nav-item dropdown">
                           <a href="" class="nav-link dropdown-toggle" id="navbar-drop" data-toggle="dropdown">
                               Productos
                            </a>
                               <div class="dropdown-menu">
                                   <a href="products.php#watch" class="dropdown-item">Filipinas</a>
                                   <a href="products.php#shirt" class="dropdown-item">Quirurgico</a>
                                   <a href="products.php#shoes" class="dropdown-item">Batas</a>
                                   <a href="products.php#headphones" class="dropdown-item">Accesorios</a>
                               </div>
                           
                       </li>
                       
                       <li><div class="search-container">
                <form action="products.php" method="POST" style="padding:0;">
                <input type="text" placeholder="Search.." name="search_item" value="<?php if(isset($search)){echo $search;} ?>" style="margin: 0;">
                <button type="submit" hidden><i class="fa fa-search "></i></button>
                </form>
            </div></li>

                       <li class="nav-item"><a href="about.php" class="nav-link">Sobre Nosotros</a></li>
                       <?php
                       if (isset($_SESSION['email'])) {
                        ?>
                       <li class="nav-item"><a href="cart.php" class="nav-link">Carrito</a></li>
                       <?php
                          } 
                    ?>
                    </ul>
                    
                    <?php
                if (isset($_SESSION['email'])) {
                    ?>
                    <ul class="nav navbar-nav ml-auto">
                       <li class="nav-item"><a href="logout_script.php" class="nav-link"><i class="fa fa-sign-out"></i>Cerrar sesión</a></li>
                       <li class="nav-item"><a  class="nav-link " data-placement="bottom" data-toggle="popover" data-trigger="hover" data-content="<?php echo $_SESSION['email'] ?>"><i class="fa fa-user-circle "></i></a></li>
                    </ul>
                    <?php
                } else {
                    ?>
                    <ul class="nav navbar-nav ml-auto">
                       <li class="nav-item "><a href="#signup" class="nav-link"data-toggle="modal" ><i class="fa fa-user"></i> Crear cuenta</a></li>
                       <li class="nav-item "><a href="#login" class="nav-link" data-toggle="modal"><i class="fa fa-sign-in"></i> Inicia sesión</a></li>
                    </ul>
                    <?php 
                }
                    ?>
                    </div>
                </div>
            </div>
        </nav>
    <!--navigation bar end-->
    <!--Login trigger Modal-->
    <div class="modal fade" id="login" >
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content"style="background-color:rgba(255,255,255,0.95)">

            <div class="modal-header">
              <h5 class="modal-title">Inicia sesión</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <form action="login_script.php" method="post">
                 <div class="form-group">
                     <label for="email">Correo:</label>
                     <input type="email" class="form-control"  name="lemail" placeholder="Ejemplo12@gmail.com" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd"  name="lpassword" placeholder="12345678" required>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input">
                    <label for="checkbox" class="form-check-label">Echar un vistazo</label>
                </div>
                <button type="submit" class="btn btn-secondary btn-block" name="Submit">Iniciar Sesión</button>
              </form>
              <a href="http://">Olvidaste tu contraseña?</a>
            </div>
            <div class="modal-footer">
            <p class="mr-auto">Nuevo Usuario? <a href="#signup" data-toggle="modal" data-dismiss="modal" >Incia Sesión</a></p>
              <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    <!--Login trigger Model ends-->
    <!--Signup model start-->
    <div class="modal fade" id="signup">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content" style="background-color:rgba(255,255,255,0.95)">

            <div class="modal-header">
              <h5 class="modal-title">Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <form action="signup_script.php" method="post">
                <div class="form-group">
                     <label for="email">Ingrese su Correo:</label>
                     <input type="email" class="form-control"  name="eMail" placeholder="Ejemplo12@gmail.com" required>
                     <?php if(isset($_GET['error'])){ echo "<span class='text-danger'>".$_GET['error']."</span>" ;}  ?>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" name="password" placeholder="12345678" required>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="validation1">Nombres</label>
                        <input type="text" class="form-control" id="validation1" name="firstName" placeholder="Daniel" required>
                    </div>
                    <div class="form-group col-md -6">
                        <label for="validation2">Apellidos</label>
                        <input type="text" class="form-control" id="validation2" name="lastName" placeholder="Sierra">
                    </div>
                </div>
                
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" required>
                    <label for="checkbox" class="form-check-label">Acepto términos y condiciones</label>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="Submit">Iniciar Sesión</button>
              </form>
            </div>
            <div class="modal-footer">
              <p class="mr-auto">Ya tienes una cuenta?<a href="#login"  data-toggle="modal" data-dismiss="modal">Inicia Sesión</a></p>
              <br</br>
              <!--Signup for Administrator-->
            
             <p class="mr-auto">Eres admin? <a href="login.html">Soy admin</a></p>
              
              <!---->
              <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <!--Signup trigger model ends-->
          