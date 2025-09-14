<?php

require_once('vendor/autoload.php');

//phpinfo();

function GetSystem(int $id=-1){
    try{


    $dsn = 'pgsql:dbname=universe;host=db;port=5432';
    $user = 'postgres';
    $password = 'simuversepassword';
     $dbh = new PDO($dsn, $user,$password);
     $sql = 'SELECT * FROM star_system ';
     $result = $dbh->prepare($sql);
     $result->execute();
 
 
     while ($row = $result->fetch(PDO::FETCH_ASSOC)){
         echo 'row data' . $row['name'];
     }

    } catch (PDOException $e) {
         echo $e ;
    }

} 

GetSystem();