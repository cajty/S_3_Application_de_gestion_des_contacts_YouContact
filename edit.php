<?php
require 'db.php';
$name =  '';
$lastname = '';
$email = '';
$mobile = '';

$id = $_GET['id'];


$result = mysqli_query($conn, "SELECT * FROM contats WHERE id = $id");


$resultData = mysqli_fetch_assoc($result);

$name =  $resultData['nom_c'];
$lastname = $resultData['prénom_c'];
$email = $resultData['email_c'];
$mobile = $resultData['tel_c'];

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);

    if (!empty($name) && !empty($lastname) && !empty($email) && !empty($mobile)) {
        // Use UPDATE query instead of INSERT
        $sql = "UPDATE contats SET `nom_c`='$name', `prénom_c`='$lastname', `tel_c`='$mobile', `email_c`='$email' WHERE id = $id";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
    header("Location:cont.php");
}

mysqli_close($conn);


?>
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
<?php
    include("formCont.php");
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>