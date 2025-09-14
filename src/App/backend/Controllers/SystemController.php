<?php

require_once('vendor/autoload.php');

//phpinfo();

function GetSystem(int $id=-1){
    try{

     $conn = new PDO('pgsql:host=localhost;port=5432, dbname=db-1') ;
     $sql = 'SELECT * FROM star_system ';
     $result = $conn->prepare($sql);
     $result->execute();
    } catch (PDOException $e) {
         echo $e ;
    }

    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
        echo 'row data' . $row['name'];
    }
} 

GetSystem();