<!DOCTYPE html>

<!-- Archivo donde muestra los datos especificos de la empresa -->

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
    <a class="navbar-brand" href="<?php

use Models\Empresa;

echo FRONT_ROOT ?>Student/ShowLoginView"> <strong>Cerrar Sesion</strong> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
      </ul>
        <span class="navbar-text">
            <img src="https://mdp.utn.edu.ar/wp-content/uploads/2021/02/UTN_IsoLogoBcoNeg.png" alt="" width="140" height="60"> 
        </span>
    </div>
</nav>



<div class="container justify-content-center align-item-center shadow p-3 mb-5 bg-white rounded">
    <div class="row"></div>
    <div class="col-md-8 offset-md-2">
        <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Datos de la empresa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Ofertas Laborales</a>
            </li>

        </ul> -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Datos del usuario</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="<?php echo FRONT_ROOT?> poner redireccionamiento de ofertas laborales" role="tab"
                    aria-controls="profile" aria-selected="false">Ofertas Laborales</a>
            </li>
        </ul>



        <div class="tab-content" id="myTabContent">
           
            <div class="row  pt-4"> 
                <div class="col-4">
                    <img class="img-tumbnaill"src="https://cdn2.iconfinder.com/data/icons/website-icons/512/User_Avatar-512.png"alt=""width="150px"height="150px">
                </div>
                


                <form action="<?php echo FRONT_ROOT?>Empresa/ModifyEmpresaAdmin" method="POST"> 
                <div class="col-8">

                    <div class="form-group row">
                        <div class="col-8">
                        <input type="hidden" name="oldName" value="<?php echo $empresa->getName() ?>" class="form-control" >
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="apellido" class="col-4">Nombre nuevo</label>
                        <div class="col-8">
                        <input type="text" name="name" value= "<?php echo $empresa->getName() ?>" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="apellido" class="col-4">Direccion nueva</label>
                        <div class="col-8">
                        <input type="text" name="direction" value="<?php echo $empresa->getDirection() ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="apellido" class="col-4">Pais de origen nuevo</label>
                        <div class="col-8">
                        <input type="text" name="countryOrigin" value="<?php echo $empresa->getCountryOrigin() ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="apellido" class="col-4">Descripcion nueva</label>
                        <div class="col-8">
                        <input type="text" name="description" value="<?php echo $empresa->getDescription() ?>" class="form-control">
                        </div>
                    </div>

                  

                    <!-- <div class="form-group text center">
                        <button class="btn btn-info">Actualizar</button>
                        </div>
                   -->
                </div>

                <button type="submit"> modificar </button>
</form>




            </div>


            </div>





            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        </div>
    </div>



    </body>

</html>