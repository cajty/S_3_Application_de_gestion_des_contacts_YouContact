<?php
    header("REFRESH:1;URL=cont.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>home</title>
   
</head>
<body>
<?php
  include("navbar.php");
  ?>
    <h1>Hello </h1>
    <?php
        session_start();
        echo 'Welcome to page #2<br />';
        echo $_SESSION['name'] ;

    ?>
    <h2>You Will Be Redirected To Contct Panel</h2>
   
</body>
</html>