
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
    <div class="card">
        <h5 class="card-header">Featured</h5>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    <div class="container bg-info-subtle">
        <div class="wrapper p-5 m-5">
            <div class="d-flex p-2 justify-content-between">

                <div><a href="contact.php"><i data-feather="corner-down-left"></i></a></div>
            </div>
            <form action="cont.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="enter your name" name="name"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">Lastname</label>
                    <input type="text" class="form-control" placeholder="enter your name" name="lastname"
                        autocomplete="false" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="enter your email" name="email"
                        autocomplete="false" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mobile</label>
                    <input type="tel" class="form-control" placeholder="enter your mobile" name="mobile"
                        autocomplete="false" required>
                </div>
                <input type="submit" class="btn btn-primary" name="submit" required>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>
<?php
require 'db.php';
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    echo'<br><br><br>';
    if (!empty($name) && !empty( $lastname ) && !empty($email) && !empty($mobile) ){
        echo'<br><br><br>';
        $sql =  "INSERT INTO contats(`nom_c`,`prénom_c`,`tel_c`,`email_c`) VALUES ('$name',  '$lastname' ,'$mobile','$email')";
        echo'<br><br><br>';
        $query = mysqli_query($conn, $sql);
        echo'<br><br><br>';

        if ($query) {
            echo "### successfully";
            echo'<br><br><br>';
        } else {
            echo "Error: " . mysqli_error($conn);
            echo'<br><br><br>';
        }
        echo'<br><br><br>';
    }

    
}
echo'<br><br><br>';
mysqli_close($conn);
?>