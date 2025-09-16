<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/backend/Controllers/BaseController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/backend/Controllers/BodyController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/backend/Services/SystemManager.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/backend/Entities/System.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/backend/Entities/Body.php");

class SystemController extends BaseController
{

    function __construct(?DatabaseController $_dbContoller = null)
    {
        parent::__construct();
    }

    function GetAllSystem()
    {
        try {
            $sql = 'SELECT * FROM star_system ';
            $result = $this->dbController->GetDBH()->prepare($sql);
            $result->execute();

            return $result->fetchAll();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function GetSystemWithLinkedBodies(int $id)
    {
        try {
            $sql = 'SELECT b.*, st.name as system_name FROM star_system as st JOIN body as b ON st.id = b.system_id WHERE st.id = :id';
            $result = $this->dbController->GetDBH()->prepare($sql);
            $result->bindParam(":id", $id);
            $result->execute();
            $systemFetched = $result->fetchAll();
            print_r($systemFetched);
            return $systemFetched;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function CreateSystem(string $_name)
    {
        if ($_POST) {
            try {
                $tmpSystem = new System($_name);
                if ($tmpSystem->CheckIntegrity()) {
                    $sql = 'INSERT INTO star_system VALUES(DEFAULT, :name)';
                    $result = $this->dbController->GetDBH()->prepare($sql);
                    $result->bindParam(':name', $_name);
                    $result->execute();

                    $tmp_BodyParameters = array(
                        "name" => "sun",
                        "mass" => "1.9885_pow_30_units_kg",
                        "rotationSpeed" => "1.997_units_kmpers",
                        "radius" => "4.379_pow_6_units_km",
                        "distanceFromStar" => "0_units_km",
                        "systemId" => SystemManager::GetSystemId($this->dbController->GetDBH(), $_name)
                    );
                    $tmp_Body2Parameters = array(
                        "name" => "mercury",
                        "mass" => "3.301_pow_23_units_kg",
                        "rotationSpeed" => "10.83_units_kmperh",
                        "radius" => "2439.7_units_km",
                        "distanceFromStar" => "0.39_units_au",
                        "systemId" => SystemManager::GetSystemId($this->dbController->GetDBH(), $_name)
                    );

                    SystemManager::CreateBodyWithinSystem([$tmp_BodyParameters, $tmp_Body2Parameters]);
                }
            } catch (PDOException $e) {
                echo $e;
            }
        }
    }



    function DeleteSystem(int $_id)
    {
        if ($_POST) {

            try {

                $sql = 'SELECT body.id,body.name FROM body JOIN star_system ON body.system_id = star_system.id';
                $result = $this->dbController->GetDBH()->prepare($sql);
                $result->execute();
                $linkedBodyArray = $result->fetchAll();
                $linkedBodyIdArray = array();

                for ($i = 0; $i < count($linkedBodyArray); $i++) {
                    array_push($linkedBodyIdArray, $linkedBodyArray[$i]["id"]);
                }

                if (count($linkedBodyIdArray) > 0) {
                    $bodyController = new BodyController();
                    $bodyController->DeleteBody($linkedBodyIdArray);
                    $bodyController = null;
                }

                $sql = 'DELETE FROM star_system WHERE id=:id';
                $result = $this->dbController->GetDBH()->prepare($sql);
                $result->bindParam(':id', $_id, PDO::PARAM_INT);
                $result->execute();
            } catch (PDOException $e) {
                echo $e;
            }
        }
    }


    function __destruct()
    {
        parent::__destruct();
    }
}
