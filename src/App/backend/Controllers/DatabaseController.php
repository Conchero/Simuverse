<?php

require_once('vendor/autoload.php');

class DatabaseController
{
    protected ?string $dsn;
    protected ?string $user;
    protected ?string $password;
    protected ?PDO $dbh;
    function __construct()
    {
        // $env = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '.env');
        // $this->dsn = 'pgsql:dbname='.$env["POSTGRES_NAME"].';host='.$env["POSTGRES_HOST"].';port='.$env["POSTGRES_PORT"].'';
        // $this->user = $env["POSTGRES_USER"];
        // $this->password =  $env["POSTGRES_PASSWORD"];
        // $this->dbh = new PDO($this->dsn, $this->user, $this->password);
        $this->dsn = 'pgsql:dbname=universe;host=db;port=5432';
        $this->user = 'postgres';
        $this->password = 'simuversepassword';
        $this->dbh = new PDO($this->dsn, $this->user, $this->password);
    }


    function GetDBH(): PDO
    {
        return $this->dbh;
    }

    function __destruct()
    {
        $this->dsn = null;
        $this->user = null;
        $this->password = null;
        $this->dbh = null;

        echo 'Destroying Database Controller';
    }

}
