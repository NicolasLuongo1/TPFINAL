<?php

// index inicial , es la pantalla inicial donde el user va a logearse

include('header.php');
?>
<main class="d-flex align-items-center justify-content-center height-100">
     <div class="content">
          <header class="text-center pb-5">
               <!-- <h2>UTN - MAR DEL PLATA</h2> -->
               <img src="https://mdp.utn.edu.ar/wp-content/uploads/2021/02/UTN_IsoLogoBcoNeg.png" alt="" width="440" height="160" class="pt 5">
          </header>

         <form action="<?php echo FRONT_ROOT ?>Admin/registerAdmin" method="POST" class="login-form bg-dark-alpha p-5 bg-light shadow"> 
               <div class="form-group">
                    <label for="">Ingrese un Email</label>
                    <input type="text" name="email" class="form-control form-control-lg" placeholder="Ingresar Email" required>
               </div>


               <div class="form-group">
                    <label for=""> Ingrese una Contraseña</label>
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Ingresar contraseña" required>
               </div>

               <div class="form-group">
                    <label for=""> Nombre de Administrador</label>
                    <input type="text" name="name" class="form-control form-control-lg" placeholder="Ingresar nombre" required>
               </div>


               <button class="btn btn-primary btn-block btn-lg" type="submit">Aceptar</button>
               <button class="btn btn-primary btn-block btn-lg" type="cancel" onclick="javascript:window.location='<?php echo FRONT_ROOT ?>student/ShowLoginView';" >Cancelar</button>
               
               
          </form>
     </div>
</main>

<?php
include('footer.php')
?>