<?php

    // Archivo donde se controlan las empresas y se redirigen las vistas del mismo
    namespace Controllers;

    use DAO\EmpresaDAO as EmpresaDAO;
    use DAO\StudentDAO as StudentDAO;
    use DAO\AdminDAO as AdminDAO;



use Models\Empresa as Empresa;

    class EmpresaController
    {
        private $EmpresaDAO;
        private $StudentDAO;
        private $AdminDAO;

        public function __construct()
        {
            $this->EmpresaDAO = new EmpresaDAO();
            $this->StudentDAO = new StudentDAO();
            $this->AdminDAO = new AdminDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."empresa-add.php");
        }

        public function ShowListView()
        {
            $empresaList = $this->EmpresaDAO->GetAll();

            require_once(VIEWS_PATH."empresa-list.php");
        }
        public function ShowListViewStudent()
        {
            $empresaList = $this->EmpresaDAO->GetAll();

            require_once(VIEWS_PATH."empresa-list-student.php");
        }

        public function ShowPerfilEmpresaViewActual($empresa)
        {
            $empresaList = $this->EmpresaDAO->GetAll();
            require_once(VIEWS_PATH."perfil-empresa.php");
        }

        public function ShowPerfilEmpresaViewActualAdmin($empresa)
        {
            $empresaList = $this->EmpresaDAO->GetAll();
            require_once(VIEWS_PATH."perfil-empresa-admin.php");
        }

        public function ModListEmpresa($empresa)
        {
            $empresaList = $this->EmpresaDAO->GetAll();
            require_once(VIEWS_PATH."empresa-mod.php");
        }

        public function RegisterEmpresa()
        {
            require_once(VIEWS_PATH."registerCompany.php");
        }



        // public function Add($name, $countryOrigin, $direction,$description,$img)
        // {
        //     $empresa = new Empresa();
        //     $empresa->setName($name);

        //     // $empresa->setCountryOrigin($countryOrigin);
        //     // $empresa->setDirection($direction);
        //     // $empresa->setDescription($description);
        //     // $empresa->setImg($img);

        //     $this->EmpresaDAO->Add($empresa);
        //     $this->ShowAddView();
        // }

        public function empresaValidation($nameEmpresa){
     
            $empresaList = $this->EmpresaDAO->GetAll(); // tengo los 200 alumnos cargados en esta lista, comprobado!
            $cant = count($empresaList);

            for($i=0 ; $i<$cant; $i++) {

                if($empresaList[$i]->getName() == $nameEmpresa){
                    $empresa = $empresaList[$i];
                    $this->ShowPerfilEmpresaViewActual($empresa); // si es correcto me lleva al perfil del student
                }
            
            }
        }


        public function empresaValidationAdmin($nameEmpresa){

            $empresaList = $this->EmpresaDAO->GetAll(); // tengo los 200 alumnos cargados en esta lista, comprobado!
            $cant = count($empresaList);

            for($i=0 ; $i<$cant; $i++) {

                 if($empresaList[$i]->getName() == $nameEmpresa){
                    $empresa = $empresaList[$i];
                    $this->ShowPerfilEmpresaViewActualAdmin($empresa);
                }              
            }
            
           
        }

        public function empresaModAdmin($nameEmpresa){

            $empresaList = $this->EmpresaDAO->GetAll(); // tengo los 200 alumnos cargados en esta lista, comprobado!
            $cant = count($empresaList);

                for($i=0 ; $i<$cant; $i++) {

                    if($empresaList[$i]->getName() == $nameEmpresa){
                        $empresa = $empresaList[$i];
                        $this->ModListEmpresa($empresa);
                    }
                }
        }

        public function removeEmpresaAdmin($nameEmpresa){

            $empresaList = $this->EmpresaDAO->GetAll();

            $cant = count($empresaList);
            $i = 0;
            $flag = false;
            while($i < $cant && $flag == false){

                if($empresaList[$i]->getName() == $nameEmpresa){
                    $flag = true;
                    $aux = $i;
                    $this->EmpresaDAO->RemoveData($aux);
                }
                $i++;
            }
            $this->ShowListView();

        }

        public function ModifyEmpresaAdmin($oldName,$name,$direction,$description,$countryOrigin){

            $empresaList = $this->EmpresaDAO->GetAll();

            $oldName = $_POST['oldName'];
            $name = $_POST['name'];
            $direction = $_POST['direction'];
            $countryOrigin = $_POST['countryOrigin'];
            $description = $_POST['description'];

            $cant = count($empresaList);
            $i = 0;
            $flag = false;
            while($i < $cant && $flag == false){

                if($oldName == $empresaList[$i]->getName()){
                    $flag = true;
                    
                    $empresaList[$i]->setName($name);
                    $empresaList[$i]->setDirection($direction);
                    $empresaList[$i]->setCountryOrigin($countryOrigin);
                    $empresaList[$i]->setDescription($description);
                }
                $i++;
            }
            $this->EmpresaDAO->ModifyData($empresaList);
            $this->ShowListView();
        }



        public function bringEmpresaRegister($email,$password,$name){
            
            // hacer la verificacion para que no pueda registrarse dos veces la misma empresa ni con un email existente

            if($this->AdminDAO->AdminExist($email)){

                echo "el mail ya existe lo tiene un admin<br>";

            }

            else if($this->StudentDAO->studentExistRegister($email)){


                echo "el mail ya existe lo tiene un student<br>";

            }

            else{

                if($this->EmpresaDAO->CompanyExist($email)){

                    echo "ese mail ya existe en una empresa";

                }



                else{

                            
                $email = $_POST['email'];
                $password = $_POST['password'];
                $name = $_POST['name'];
          

                $empresa = new empresa();

                $empresa->setEmail($email);
                $empresa->setPasword($password);
                $empresa->setName($name);
                $empresa->setRole('Company');
                


                      $this->EmpresaDAO->add($empresa);
                        $this->ShowPerfilEmpresaViewActual($empresa);

                }
                

            }

          
                    }
                   
                    
                    
                



        




    }
?>