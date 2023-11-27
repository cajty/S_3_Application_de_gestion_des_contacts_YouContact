<?php
              session_start();
              require './db.php';


              if (isset($_POST['submit'])) {

                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);
                $sql = "SELECT * FROM `users` WHERE email_u ='$email'";
                $result = mysqli_query($conn, $sql);
                var_dump($result);
                

                if (mysqli_num_rows($result) > 0) {

                  $resultData = mysqli_fetch_assoc($result);
                  $_SESSION['name'] = $resultData['nom_u'];
                  $_SESSION['id'] = $resultData['id'];
                  if ($resultData['passeword'] == $password) {
                    header('location:home.php');

                }else{
                  header('location:submit.php');
                }

               
                }
              }
             

              ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <?php
  include("navbar.php");
  ?>
  <div class="container p-">
    <div class=" bg-info-subtle">


      <section class="container bg-info-subtle">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="img.jpg" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <h1>Sign in with</h1>
              <form method="POST">
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3">Email address</label>
                  <input type="email" class="form-control form-control-lg" placeholder="Enter a valid email address"
                    name="email" required>
                </div>
                <!-- Password input -->
                <div class="form-outline mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control form-control-lg" placeholder="Enter password"
                    name="password" required>
                </div>

                <div class="text-center text-lg-start mt-4 pt-2 p-5">
                  <input type="submit" class="btn btn-primary" name="submit" required>
                  <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="submit.php"
                      class="link-danger">Register</a></p>
                </div>

              </form>
            


            </div>
          </div>
        </div>
      </section>
    </div>

  </div>
</body>

</html>