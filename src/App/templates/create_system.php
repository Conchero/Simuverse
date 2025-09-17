<?php
if ($_POST) {
    require $_SERVER['DOCUMENT_ROOT'] . "/backend/Controllers/SystemController.php";
    $systemController = new SystemController();
    $systemController->CreateSystem($_POST['system_name']);

    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'system-collection';
    header("Location: http://$host$uri/$extra");
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
        
        <label for="mass">Start Nebula Mass</label>
        <input type="range" min="1" max="100" value="1" name="nebula_mass" id="mass">
        <h4 id="nebula_mass_text"></h4>

        <label for="size">Start Nebula Size</label>
        <input type="range" min="200000" max="400000" value="200000" name="nebula_size" id="size">
        <h4 id="nebula_size_text"></h4>

        <input type="submit" name="submit" id="submit" value="Create System">
    </form>
</body>

<script>
    const massSlider = document.getElementById("mass");
    const massSliderText = document.getElementById("nebula_mass_text");

    const sizeSlider = document.getElementById("size");
    const sizeSliderText = document.getElementById("nebula_size_text");
    
    
    massSliderText.innerHTML = `${massSlider.value} Solar Masses`;    
    massSlider.addEventListener("change",(e)=> {
        massSliderText.innerHTML = `${massSlider.value} Solar Masses`;
    });

    sizeSliderText.innerHTML = `${sizeSlider.value} AU`;    
    sizeSlider.addEventListener("change",(e)=> {
        sizeSliderText.innerHTML = `${sizeSlider.value} AU`;
    });

</script>

</html>


<?php
exit();
?>