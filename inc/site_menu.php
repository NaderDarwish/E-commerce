<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php
$select_cat = "SELECT * FROM category";
$result_cat = $conn -> query($select_cat);
while ($row = $result_cat -> fetch_assoc()) {
    ?>


							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="shop.php?catid=<?= $row['id'] ?>"><?= $row['name'] ?></a></h4>
								</div>
							</div>

                            <?php
}

?>

						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
                                <?php
$select_brand = "SELECT * FROM brand";
$result_brand = $conn -> query($select_brand);
while ($row = $result_brand -> fetch_assoc()) {
    ?>                     
									<li><a href="shop.php?brandid=<?= $row['id'] ?>"> <span class="pull-right">(<?php
                              $brand_id = $row['id']; 
        $select_pro = "SELECT * FROM products WHERE brand ='$brand_id'";  
        $result_pro = $conn -> query($select_pro);
        $num_pro = $result_pro -> num_rows;   
                     echo $num_pro;               
                                    
                                    
                                    ?>)</span><?= $row['name'] ?></a></li>
                                    <?php
}

?>	
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>