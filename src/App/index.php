<?php

$nbUnitPerAxis = 100;
$stepUnitPerAxis = 1;

$grid[] = array();


for ($i = 0; $i <= $nbUnitPerAxis; $i++) {
    $iSubstract = $i;
    if ($i > $nbUnitPerAxis/2)
    {
        $iSubstract = (($nbUnitPerAxis/2)) - $iSubstract ;
        print_r($iSubstract);
        echo "\n";
    }
    $grid[$i] = array( $iSubstract *$stepUnitPerAxis, $iSubstract * $stepUnitPerAxis);
}

$path = $_SERVER['REQUEST_URI'];


 #Charge le router
 require_once './router.php';

 ?>



