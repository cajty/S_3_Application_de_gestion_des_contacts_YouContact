
<?php
require 'db.php';


if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $select = " SELECT * FROM users WHERE email_u = '$email'";
    $result = mysqli_query($conn, $select);
    if (!empty($name) && !empty($lastname) && !empty($email) && !empty($mobile) && !empty($password)) {
        if (mysqli_num_rows($result) > 0) {

            $error_user = 'user already exist!';
        } else {
            $sql = "INSERT INTO users(`nom_u`,`prénom_u`,`tel_u`,`email_u`,`passeword`) VALUES ('$name',  '$lastname' ,'$mobile','$email','$password')";
            $query = mysqli_query($conn, $sql);
            mysqli_close($conn);
            header('location:index.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>submit</title>

<body>
    <?php
    include 'navbar.php';
    ?>
    <?php
    if (isset($error_user)) {
        echo "<div class= 'alert alert-info' role='alert'> $error_user  </div>"     ;
    
    }
    ?>
    <div class="container bg-info-subtle">
        <div class="wrapper p-5 m-5">
            <div class="d-flex p-2 justify-content-between">

                <div><a href="index.php"><i data-feather="corner-down-left"></i></a></div>
            </div>
            <form  method="POST">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="enter your name" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Lastname</label>
                    <input type="text" class="form-control" placeholder="enter your name" name="lastname"  required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="enter your email" name="email"  required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mobile</label>
                    <input type="tel" class="form-control" placeholder="enter your mobile" name="mobile" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="password" name="password"  required>
                </div>

                <input type="submit" class="btn btn-primary" name="submit" required>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>

