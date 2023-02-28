<?php
    require_once("connect.php");
    $id = $_GET['id'];
    $selectProduct = "SELECT * FROM product WHERE id = $id";
    $query = $conn -> query($selectProduct);
    $product  = $query->fetch_assoc();
    
?>

<div class="container-fluid">
<form method="POST" action="controllers/product/update.php"  enctype="multipart/form-data">
    <input type="hidden" class="form-control" name="id" value="<?= $product['id'] ?>">
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" value="<?= $product['name'] ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="price" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="price" name="price" value="<?= $product['price'] ?>">
        </div>
    </div>
    <div class="form-group row">
        <div class="input-group-prepend col-sm-2">
            <span class="col-form-label" id="inputImage">Image</span>
        </div>
        <div class="col-sm-10">
        <div class="custom-file">
            <input type="file" class="form-control" id="image" aria-describedby="inputImage" name="images[]" multiple>
            <label class="custom-file-label" for="image">Upload Image</label>
        </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="cat_id" class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10">
            <select class="custom-select" name="cat_id">
                <option value="1" <?= $product['cat_id'] == 1 ? 'selected' : ''?>>Computers</option>
                <option value="2" <?= $product['cat_id'] == 2 ? 'selected' : ''?>>Mobiles</option>
                <option value="3" <?= $product['cat_id'] == 3 ? 'selected' : ''?>>Laptop</option>
                <option value="4" <?= $product['cat_id'] == 4 ? 'selected' : ''?>>Shoes</option>
                <option value="5" <?= $product['cat_id'] == 5 ? 'selected' : ''?>>Headphone</option>
                <option value="6" <?= $product['cat_id'] == 6 ? 'selected' : ''?>>Clothes</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10 offset-sm-2">
            <!-- <button type="submit" class="btn btn-primary btn-block">Edit Product</button> -->
            <button type="submit" class="btn btn-primary btn-icon-split btn-block d-flex justify-content-between">
                <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">Edit Product</span>
                <div></div>
            </button>
        </div>
    </div>
</form>
</div>
