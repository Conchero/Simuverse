<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/backend/Controllers/BaseController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/backend/Entities/Body.php");
class BodyController extends BaseController
{

    function __construct()
    {
        parent::__construct();
    }



    function CreateBody(string $_name, string $_mass, string $_rotationSpeed, string $_radius, string $_distanceFromPrimaryBody, int $_system_id)
    {
        $tmpBody = new Body($_name, $_mass, $_rotationSpeed, $_radius, $_distanceFromPrimaryBody, $_system_id);
        if ($tmpBody->CheckIntegrity()) {
            $sql = "INSERT INTO body VALUES(DEFAULT, ?,?,?,?,?,?)";
            $result = $this->dbController->GetDBH()->prepare($sql);
            $result->execute([
                $tmpBody->GetName(),
                $tmpBody->GetMass(),
                $tmpBody->GetRotationSpeed(),
                $tmpBody->GetRadius(),
                $tmpBody->GetDistanceFromPrimaryBody(),
                $tmpBody->GetSystem_Id()
            ]);
        }
        $tmpBody = null;
    }

    function __destruct()
    {
        parent::__destruct();
    }
}
