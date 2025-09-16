<?php
    require $_SERVER['DOCUMENT_ROOT'] . "/backend/Controllers/SystemController.php";

    $systemController = new SystemController();

    $currentSystem = $systemController->GetSystemWithLinkedBodies($id);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $currentSystem[0]["system_name"] ?> View</title>
</head>
<body>
    <h1><?= $currentSystem[0]["system_name"] ?>'s System</h1>
    <h2>Linked Bodies</h2>
    <?php for ($i=0; $i < count($currentSystem); $i++) : ?>
        <div>
            <h3><?= $currentSystem[$i]["name"] ?></h3>
            <h3><?= $currentSystem[$i]["mass"] ?></h3>
        </div>
    <?php endfor ?>
</body>
</html>