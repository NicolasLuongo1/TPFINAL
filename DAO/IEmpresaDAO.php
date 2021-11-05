<?php
    namespace DAO;

    use Models\Empresa as Empresa;

    interface IEmpresaDAO
    {
        function Add(Empresa $empresa);
        function GetAll();
    }
?>