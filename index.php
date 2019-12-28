<?php 
 	include 'inc/header.php';

 	
 
 ?>


<div class="main">


    
		<!-- end of linhkien -->
    		<div class="content_top">
   				<div  class="heading"> <h3 >Xả hàng || Giảm giá</h3>

   				</div>
   				 <div class="viewall"><a href="phanloai.php?p=xahang">>> Xem tất cả (30+)</a></div>
   			 	<div class="clear"></div>
  			</div>
  
			<div class="section group" data-aos="fade-up">

		<!-- start xa hang -->
		<?php 	

			

			
	      	$product_sale = $product ->getproduct_sale(4);

	      	if($product_sale){
	      		while($result_sale = $product_sale -> fetch_assoc()){

	   	?>

				<div class="grid_1_of_4 images_1_of_4 ">
					 <a href="details.php?proid=<?php  echo $result_sale['productID']; ?>">
					 	<div class="front">
					 	<img src="admin/uploads/<?php echo $result_sale['image']; ?>" alt="clm" /></a>
		</div>

					
					 <h2><?php  echo $result_sale['productName'];?></h2>
					 	<p><?php if(!empty($result_sale['ghiChu']) )


					   echo ' ('.$result_sale['ghiChu'].')';?></p>
					 <?php echo $result_sale['moTaNgan']; ?>
					  <p>
						<?php if($result_sale['price_old'] >0 )
						
							  echo '<span class="strike"> '.($fm -> format_cuurency($result_sale['price_old']))." "."đ".'</span>'; ?>
						
							<span class="price"><?php echo $fm -> format_cuurency($result_sale['price'])." "."đ"; ?></span>
					</p>
				     <div class="button"><span><a href="details.php?proid=<?php  echo $result_sale['productID']; ?>" class="details">Chi Tiết</a></span></div>
				</div>

		<?php 
					}
				}
				
			
		//}

		?>
			</div>
			<div class="section group" data-aos="fade-up">
		<?php 	
	      		$product_sale = $product ->getproduct_sale(3);

	      		if($product_sale){
	      			while($result_sale = $product_sale -> fetch_assoc()){

	      			
	      		
	    ?>

				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php  echo $result_sale['productID']; ?>"><img src="admin/uploads/<?php echo $result_sale['image']; ?>" alt="" /></a>
					 <h2><?php  echo $result_sale['productName'];?></h2>
					 <p><?php	if(!empty($result_sale['ghiChu']) )


					   echo ' ('.$result_sale['ghiChu'].')';?></p>
					 <?php echo $result_sale['moTaNgan']; ?>
					  <p>
						<?php if($result_sale['price_old'] >0 )
						
							  echo '<span class="strike"> '.($fm -> format_cuurency($result_sale['price_old']))." "."đ".'</span>'; ?>
						
							<span class="price"><?php echo $fm -> format_cuurency($result_sale['price'])."đ"; ?></span>
					</p>
				     <div class="button"><span><a href="details.php?proid=<?php  echo $result_sale['productID']; ?>" class="details">Chi Tiết</a></span></div>
				</div>

		<?php 
					}
					


				}

		?>
				
			</div>
			<!-- end of xa hang -->

 
	

  
    	<div class="content_top">

    		<div class="heading">
    			<h3>Dưới 3 triệu</h3>
    		</div>
			<div class="viewall"><a href="phanloai.php?p=duoi3">>> Xem tất cả (30+)</a></div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group" data-aos="fade-up">

			<!-- bat dau duoi 3 trieu -->
		<?php 	
	      	$sanPhamDuoi3Trieu = $product ->laySanPhamtheoLoai(4,'duoi3');

	      	if($sanPhamDuoi3Trieu){
	      		while($result_3Trieu = $sanPhamDuoi3Trieu -> fetch_assoc()){
	      			if(($result_3Trieu['type'] !='2')){
	      			

	   	?>

				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php  echo $result_3Trieu['productID']; ?>"><img src="admin/uploads/<?php echo $result_3Trieu['image']; ?>" alt="" /></a>

					 <?php
					if($result_3Trieu['type'] =='1')
						echo '<div class="discount"> <span class="percentage">Tạm hết</span> </div>';
					else if($result_3Trieu['type'] =='3')
						echo '<div class="discount"> <span class="percentage">Full Box</span> </div>';
					else if($result_3Trieu['type'] =='5')
						echo '<div class="discount"> <span class="percentage">New</span> </div>';
					


					 ?>

					 <h2><?php echo $result_3Trieu['productName'];?></h2>
					<p><?php if(!empty($result_3Trieu['ghiChu']) )


					   echo ' ('.$result_3Trieu['ghiChu'].')'; ?></p>
					 <?php echo $result_3Trieu['moTaNgan']; ?>
					  <p>
						<?php if($result_3Trieu['price_old'] >0 )
						
							  echo '<span class="strike"> '.($fm -> format_cuurency($result_3Trieu['price_old']))." "."đ".'</span>'; ?>
						
							<span class="price"><?php echo $fm -> format_cuurency($result_3Trieu['price'])."đ"; ?></span>
					</p>
				     <div class="button"><span><a href="details.php?proid=<?php  echo $result_3Trieu['productID']; ?>" class="details">Chi Tiết</a></span></div>
				</div>

		<?php 		}
					
				}
				
			}

		?>
			</div>
			<div class="section group" data-aos="fade-right">
		<?php 	
	      	$sanPhamDuoi3Trieu = $product ->laySanPhamtheoLoai(3,'duoi3');

	      	if($sanPhamDuoi3Trieu){
	      		while($result_3Trieu = $sanPhamDuoi3Trieu -> fetch_assoc()){
	      			if(($result_3Trieu['type'] !='2')){

	   	?>

				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php  echo $result_3Trieu['productID']; ?>"><img src="admin/uploads/<?php echo $result_3Trieu['image']; ?>" alt="" /></a>

					 <?php
					if($result_3Trieu['type'] =='1')
						echo '<div class="discount"> <span class="percentage">Tạm hết</span> </div>';
					else if($result_3Trieu['type'] =='3')
						echo '<div class="discount"> <span class="percentage">Full Box</span> </div>';
					else if($result_3Trieu['type'] =='5')
						echo '<div class="discount"> <span class="percentage">New</span> </div>';
					


					 ?>

					 <h2><?php echo $result_3Trieu['productName'];?></h2>
					<p><?php if(!empty($result_3Trieu['ghiChu']) )


					   echo ' ('.$result_3Trieu['ghiChu'].')'; ?></p>
					 <?php echo $result_3Trieu['moTaNgan']; ?>
					 <p>
						<?php if($result_3Trieu['price_old'] >0 )
						
							  echo '<span class="strike"> '.($fm -> format_cuurency($result_3Trieu['price_old']))." "."đ".'</span>'; ?>
						
							<span class="price"><?php echo $fm -> format_cuurency($result_3Trieu['price'])."đ"; ?></span>
					</p>
				     <div class="button"><span><a href="details.php?proid=<?php  echo $result_3Trieu['productID']; ?>" class="details">Chi Tiết</a></span></div>
				</div>

		<?php 
					}
				}
				
			}

		?>
				
			</div>
			<!-- end of xa hang -->
		<!--sec 3- 5 tr-->
		<div class="content_top">
    		<div class="heading">
    		<h3>Từ 3.1 - 5 triệu</h3>
    		</div>
    		<div class="viewall"><a href="phanloai.php?p=3den5">>> Xem tất cả (30+)</a></div>
    		<div class="clear"></div>
    	</div>
		
				
		
		<div class="section group" data-aos="fade-down-left">

			<!-- bat dau tu 3 den 5 trieu -->
		<?php 	
	      	$sanPham3den5 = $product ->laySanPhamtheoLoai(4,'3den5');

	      	if($sanPham3den5){
	      		while($result_3den5  = $sanPham3den5 -> fetch_assoc()){
	      			
	      			

	   	?>

				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php  echo $result_3den5['productID']; ?>">
					 	 <div class="box">
					 	<div class="front"> 
					 		<img src="admin/uploads/<?php echo $result_3den5['image']; ?>" alt="" />
					 	</div>
						
						
						<div class="back">
							<img src="1.jpg" alt="">
						</div>
						</div>
						</a>
					 <?php
					if($result_3den5['type'] =='1')
						echo '<div class="discount"> <span class="percentage">Tạm hết</span> </div>';
					else if($result_3den5['type'] =='3')
						echo '<div class="discount"> <span class="percentage">Full Box</span> </div>';
					else if($result_3den5['type'] =='5')
						echo '<div class="discount"> <span class="percentage">New</span> </div>';


					 ?>

					 <h2><?php echo $result_3den5['productName']; ?> </h2>
					  <p><?php if(!empty($result_3den5['ghiChu']) )


					   echo ' ('.$result_3den5['ghiChu'].')'; ?></p>
					 <?php echo $result_3den5['moTaNgan'];?>
					 <p>
						<?php if($result_3den5['price_old'] >0 )
						
							  echo '<span class="strike"> '.($fm -> format_cuurency($result_3den5['price_old']))." "."đ".'</span>'; ?>
						
							<span class="price"><?php echo $fm -> format_cuurency($result_3den5['price'])." "."đ"; ?></span>
					</p>
				     <div class="button"><span><a href="details.php?proid=<?php  echo $result_3den5['productID']; ?>" class="details">Chi Tiết</a></span></div>
				</div>

		<?php 
						
				}
				
			}

		?>
			</div>
			<div class="section group" data-aos="fade-down-left">
		<?php 	
	      	$sanPham3den5 = $product ->laySanPhamtheoLoai(3,'3den5');

	      	if($sanPham3den5){
	      		while($result_3den5  = $sanPham3den5 -> fetch_assoc()){
	      			

	   	?>

				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php  echo $result_3den5['productID']; ?>"><img src="admin/uploads/<?php echo $result_3den5['image']; ?>" alt="" /></a>

					 <?php
					if($result_3den5['type'] =='1')
						echo '<div class="discount"> <span class="percentage">Tạm hết</span> </div>';
					else if($result_3den5['type'] =='3')
						echo '<div class="discount"> <span class="percentage">Full Box</span> </div>';
					else if($result_3den5['type'] =='5')
						echo '<div class="discount"> <span class="percentage">New</span> </div>';

					


					 ?>

					 <h2><?php echo $result_3den5['productName'];?></h2>
					  <p><?php if(!empty($result_3den5['ghiChu']) )


					   echo ' ('.$result_3den5['ghiChu'].')';  ?></p>
					 <?php echo $result_3den5['moTaNgan']; ?>
					 <p>
						<?php if($result_3den5['price_old'] >0 )
						
							  echo '<span class="strike"> '.($fm -> format_cuurency($result_3den5['price_old']))." "."đ".'</span>'; ?>
						
							<span class="price"><?php echo $fm -> format_cuurency($result_3den5['price'])." "."đ"; ?></span>
					</p>
				     <div class="button"><span><a href="details.php?proid=<?php  echo $result_3den5['productID']; ?>" class="details">Chi Tiết</a></span></div>
				</div>

		<?php 
					
				}
				
			}

		?>
				
			</div>
		
		
		
		<!--sec 5-7 tr-->
		
		<div class="content_top">
    		<div class="heading">
    		<h3>Từ 5.1 - 7 triệu</h3>
    		</div>
    		<div class="viewall"><a href="phanloai.php?p=5den7">>> Xem tất cả (30+)</a></div>
			<div class="clear"></div>
    	</div>
			
		
		<div class="section group" data-aos="zoom-in-up">

			<!-- bat dau tu 5 den 7 trieu -->
		<?php 	
	      	$sanPham5den7 = $product ->laySanPhamtheoLoai(4,'5den7');

	      	if($sanPham5den7){
	      		while($result_5den7  = $sanPham5den7 -> fetch_assoc()){
	      			
	      			

	   	?>

				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php  echo $result_5den7['productID']; ?>"><img src="admin/uploads/<?php echo $result_5den7['image']; ?>" alt="" /></a>

					 <?php
					if($result_5den7['type'] =='1')
						echo '<div class="discount"> <span class="percentage">Tạm hết</span> </div>';
					else if($result_5den7['type'] =='3')
						echo '<div class="discount"> <span class="percentage">Full Box</span> </div>';
					else if($result_5den7['type'] =='5')
						echo '<div class="discount"> <span class="percentage">New</span> </div>';

					


					 ?>

					 <h2><?php echo $result_5den7['productName']; ?></h2>
					  <p> <?php if(!empty($result_5den7['ghiChu']) )


					   echo ' ('.$result_5den7['ghiChu'].')'; ?></p>


					

					 <?php echo $result_5den7['moTaNgan']; ?>
					 <p>
						<?php if($result_5den7['price_old'] >0 )
						
							  echo '<span class="strike"> '.($fm -> format_cuurency($result_5den7['price_old']))." "."đ".'</span>'; ?>
						
							<span class="price"><?php echo $fm -> format_cuurency($result_5den7['price'])." "."đ"; ?></span>
					</p>
				     <div class="button"><span><a href="details.php?proid=<?php  echo $result_5den7['productID']; ?>" class="details">Chi Tiết</a></span></div>
				</div>

		<?php 
					
				}
				
			}

		?>
			</div>
			<div class="section group" data-aos="zoom-in-up">
		<?php 	
	      	$sanPham5den7 = $product ->laySanPhamtheoLoai(3,'5den7');

	      	if($sanPham5den7){
	      		while($result_5den7  = $sanPham5den7 -> fetch_assoc()){
	      			

	   	?>

				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php  echo $result_5den7['productID']; ?>"><img src="admin/uploads/<?php echo $result_5den7['image']; ?>" alt="" /></a>

					 <?php
					if($result_5den7['type'] =='1')
						echo '<div class="discount"> <span class="percentage">Tạm hết</span> </div>';
					else if($result_5den7['type'] =='3')
						echo '<div class="discount"> <span class="percentage">Full Box</span> </div>';
						else if($result_5den7['type'] =='5')
						echo '<div class="discount"> <span class="percentage">New</span> </div>';



					 ?>

					 <h2><?php echo $result_5den7['productName'];?> </h2>
					 <p><?php if(!empty($result_5den7['ghiChu']) )


					   echo ' ('.$result_5den7['ghiChu'].')'; ?></p>
					 <?php echo $result_5den7['moTaNgan'];?>
					<p>
						<?php if($result_5den7['price_old'] >0 )
						
							  echo '<span class="strike"> '.($fm -> format_cuurency($result_5den7['price_old']))." "."đ".'</span>'; ?>
						
							<span class="price"><?php echo $fm -> format_cuurency($result_5den7['price'])." "."đ"; ?></span>
					</p>
					 
				     <div class="button"><span><a href="details.php?proid=<?php  echo $result_5den7['productID']; ?>" class="details">Chi Tiết</a></span></div>
				</div>

		<?php 
						
				}
				
			}

		?>
				
			</div>
		
		<!--sec 7-10 tr-->
		<div class="content_top">
    		<div class="heading">
    		<h3>Từ 7.1 - 10 triệu</h3>
    		</div>
    		<div class="viewall"><a href="phanloai.php?p=7den10">>> Xem tất cả (30+)</a></div>
    	


    		<div class="clear"></div>
    	</div>
		
		
		<div class="section group" data-aos="zoom-out-right">

			<!-- bat dau tu 7 den 10 trieu -->
		<?php 	
	      	$sanPham7den10 = $product ->laySanPhamtheoLoai(4,'7den10');

	      	if($sanPham7den10){
	      		while($result_7den10  = $sanPham7den10 -> fetch_assoc()){
	      			
	      			

	   	?>

				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php  echo $result_7den10['productID']; ?>"><img src="admin/uploads/<?php echo $result_7den10['image']; ?>" alt="" /></a>

					 <?php
					if($result_7den10['type'] =='1')
						echo '<div class="discount"> <span class="percentage">Tạm hết</span> </div>';
					else if($result_7den10['type'] =='3')
						echo '<div class="discount"> <span class="percentage">Full Box</span> </div>';
						else if($result_7den10['type'] =='5')
						echo '<div class="discount"> <span class="percentage">New</span> </div>';

					


					 ?>

					 <h2><?php echo $result_7den10['productName']; ?> </h2>
					  <p> <?php if(!empty($result_7den10['ghiChu']) )


					   echo ' ('.$result_7den10['ghiChu'].')';?></p>


					

					 <?php echo $result_7den10['moTaNgan']; ?>
					<p>
						<?php if($result_7den10['price_old'] >0 )
						
							  echo '<span class="strike"> '.($fm -> format_cuurency($result_7den10['price_old']))." "."đ".'</span>'; ?>
						
							<span class="price"><?php echo $fm -> format_cuurency($result_7den10['price'])." "."đ"; ?></span>
					</p>
				     <div class="button"><span><a href="details.php?proid=<?php  echo $result_7den10['productID']; ?>" class="details">Chi Tiết</a></span></div>
				</div>

		<?php 
					
				}
				
			}

		?>
			</div>
			<div class="section group" data-aos="zoom-out-right">
		<?php 	
	      	 	$sanPham7den10 = $product ->laySanPhamtheoLoai(3,'7den10');
	      	if($sanPham7den10){
	      		while($result_7den10  = $sanPham7den10 -> fetch_assoc()){
	      			

	   	?>

				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php  echo $result_7den10['productID']; ?>"><img src="admin/uploads/<?php echo $result_7den10['image']; ?>" alt="" /></a>

					 <?php
					if($result_7den10['type'] =='1')
						echo '<div class="discount"> <span class="percentage">Tạm hết</span> </div>';
					else if($result_7den10['type'] =='3')
						echo '<div class="discount"> <span class="percentage">Full Box</span> </div>';
					else if($result_7den10['type'] =='5')
						echo '<div class="discount"> <span class="percentage">New</span> </div>';

					


					 ?>

					 <h2><?php echo $result_7den10['productName']; ?></h2>
					  <p> <?php if(!empty($result_7den10['ghiChu']) )


					   echo ' ('.$result_7den10['ghiChu'].')';?></p>
					 <?php echo $result_7den10['moTaNgan']; ?>
					 <p>
						<?php if($result_7den10['price_old'] >0 )
						
							  echo '<span class="strike"> '.($fm -> format_cuurency($result_7den10['price_old']))." "."đ".'</span>'; ?>
						
							<span class="price"><?php echo $fm -> format_cuurency($result_7den10['price'])." "."đ"; ?></span>
					</p>
					
				     <div class="button"><span><a href="details.php?proid=<?php  echo $result_7den10['productID']; ?>" class="details">Chi Tiết</a></span></div>
				</div>

		<?php 
						
				}
				
			}

		?>
				
			</div>
			<!--sec tren 10 tr-->
		<div class="content_top">
    		<div class="heading">
    		<h3>Trên 10 triệu</h3>
    		</div>
    	<div class="viewall"><a href="phanloai.php?p=tren10">>> Xem tất cả (30+)</a></div>


    		<div class="clear"></div>
    	</div>
		
			
		<div class="section group" 
		data-aos="fade-right"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine">

			<!-- bat dau tu tren 10 trieu -->
		<?php 	
	      	$sanPhamTren10 = $product ->laySanPhamtheoLoai(4,'tren10');

	      	if($sanPhamTren10){
	      		while($rerurn_sanPhamTren10  = $sanPhamTren10 -> fetch_assoc()){
	      			
	      			

	   	?>

				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php  echo $rerurn_sanPhamTren10['productID']; ?>">
					 	<img src="admin/uploads/<?php echo $rerurn_sanPhamTren10['image']; ?>" alt="" /></a>

					 <?php
					if($rerurn_sanPhamTren10['type'] =='1')
						echo '<div class="discount"> <span class="percentage">Tạm hết</span> </div>';
					else if($rerurn_sanPhamTren10['type'] =='3')
						echo '<div class="discount"> <span class="percentage">Full Box</span> </div>';
					else if($rerurn_sanPhamTren10['type'] =='5')
						echo '<div class="discount"> <span class="percentage">New</span> </div>';
					else if($rerurn_sanPhamTren10['type'] =='5')
						echo '<div class="discount"> <span class="percentage">New</span> </div>';



					 ?>

					 <h2><?php echo $rerurn_sanPhamTren10['productName']; ?> </h2>
					 <p style="height:100%;"> <?php if(!empty($rerurn_sanPhamTren10['ghiChu']) )


					   echo ' ('.$rerurn_sanPhamTren10['ghiChu'].')'; ?></p>


					

					<p></p> <?php echo $rerurn_sanPhamTren10['moTaNgan']; ?></p>
					 <p>
					<?php if($rerurn_sanPhamTren10['price_old'] >0 )
						
							  echo '<span class="strike"> '.($fm -> format_cuurency($rerurn_sanPhamTren10['price_old']))." "."đ".'</span>'; ?>
						
							<span class="price"><?php echo $fm -> format_cuurency($rerurn_sanPhamTren10['price'])." "."đ"; ?></span>
					</p>
				     <div class="button"><span><a href="details.php?proid=<?php  echo $rerurn_sanPhamTren10['productID']; ?>" class="details">Chi Tiết</a></span></div>
				</div>

		<?php 
					
				}
				
			}

		?>
			</div>
			<div class="section group" data-aos="fade-right"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine">
		<?php 	
	      	$sanPhamTren10 = $product ->laySanPhamtheoLoai(3,'tren10');

	      	if($sanPhamTren10){
	      		while($rerurn_sanPhamTren10  = $sanPhamTren10 -> fetch_assoc()){
	      			
	      			

	   	?>

				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php  echo $rerurn_sanPhamTren10['productID']; ?>"><img src="admin/uploads/<?php echo $rerurn_sanPhamTren10['image']; ?>" alt="" /></a>

					 <?php
					if($rerurn_sanPhamTren10['type'] =='1')
						echo '<div class="discount"> <span class="percentage">Tạm hết</span> </div>';
					else if($rerurn_sanPhamTren10['type'] =='3')
						echo '<div class="discount"> <span class="percentage">Full Box</span> </div>';
					else if($rerurn_sanPhamTren10['type'] =='5')
						echo '<div class="discount"> <span class="percentage">New</span> </div>';

					


					 ?>

					 <h2><?php echo $rerurn_sanPhamTren10['productName'];?> </h2>
					<p style="height:100%;" ><?php if(!empty($rerurn_sanPhamTren10['ghiChu']) )


					   echo ' ('.$rerurn_sanPhamTren10['ghiChu'].')'; ?></p>
				<p  >	<?php echo $rerurn_sanPhamTren10['moTaNgan']; ?></p>
					
					 <p>
						<?php if($rerurn_sanPhamTren10['price_old'] >0 )
						
							 echo '<span class="strike"> '.($fm -> format_cuurency($rerurn_sanPhamTren10['price_old']))." "."đ".'</span>'; ?>
						
							<span class="price"><?php echo $fm -> format_cuurency($rerurn_sanPhamTren10['price'])." "."đ"; ?></span>
					</p>
				     <div class="button"><span><a href="details.php?proid=<?php  echo $rerurn_sanPhamTren10['productID']; ?>" class="details">Chi Tiết</a></span></div>
				</div>

		<?php 
						
				}
				
			}

		?>
				
			</div>



    </div>
    <!-- end content -->




 <?php 
 	include 'inc/footer.php';
 ?>