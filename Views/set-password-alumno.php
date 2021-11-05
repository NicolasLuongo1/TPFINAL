<?php

// index inicial , es la pantalla inicial donde el user va a logearse

use Models\Student;

include('header.php');
?>
<main class="d-flex align-items-center justify-content-center height-100">
     <div class="content">
          <header class="text-center pb-5">
               <!-- <h2>UTN - MAR DEL PLATA</h2> -->
               <img src="https://mdp.utn.edu.ar/wp-content/uploads/2021/02/UTN_IsoLogoBcoNeg.png" alt="" width="440" height="160" class="pt 5">
          </header>
          
          
          <form action="<?php echo FRONT_ROOT ?>Student/AddwithPassword" method="POST" class="login-form bg-dark-alpha p-5 bg-light shadow"> 
               <div class="form-group">
                    <label for="">Contraseña</label>
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Crea una contraseña" required>

                    <input type="hidden" name="studentId" value="<?php echo $student->getStudentId() ?> " class="form-control">
                    <input type="hidden" name="careerId" value="<?php echo $student->getCareerId() ?>" class="form-control">
                     <input type="hidden" name="firstName" value="<?php echo $student->getfirstName() ?>" class="form-control">
                     <input type="hidden" name="lastName" value="<?php echo $student->getLastName() ?>" class="form-control">
                     <input type="hidden" name="dni" value="<?php echo $student->getDni() ?>" class="form-control">
                     <input type="hidden" name="phoneNumber" value="<?php echo $student->getPhoneNumber() ?>" class="form-control">
                     <input type="hidden" name="gender" value="<?php echo $student->getGender() ?>" class="form-control">
                     <input type="hidden" name="birthDate" value="<?php echo $student->getBirthDate() ?>" class="form-control">
                     <input type="hidden" name="email" value="<?php echo $student->getEmail() ?>" class="form-control">
                     <input type="hidden" name="fileNumber" value="<?php echo $student->getFileNumber() ?>" class="form-control">
                     <input type="hidden" name="active" value="<?php echo $student->getActive() ?>" class="form-control">


                    <button class="btn btn-primary btn-block btn-lg" type="submit">Aceptar</button>
                    <button class="btn btn-danger btn-block btn-lg"  type="delete">Cancelar</button>
                    <!-- Estos input se pasan automaticamente ya se encuentran seteados -->
                  
                  



               </div>   
          </form>

          
          
     </div>
</main>

<?php
include('footer.php')
?>