<?php
    require_once("../../connect.php");
    
    // $errors = array();
    // if(!(isset($_POST['name']) && !empty($_POST['name']))){
    //     $errors[] = 'name';
    // }
    // if(!(isset($_POST['email']) && filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) )){
    //     $errors[] = 'email';
    // }
    // if(!(isset($_POST['password']) && strlen($_POST['password'] > 5))){
    //     $errors[] = 'password';
    // }
    // if(!(isset($_POST['address']) && !empty($_POST['address']))){
    //     $errors[] = 'address';
    // }
    // if(! isset($_POST['phone'])){
    //     $errors[] = 'phone';
    // }
    // if(! isset($_POST['gender'])){
    //     $errors[] = 'gender';
    // }
    // if(isset($errors)){
    //     header("Location: ../../users.php?action=add&". $errors);
    //     exit();
    // }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];
        $name       = $_POST['name'];
        $price      = $_POST['price'];
        $cat_id     = $_POST['cat_id'];

    //Images Process
        $AllImages = array();
        $errors = array();
        $uploadedImages =   $_FILES['images'];

        $image_name     =   $uploadedImages['name'];
        $image_type     =   $uploadedImages['type'];
        $image_tmp      =   $uploadedImages['tmp_name'];
        $image_size     =   $uploadedImages['size'];
        $image_error    =   $uploadedImages['error'];
        
        //Allowed Extensions 
        $allowedExtensions = ['jpg','png','gif','jpeg'];
        //check if the files is uploaded
        if($image_error[0] == '4'){
            $query = "SELECT img_name FROM images WHERE product_id = $id";
            $oldImageQuery  = $conn -> query($query);
            $oldImageName   = $oldImageQuery -> fetch_assoc();
            $finalImage     = $oldImageName['img_name'];
        }
        else {
            //there are files uploaded
            $filesCount = count($image_name);
            for($i = 0; $i < $filesCount; $i++){
                $image_extension[$i] = strtolower(pathinfo($image_name[$i], PATHINFO_EXTENSION));           
                //Random image name 
                $NewImageName[$i] = uniqid() . '.' . $image_extension[$i];
                
                //check size 
                if($image_size[$i] < 2000000){
                    $errors[] = "File is large size :D";
                }
                //check file is valid 
                if(!in_array($image_extension[$i], $allowedExtensions)){
                    $errors[] = "Invalid image extension";
                }
                //check if no errors 
                if(empty($errors)){
                    $query = "SELECT img_name FROM images WHERE product_id = $id";
                    $oldImageQuery  = $conn -> query($query);
                    $oldImageName   = $oldImageQuery -> fetch_assoc();
                    $oldImageName   = $oldImageName['img_name'];
                    unlink("../../uploads/$oldImageName");

                    move_uploaded_file($image_tmp[$i], "../../images/$NewImageName[$i]");
                    //Save All Images in Array to Send to DB
                    $AllImages[] = $NewImageName[$i];
                }else{
                    $errors[] = "errors at file number (" . ($i + 1) . ")";
                }
            }
            $finalImage = implode(",", $AllImages);
        }

    //product Update
        $updateProductQuery = "UPDATE product SET 
            name ='$name',
            price='$price',
            cat_id='$cat_id' 
                WHERE id= $id";
        $updateProduct = $conn -> query($updateProductQuery);
        if($updateProduct){
            //Images Update 
            $updateImageQuery ="UPDATE images SET
                img_name='$finalImage'
                WHERE product_id = $id";
            $updateImage = $conn -> query($updateImageQuery);
                if(isset($updateImage)){
                    header("Location: ../../product.php");
                    exit();
                }
        }else{
            header("Location: ../../product.php?action=edit");
        }
    }
?>