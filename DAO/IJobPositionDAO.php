<?php
    namespace DAO;

    use Models\JobPositions as JobPosition;

    interface IJobPositionDAO
    {
        function Add(JobPosition $jobPositions);
        function GetAll();
    }
?>
