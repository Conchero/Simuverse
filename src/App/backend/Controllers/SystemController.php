<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/backend/Controllers/BaseController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/backend/Controllers/BodyController.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/backend/Entities/System.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/backend/Entities/Body.php");

class SystemController extends BaseController
{

    function __construct()
    {
        parent::__construct();
    }

    function GetSystem(int $id = -1)
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

                    if (strtolower($_name) === 'solar') {
                        $sql = 'SELECT id FROM star_system WHERE name=:name';
                        $result = $this->dbController->GetDBH()->prepare($sql);
                        $result->bindParam(':name', $_name);
                        $result->execute();
                        $system_id = $result->fetchAll()[0]["id"];

                        echo "System ID " . $system_id;

                        $bodyController = new BodyController();
                        $sun = new Body("sun", "1.9885_pow_30_units_kg", "1.997_units_kmpers", "4.379_pow_6_units_km", "0_units_km", $system_id);

                        $bodyController->CreateBody($sun->GetName(), $sun->GetMass(), $sun->GetRotationSpeed(), $sun->GetRadius(), $sun->GetDistanceFromPrimaryBody(), $system_id);
                    }
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
