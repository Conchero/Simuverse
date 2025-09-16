<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/backend/Controllers/BodyController.php");

class SystemManager
{

    public static function CreateBodyWithinSystem(array $_bodyParameters)
    {
        $bodyController = new BodyController();

        

        $newBody = new Body($_bodyParameters["name"], $_bodyParameters["mass"], $_bodyParameters["rotationSpeed"], $_bodyParameters["radius"], $_bodyParameters["distanceFromStar"], $_bodyParameters["systemId"]);
        
        $bodyController->PushBody([$newBody]);
        
        //$sun2 = new Body("sun2", "1.9885_pow_30_units_kg", "1.997_units_kmpers", "4.379_pow_6_units_km", "0_units_km", $system_id);
    }


    public static function GetSystemId(PDO $_dbh, string $_systemName): int
    {
        $sql = 'SELECT id FROM star_system WHERE name=:name';
        $result = $_dbh->prepare($sql);
        $result->bindParam(':name', $_systemName);
        $result->execute();
        $system_id = $result->fetchAll()[0]["id"];

        return $system_id;
    }
}
