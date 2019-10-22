<header>
    <div class="w-100 d-flex flex-column flex-md-row align-items-center p-3 px-md-4  bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto text-primary h4 ">
          <img src="../Assets/Img/Logo.png" width="150" ></h5>
      <nav class="my-2 my-md-0 mr-md-3">
          <?php
            @session_start();
            if (isset($_SESSION['usuario'])) {
                echo " <a class='p-2 text-dark' href='#'>Mis medicamentos</a>
                    <a class='p-2 text-dark' href='#'>Mis citas</a>
                    <a class='p-2 text-dark' href='DoctorCRUD.php'>Doctores</a>
                    </nav>
                   <a class='btn btn-outline-primary mr-4' href='AgendarCita.php'>Pedir Cita</a>
                   <a class='btn btn-outline-danger' href='?salir'>Salir</a>";
            }else{
                echo "<a class='p-2 text-dark' href='#'>Galardones</a>
                    <a class='p-2 text-dark' href='#'>Doctores</a>
                    <a class='p-2 text-dark' href='#'>Conocenos</a>
                    <a class='p-2 text-dark' href='RegUsuario.php'>Registrate</a>
                  </nav>
                    <a class='btn btn-outline-primary' href='LoginUsuario.php'>Ingresar</a>";
            }
            
            if (isset($_GET['salir'])) {
                session_start();
                session_destroy();
                header("location:LoginUsuario.php");
            }
          ?>
    </div>
</header>