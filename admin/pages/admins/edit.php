<?php
    require_once("connect.php");
    $id = $_GET['id'];
    $selectadmin = "SELECT * FROM admins WHERE id = $id";
    $query = $conn -> query($selectadmin);
    $admin  = $query->fetch_assoc();
    
?>

<div class="container-fluid">
<form method="POST" action="controllers/admin/update.php">
    <input type="hidden" class="form-control" name="id" value="<?= $admin['id'] ?>">
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" value="<?= $admin['name'] ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" id="inputPassword3" name="Password">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        <input type="email" class="form-control" id="inputEmail3" name="Email" value="<?= $admin['Email'] ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="address" name = "address" value="<?= $admin['address'] ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="phone" name = "Phone" value="<?= $admin['Phone'] ?>">
        </div>
    </div>
    
   
    <div class="form-group row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary btn-icon-split btn-block d-flex justify-content-between">
                <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">Edit Admin</span>
                <div></div>
            </button>
        </div>
    </div>
</form>
</div>
