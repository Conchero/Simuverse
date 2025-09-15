<?php

require_once('vendor/autoload.php');
require_once($_SERVER["DOCUMENT_ROOT"] . "/backend/Controllers/DatabaseController.php");


abstract class BaseController
{
    protected ?DatabaseController $dbController;

    function __construct()
    {
        $this->dbController = new DatabaseController();
    }


    function __destruct()
    {
        $this->dbController = null;
    }
}
