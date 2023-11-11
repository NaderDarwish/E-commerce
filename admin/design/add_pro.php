<form method="POST" action="fun/do_add_pro.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" style="font-weight: bold;"> Product name :</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="price" style="font-weight: bold;"> Price :</label>
                    <input type="number" class="form-control" name="price">
                </div>
                <div class="form-group">
                    <label for="count" style="font-weight: bold;"> Count :</label>
                    <input type="text" class="form-control" name="count">
                </div>
                <div class="form-group">
                    <label for="description" style="font-weight: bold;"> Description :</label>
                    <textarea class="form-control" name="descr" style="height:150px;" ></textarea>
                </div>
                <div class="form-group">
                    <label for="image" style="font-weight: bold;"> Image :</label>
                    <input type="file" class="form-control-file" name="image">
                </div>
                
                <div class="form-group">
                    <label for="category" style="font-weight: bold;"> Category :</label>
                    <select class="form-control" name="category">


                    <?php

$select_cat = "SELECT * FROM category ";
$sql_cat = $conn -> query($select_cat);
while ($cat = $sql_cat->fetch_assoc()) {
    ?>

                        <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>

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

                        <option value="<?= $brand['id'] ?>"><?= $brand['name'] ?></option>

<?php
}


?>
                    </select>
                </div>

                <input type="submit" value="Add Product" class="form-control btn btn-success">
               

                
                

            </form>