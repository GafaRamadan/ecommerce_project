        <?php 

        require_once ('connect.php');
        ?>

        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Products</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="?action=add" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">

                            <i class="fas fa-solid fa-plus"></i>
                        </span>
                        <span class="text">Add Product</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Controls</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                    $ID = 1 ;
                                    $selectProduct = "SELECT * FROM product";
                                    $query = $conn -> query($selectProduct);
                                    // $result = $query -> fetch_assoc();
                                    // echo gettype($query) ;
                                    foreach($query as $row):
                                ?>
                                <tr>
                                    <td><?= $ID++ ?> </td>
                                    <td><?= $row['name']?></td>
                                    <td>
                                        <?php
                                            $ProductId = $row['id'];
                                            $selectImage = "SELECT * FROM images WHERE product_id = $ProductId";
                                            $imag = $conn -> query($selectImage);
                                            $Image = $imag -> fetch_assoc();
                                            // print_r($Image['img_name']);
                                            $AllImages = explode(",", $Image['img_name']);
                                            // foreach($ArrayOfImages as $showImage){
                                            // }
                                        ?>
                                        <div class="text-center">
                                        <img src ="images/<?= $AllImages[0] ?>" alt="image" width="80" height="70" class="img-fluid  rounded">
                                        </div>
                                    </td>
                                    <td><?= $row['price']?></td>
                                    <td>
                                        <?php 
                                            $id = $row['cat_id'];
                                            $selectCategory = "SELECT name FROM category WHERE id = $id";
                                            $categoryQuery = $conn -> query($selectCategory);
                                            $categoryQuery = $categoryQuery -> fetch_assoc();
                                            echo $categoryQuery['name'];
                                        ?>
                                    </td>
                                    <td >
                                        <a href="?action=edit&id=<?= $row['id']?>" class="btn btn-info btn-icon-split m-1">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a>  
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-icon-split m-1" data-toggle="modal" data-target="#id<?= $row['id']?>">
                                        <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                        <span class="text">Delete</span>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="id<?= $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="btn btn-warning btn-icon-split" id="exampleModalLabel" style="cursor: auto;font-family: cursive;">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </span>
                                                <span class="text">Alarm Delete !</span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are You Sure To Delete this Product? <?= $row['name']?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <!-- <button type="button" class="btn btn-danger">Confirm</button> -->
                                                <a href="controllers/product/delete.php?id=<?= $row['id']?>" class="btn btn-danger btn-icon-split mb-1">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">Confirm</span>    
                                                </a>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                    endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>