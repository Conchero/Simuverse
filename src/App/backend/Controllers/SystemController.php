<?php

require_once('vendor/autoload.php');

//phpinfo();
class SystemController
{


    function __construct() {}

    function GetSystem(int $id = -1)
    {
        try {
            $dsn = 'pgsql:dbname=universe;host=db;port=5432';
            $user = 'postgres';
            $password = 'simuversepassword';
            $dbh = new PDO($dsn, $user, $password);
            $sql = 'SELECT * FROM star_system ';
            $result = $dbh->prepare($sql);
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
                $dsn = 'pgsql:dbname=universe;host=db;port=5432';
                $user = 'postgres';
                $password = 'simuversepassword';
                $dbh = new PDO($dsn, $user, $password);

                $sql = 'INSERT INTO star_system VALUES(DEFAULT, :name)';
                $result = $dbh->prepare($sql);
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
                $dsn = 'pgsql:dbname=universe;host=db;port=5432';
                $user = 'postgres';
                $password = 'simuversepassword';
                $dbh = new PDO($dsn, $user, $password);

                var_dump($_id);
                $sql = 'DELETE FROM star_system WHERE id=:id';
                $result = $dbh->prepare($sql);
                $result->bindParam(':id', $_id,PDO::PARAM_INT);
                $result->execute();
            } catch (PDOException $e) {
                echo $e;
            }
        }
    }

}
