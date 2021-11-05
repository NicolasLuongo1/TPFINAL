<?php
    namespace DAO;

    use DAO\IEmpresaDAO as IEmpresaDAO;
    use Models\Empresa as Empresa;

    class EmpresaDAO implements IEmpresaDAO
    {
        private $empresaList = array();

        public function Add(Empresa $empresa)
        {
            $this->RetrieveData();
            
            array_push($this->empresaList, $empresa);

            $this->SaveData();
        }

        public function RemoveData($index){
            $this->RetrieveData();

            unset($this->empresaList[$index]);

            $this->SaveData();
        }

        public function ModifyData($nuevaLista){

            $this->empresaList = $nuevaLista;
            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->empresaList;
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->empresaList as $empresa)
            {
              //  $valuesArray["idEmpresa"] = $empresa->getIdEmpresa();
                $valuesArray["name"] = $empresa->getName();
                $valuesArray["countryOrigin"] = $empresa->getCountryOrigin();
                $valuesArray["direction"] = $empresa->getDirection();
                $valuesArray["description"] = $empresa->getDescription();
                $valuesArray["img"] = $empresa->getImg();

                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/empresa.json', $jsonContent);
        }

        private function RetrieveData()
        {
            $this->empresaList = array();

            if(file_exists('Data/empresa.json'))
            {
                $jsonContent = file_get_contents('Data/empresa.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $empresa = new Empresa();
                   // $empresa->setIdEmpresa($valuesArray["idEmpresa"]);
                    $empresa->setName($valuesArray["name"]);
                    $empresa->setCountryOrigin($valuesArray["countryOrigin"]);
                    $empresa->setDirection($valuesArray["direction"]);
                    $empresa->setDescription($valuesArray["description"]);
                    $empresa->setImg($valuesArray["img"]);
                    array_push($this->empresaList, $empresa);
                }
            }
        }

        
    }
?>