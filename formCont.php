
<div class="container bg-info-subtle">
    <div class="wrapper p-5 m-5">
        <div class="d-flex p-2 justify-content-between">

            <div><a href="contact.php"><i data-feather="corner-down-left"></i></a></div>
        </div>
        <form  method="POST">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="enter your name" name="name" value="<?php echo $name; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Lastname</label>
                <input type="text" class="form-control" placeholder="enter your name" name="lastname" value="<?php echo $lastname; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="enter your email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nobile</label>
                <input type="tel" class="form-control" placeholder="enter your mobile" name="mobile" value="<?php echo $mobile; ?>" equired>
            </div>
            <input type="submit" class="btn btn-primary" name="submit" required>
        </form>
    </div>
</div>