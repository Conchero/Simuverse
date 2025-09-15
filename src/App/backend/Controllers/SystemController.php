<?php

require_once('vendor/autoload.php');
require_once($_SERVER["DOCUMENT_ROOT"]."/backend/Controllers/DatabaseController.php");

class SystemController
{
    protected ?DatabaseController $dbController;

    function __construct() {
        $this->dbController = new DatabaseController();
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

    function CreateSystem()
    {
        if ($_POST) {

            try {
                $sql = 'INSERT INTO star_system VALUES(DEFAULT, :name)';
                $result = $this->dbController->GetDBH()->prepare($sql);
                $result->bindParam(':name', $_POST['system_name']);
                $result->execute();


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
                $result->bindParam(':id', $_id,PDO::PARAM_INT);
                $result->execute();
            } catch (PDOException $e) {
                echo $e;
            }
        }
    }


    function __destruct()
    {
        $this->dbController = null;
        echo 'Destroying System Controller';
    }

}
