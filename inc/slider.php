<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
							<li data-target="#slider-carousel" data-slide-to="3"></li>
						</ol>
						
						<div class="carousel-inner">

<?php

$select = "SELECT * FROM products  ORDER BY price DESC LIMIT 4 ";
$result = $conn -> query($select);
$x = 1 ; 
while ($row = $result -> fetch_assoc()) {
    ?>




							<div class="item <?php
                            
                            if( $x == 1  ){
                                echo "active";
                                $x++ ;
                            }
                            
                            ?>">
								<div class="col-sm-6">
									<h1><span><?= $row['name']  ?></span></h1>
									<h2><?= $row['price']  ?></h2>
									<p><?= $row['descr']  ?></p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="admin/img/<?= $row['image'] ?>" class="girl img-responsive" style="width:450px;height:400px" />
									<!-- <img src="images/home/pricing.png"  class="pricing" alt="" /> -->
								</div>
							</div>
<?php
    
}




?>        
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->