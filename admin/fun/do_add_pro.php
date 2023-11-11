<?php


// echo "<pre>";
// print_r($_FILES);




$name = $_POST['name'];
$price = $_POST['price'];
$count = $_POST['count'];
$descr = $_POST['descr'];
$category = $_POST['category'];
$brand = $_POST['brand'];


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


include("connect.php");

$insert = "INSERT INTO products( name, price, image, cat, brand, count, descr) VALUES ('$name','$price','$new_img_name','$category','$brand','$count','$descr')";

 $conn -> query($insert);

 header("location:../products.php");