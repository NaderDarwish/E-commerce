<?php


$id = $_GET['id'];

include("connect.php");

$delete = "DELETE FROM products WHERE id = '$id'";

$conn -> query($delete);

header("Location:../products.php");