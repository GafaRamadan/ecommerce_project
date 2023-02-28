<?php
    require_once("connect.php");

?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Admin</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="?action=add" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                <i class="fas fa-thin fa-user-plus"></i>
                </span>
                <span class="text">Add Admin</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                          
                            <th>Controls</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                            $id = 1 ;
                            $selectAdmin = "SELECT * FROM admins";
                            $query = $conn -> query($selectAdmin);
                            // $result = $query -> fetch_assoc();
                            // echo gettype($query) ;
                            foreach($query as $row):
                        ?>
                        <tr>
                            <td><?= $id++ ?> </td>
                            <td><?= $row['name']?></td>
                            <td><?= $row['Email']?></td>
                            <td><?= $row['address']?></td>
                            <td><?= $row['Phone']?></td>
                                                     
                       
                            <td>
                                <a href="?action=edit&id=<?= $row['id']?>" class="btn btn-info btn-icon-split mb-2">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                                        <span class="text">Edit</span>
                                </a>  
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#id<?= $row['id']?>">
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
                                        Are You Sure To Delete this User? <?= $row['name']?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <!-- <button type="button" class="btn btn-danger">Confirm</button> -->
                                        <a href="controllers/admin/delete.php?id=<?= $row['id']?>" class="btn btn-danger btn-icon-split">
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