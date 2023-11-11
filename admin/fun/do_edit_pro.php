<?php


// echo "<pre>";
// print_r($_FILES);
// exit();


include("connect.php");


$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$count = $_POST['count'];
$descr = $_POST['descr'];
$category = $_POST['category'];
$brand = $_POST['brand'];


if ( $_FILES['image']['error'] == 0 ) {


    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $img_tmp = $_FILES['image']['tmp_name'];
    
    $firstEXP = explode ("." , $img_name);
    
    $img_ext =  end($firstEXP);
    
    $allow_ext = ["jpg", "jpeg", "png", "bmb", "gif"];
    
    if (!in_array($img_ext, $allow_ext)) {
        echo "wrong image type";
        exit();
    }
    
    if ($img_size > 3000000) {
        echo "image too large";
        exit();
    }
    
    $new_img_name = time() . rand(1 , 100000) . $img_name;
    
    
    
    move_uploaded_file($img_tmp , "../img/$new_img_name");

    $update = "UPDATE products SET name='$name',price='$price',image='$new_img_name',cat='$category',brand='$brand',count='$count',descr='$descr' WHERE id = '$id'";

}else{

    $update = "UPDATE products SET name='$name',price='$price',cat='$category',brand='$brand',count='$count',descr='$descr' WHERE id = '$id'";

}







 $conn -> query($update);

 header("location:../products.php");