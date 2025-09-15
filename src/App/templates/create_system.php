<?php
if ($_POST) {
    require $_SERVER['DOCUMENT_ROOT'] . "/backend/Controllers/SystemController.php";
    $systemController = new SystemController();
    $systemController->CreateSystem($_POST['system_name']);

    // $host  = $_SERVER['HTTP_HOST'];
    // $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    // $extra = 'system-collection';
    // header("Location: http://$host$uri/$extra");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Star System</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="create_form" method="post">
        <label for="name">Star Sytem Name</label>
        <input type="text" name="system_name" id="name">
        <input type="submit" name="submit" id="submit" value="Create System">
    </form>
</body>

</html>


<?php
exit();
?>