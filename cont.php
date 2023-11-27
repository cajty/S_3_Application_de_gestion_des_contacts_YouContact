<?php
session_start();
require 'db.php';
$name = '';
$lastname = '';
$email = '';
$mobile = '';
$id_uc = $_SESSION['id'];


if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
  
    if (!empty($name) && !empty($lastname) && !empty($email) && !empty($mobile)) {
        
        $sql = "INSERT INTO contats(`nom_c`,`prénom_c`,`tel_c`,`email_c`,`id_user`) VALUES ('$name',  '$lastname' ,'$mobile','$email','$id_uc')";
        
        $query = mysqli_query($conn, $sql);
      
        $last_id = mysqli_insert_id($conn);
    }
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>contact</title>

<body>

    <?php
    include("navbar.php");
    ?>
    <h1>contat</h1>
    <?php
    include("formCont.php");
    ?>
    <br>
    
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>address</th>
            <th>Action</th>
        </thead>
        <?php
        
        require 'db.php';
       
        $g = "SELECT * FROM contats  WHERE id_user = '$id_uc' ";
        $qury = mysqli_query($conn, $g);
        while ($row = mysqli_fetch_assoc($qury)) {
            echo "
        <tr>
        <td>$row[id]</td> 
        <td> $row[nom_c]</td>  
        <td>$row[email_c]</td>
        <td>$row[prénom_c]</td>
        <td>$row[tel_c]</td>
        <td>
        <a class ='btn btn-primary btn-sm ' href =\"edit.php?id=$row[id]\" >Edit</a>
        <a class ='btn btn-danger btn-sm 'href =\"delete.php?id=$row[id]\"onClick=\"return confirm('Are you sure you want to delete?')\" >Delete</a>
        </td>
        </tr>
        ";
        }
        mysqli_close($conn);

        ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>