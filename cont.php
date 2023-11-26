<?php
require 'db.php';
$name =  '';
$lastname = '';
$email = '';
$mobile = '';


if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    echo '<br><br><br>';
    if (!empty($name) && !empty($lastname) && !empty($email) && !empty($mobile)) {
        echo '<br><br><br>';
        $sql = "INSERT INTO contats(`nom_c`,`prénom_c`,`tel_c`,`email_c`) VALUES ('$name',  '$lastname' ,'$mobile','$email')";
        echo '<br><br><br>';
        $query = mysqli_query($conn, $sql);
        echo '<br><br><br>';
        $last_id = mysqli_insert_id($conn);
        echo '<br><br><br>';
        echo "New record created successfully. Last inserted ID is: " . $last_id;
    }
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
    $g = "select * from contats ";
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
    echo '<br><br><br>';
    mysqli_close($conn);
    echo '<br><br><br>';
    ?>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</body>

</html>