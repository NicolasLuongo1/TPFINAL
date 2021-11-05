<!DOCTYPE html>

    <!-- Archivo donde muestra el perfil del usuario logueado -->

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark mb-5">
        <a class="navbar-brand" href="<?php echo FRONT_ROOT ?>student/ShowLoginView" > <span class=navbar-text"></a>
          <strong>Cerrar Sesion</strong>
     </span>

   


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
          </ul>
            <span class="navbar-text">
                Universidad Tecnologica Nacional(UTN)
            </span>
        </div>
    </nav>


    <div class="container justify-content-center align-item-center shadow p-2 mb-5 bg-white rounded border border-dark">
        <div class="row"></div>
        <div class="col-md-8 offset-md-2">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                        aria-selected="true">Datos del usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="<?php echo FRONT_ROOT?>Empresa/ShowListViewStudent" role="tab"
                        aria-controls="profile" aria-selected="false">Empresas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="modificoPerfil"
                        role="tab" aria-controls="contact" aria-selected="false">Modificar Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#LasPropuestasDondeEstaPostulado"
                        role="tab" aria-controls="contact" aria-selected="false">Listado Postulaciones</a>
                </li>
            </ul>



            <div class="tab-content" id="myTabContent">
               
                <div class="row  pt-4"> 
                    <div class="col-4">
                        <img class="img-tumbnaill"src="https://cdn2.iconfinder.com/data/icons/website-icons/512/User_Avatar-512.png"alt=""width="150px"height="150px">
                    </div>
                    <div class="col-8">

                        

                    

                        <div class="form-group row">
                            <label for="legajo" class="col-4">Legajo</label>
                            <div class="col-8">
                            <label for=""><?php echo $student->getStudentId()?></label>
                            </div>
                        </div>

                        <hr style="color: #0056b2;" />

                        <div class="form-group row">
                            <label for="nombre" class= "col-4">Nombre</label>
                            <div class="col-8">
                                <!-- <input type="text" class="form-control" value=""> -->
                                <label for=""><?php echo $student->getfirstName()?></label>
                            </div>
                        </div>

                        <hr style="color: #0056b2;" />

                        <div class="form-group row">
                            <label for="apellido" class="col-4">Apellido</label>
                            <div class="col-8">
                            <label for=""><?php echo $student->getLastName()?></label>
                            </div>
                        </div>

                        <hr style="color: #0056b2;" />

                        <div class="form-group row">
                            <label for="dni" class="col-4">Dni</label>
                            <div class="col-8">
                            <label for=""><?php echo $student->getDni()?></label>
                            </div>
                        </div>

                        <hr style="color: #0056b2;" />

                        <div class="form-group row">
                            <label for="phoneNumber" class="col-4">Numero Telefono</label>
                            <div class="col-8">
                            <label for=""><?php echo $student->getPhoneNumber()?></label>
                            </div>
                        </div>

                        <hr style="color: #0056b2;" />

                        <div class="form-group row">
                            <label for="gender" class="col-4">Genero</label>
                            <div class="col-8">
                            <label for=""><?php echo $student->getGender()?></label>
                            </div>
                        </div>

                        <hr style="color: #0056b2;" />

                        <div class="form-group row">
                            <label for="birthDate" class="col-4">Fecha de nacimiento</label>
                            <div class="col-8">
                            <label for=""><?php echo $student->getBirthDate()?></label>
                            </div>
                        </div>

                        <hr style="color: #0056b2;" />

                        <div class="form-group row">
                            <label for="email" class="col-4">Email</label>
                            <div class="col-8">
                            <label for=""><?php echo $student->getEmail()?></label>
                            </div>
                        </div>

                        <hr style="color: #0056b2;" />

                        <div class="form-group row">
                            <label for="fileNumber" class="col-4">Numero de archivo</label>
                            <div class="col-8">
                            <label for=""><?php echo $student->getFileNumber()?></label>
                            </div>
                        </div>
                       
                        <hr style="color: #0056b2;" />

                        <!-- <div class="form-group text center">
                            <button class="btn btn-info">Actualizar</button>
                            </div>
                       -->
                    </div>





                </div>


                </div>





                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
            </div>
        </div>
    
    
    
        </body>

</html>