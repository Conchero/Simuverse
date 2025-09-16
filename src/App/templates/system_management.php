<?php

require $_SERVER['DOCUMENT_ROOT'] . "/backend/Controllers/SystemController.php";

$systemController = new SystemController();

if ($_POST) {
    
    if (array_key_exists("delete", $_POST)) {
        if (array_key_exists('system-id', $_POST) && (int)$_POST['system-id']) {
            
            $parsedSystemId =(int)$_POST['system-id']; 
            var_dump($parsedSystemId);
            $systemController->DeleteSystem($parsedSystemId);
        }
    }
}

$allSystems = $systemController->GetAllSystem();

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Systems</title>
</head>

<body>

    <?php for ($i = 0; $i < count($allSystems); $i++): ?>
        <div>
            <a href="<?= $allSystems[$i]["id"]?>/system-view"><h1><?= $allSystems[$i]["name"] ?></h1></a>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input name="system-id" type="hidden" value=<?= $allSystems[$i]['id'] ?>></input>
                <input type="submit" name='delete' value="Delete System"></input>
            </form>
        </div>

    <?php endfor ?>

</body>

</html>

<?php
exit();
?>