<?php


$id = $_GET['id'];
$select_pro = "SELECT * FROM products WHERE id = '$id'";
$result_pro = $conn -> query($select_pro);
$pro = $result_pro -> fetch_assoc();

?>






<form method="POST" action="fun/do_edit_pro.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="form-group">
                    <label for="name" style="font-weight: bold;"> Product name :</label>
                    <input type="text" class="form-control" name="name" value="<?= $pro['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="price" style="font-weight: bold;"> Price :</label>
                    <input type="number" class="form-control" name="price" value="<?= $pro['price'] ?>">
                </div>
                <div class="form-group">
                    <label for="count" style="font-weight: bold;"> Count :</label>
                    <input type="text" class="form-control" name="count" value="<?= $pro['count'] ?>">
                </div>
                <div class="form-group">
                    <label for="description" style="font-weight: bold;"> Description :</label>
                    <textarea class="form-control" name="descr" style="height:150px;" > <?= $pro['descr'] ?>  </textarea>
                </div>
                <div class="form-group">
                    <label for="image" style="font-weight: bold;"> Image :</label>
                    <input type="file" class="form-control-file" name="image">
                    <br>
                    <img src="img/<?= $pro['image'] ?>" width="150" height="150">
                </div>
                
                <div class="form-group">
                    <label for="category" style="font-weight: bold;"> Category :</label>
                    <select class="form-control" name="category">


                    <?php

$select_cat = "SELECT * FROM category ";
$sql_cat = $conn -> query($select_cat);
while ($cat = $sql_cat->fetch_assoc()) {
    ?>

                        <option value="<?= $cat['id'] ?>" <?php
                        
                        if ($pro['cat'] == $cat['id']) {
                            echo " selected";
                        }
                        
                        
                        ?>><?= $cat['name'] ?></option>

<?php
}


?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="brand" style="font-weight: bold;"> Brand :</label>
                    <select class="form-control" name="brand">
                    <?php

$select_brand = "SELECT * FROM brand ";
$sql_brand = $conn -> query($select_brand);
while ($brand = $sql_brand->fetch_assoc()) {
    ?>

                        <option value="<?= $brand['id'] ?>" <?php
                        
                        if ($pro['brand'] == $brand['id']) {
                            echo " selected";
                        }
                        
                        
                        ?>><?= $brand['name'] ?></option>

<?php
}


?>
                    </select>
                </div>

                <input type="submit" value="Update Product" class="form-control btn btn-success">
               

                
                

            </form>