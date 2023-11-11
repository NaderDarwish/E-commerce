<table class="table  table-hover table-bordered text-center ">
                <thead class="bg-info " >
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">price</th>
                    <th scope="col">image</th>
                    <th scope="col">cat</th>
                    <th scope="col">brand</th>
                    <th scope="col">count</th>
                    <th scope="col">Controls</th>
                   
                  </tr>
                </thead>
                <tbody>

                <?php

$select_product = "SELECT * FROM products";
$result_product = $conn -> query($select_product);
while ($pro = $result_product -> fetch_assoc()) {
    ?>


                  <tr>
                    <th scope="row"><?=  $pro['id'] ?></th>
                    <td><?=  $pro['name'] ?></td>
                    <td><?=  $pro['price'] ?></td>
                    <td><img src="img/<?=  $pro['image'] ?>" style="width:150px;height:150px"></td>
                    <td><?php  $cat_id = $pro['cat'];
                    
                    $select_cat = "SELECT * FROM category where id = '$cat_id'";
                    $result_cat = $conn -> query($select_cat);
                    $cat = $result_cat -> fetch_assoc();
                    echo $cat['name'];

                    
                    
                    
                    ?></td>
                    <td><?php $brand_id = $pro['brand'];
                    
                    $select_brand = "SELECT * FROM brand where id = '$brand_id'";
                    $result_brand = $conn -> query($select_brand);
                    $brand = $result_brand -> fetch_assoc();
                    echo $brand['name'];
                    
                    
                    
                    
                    ?></td>
                    <td><?=  $pro['count'] ?></td>
<td>
<a href="?action=edit&id=<?=  $pro['id'] ?>"><button class="btn btn-warning">Edit</button></a>
<a href="fun/delete_pro.php?id=<?=  $pro['id'] ?>"><button class="btn btn-danger">Delete</button></a>
</td>
                  </tr>

<?php
}


?>
                </tbody>
              </table>

              <a href="?action=add" ><button class="btn btn-primary">Add New</button></a>