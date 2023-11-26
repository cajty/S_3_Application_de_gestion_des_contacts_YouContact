
<?php 
    include 'navbar.php'; 
 ?>
    <div class="container bg-info-subtle">
        <div class="wrapper p-5 m-5">
            <div class="d-flex p-2 justify-content-between">
               
                <div><a href="index.php"><i data-feather="corner-down-left"></i></a></div>
            </div>
            <form action="index.php" method="POST" >
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control"
                     placeholder="enter your name" name="name"
                        autocomplete="false">
                </div>
                <div class="mb-3">
                    <label class="form-label">Lastname</label>
                    <input type="text" class="form-control"
                     placeholder="enter your name" name="lastname"
                        autocomplete="false" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control"  
                     placeholder="enter your email" name="email"
                        autocomplete="false" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mobile</label>
                    <input type="tel" class="form-control"  placeholder="enter your mobile" name="mobile"
                        autocomplete="false" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control"  
                    placeholder="password" name="password"
                        autocomplete="false"required>
                </div>
              
                <input type="submit" class="btn btn-primary"  name="submit" required >
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
</body>
</html>
<?php
require 'db.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!empty($name) && !empty( $lastname ) && !empty($email) && !empty($mobile) && !empty($password)) {
        $sql = "INSERT INTO users(`nom_u`,`prénom_u`,`tel_u`,`email_u`,`passeword`) VALUES ('$name',  '$lastname' ,'$mobile','$email','$password')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "New record created successfully";
        } else {
            echo "Error404: " . $sql . "<br>" . mysqli_error($conn);
        }
        echo "Error403: " . mysqli_error($conn);
        
    }
}
mysqli_close($conn);
?>





