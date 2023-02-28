<div class="container-fluid">
<form method="POST" action="controllers/product/store.php" enctype= "multipart/form-data">
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Product Name</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name">
        </div>
    </div>
    <div class="form-group row">
        <label for="price" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="price" name="price">
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
        <label for="address" class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10">
            <select class="custom-select" name="cat_id">
                <option value="1" selected>Computers</option>
                <option value="2" >Mobiles</option>
                <option value="3" >laptop</option>
                <option value="4" >Shoes</option>
                <option value="5">Headphone</option>
                <option value="6">Clothes</option>
                
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary btn-icon-split btn-block d-flex justify-content-between">
                <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">Add Product</span>
                <div></div>
            </button>
        </div>
    </div>
</form>
</div>
