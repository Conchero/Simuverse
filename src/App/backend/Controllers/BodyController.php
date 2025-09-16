<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/backend/Controllers/BaseController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/backend/Entities/Body.php");


class BodyController extends BaseController
{

    function __construct(?DatabaseController $_dbContoller = null)
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
                $tmpBody->GetSystemId()
            ]);
        }
        $tmpBody = null;
    }

    function PushBody(array $_newBody)
    {
        try {
            $valuesForSQL = '';
            for ($i = 0; $i < count($_newBody); $i++) {
                if ($_newBody[$i]->CheckIntegrity()) {
                    var_dump($_newBody[$i]);
                    $valuesForSQL .=  "VALUES(DEFAULT,:name_{$i},:mass_{$i},:rotationSpeed_{$i},:radius_{$i},:distance_from_star_{$i}, :system_id_{$i})";
                    if ($i < count($_newBody) - 1)
                        $valuesForSQL .= ",";
                }
            }

            if ($valuesForSQL != '') {
                $sql = "INSERT INTO body {$valuesForSQL}";
                $result = $this->dbController->GetDBH()->prepare($sql);
                for ($i = 0; $i < count($_newBody); $i++) {
                    $result->bindParam(":name_{$i}",$_newBody[$i]->GetName(), PDO::PARAM_STR);
                    $result->bindParam(":mass_{$i}",$_newBody[$i]->GetMass(), PDO::PARAM_STR);
                    $result->bindParam(":rotationSpeed_{$i}",$_newBody[$i]->GetRotationSpeed(), PDO::PARAM_STR);
                    $result->bindParam(":radius_{$i}",$_newBody[$i]->GetRadius(), PDO::PARAM_STR);
                    $result->bindParam(":distance_from_star_{$i}", $_newBody[$i]->GetDistanceFromPrimaryObject(), PDO::PARAM_STR);
                    $result->bindParam(":system_id_{$i}",$_newBody[$i]->GetSystemId(), PDO::PARAM_STR);
                }
                $result->execute();
            }
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function DeleteBody(array $_id)
    {
        try {
            $deleteIdForSQL = '';
            for ($i = 0; $i < count($_id); $i++) {
                $deleteIdForSQL .= ":id_{$i}";
                if ($i < count($_id) - 1)
                    $deleteIdForSQL .= ",";
            }
            var_dump($_id);
            echo $deleteIdForSQL;


            $sql = "DELETE FROM body WHERE id IN ({$deleteIdForSQL})";
            $result = $this->dbController->GetDBH()->prepare($sql);
            for ($i = 0; $i < count($_id); $i++) {
                $result->bindParam(":id_{$i}", $_id[$i]);
            }
            $result->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function __destruct()
    {
        parent::__destruct();
    }
}
