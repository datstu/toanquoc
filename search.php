<?php 
 	include 'inc/header.php';
 	$masp="";
 	if(isset($_POST['search']) ){
 		$masp = $_POST['search'];

 	}

 ?>

<div class="main">
    <div class="content">

	<div class="content_top">
    		<div class="back-links">
    		<p>Từ khóa &nbsp;>>>&nbsp;<?php echo $masp; ?></a></p>
    	    </div>
   		<div class="clear"></div>
    	</div>


    	<div class="section group">
		<?php 	
	      	$timSP = $product ->timSanPham($masp);

	      	if($timSP){
	      		$i=0;
	      		while($rerurn_sanPhamTren10  = $timSP -> fetch_assoc()){
	      			$i++;
					
					if(($i -1)% 4 ==0){
						echo '</div><div class="section group">';
					}	
	      			
	      			
	      			

	   	?>

				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php  echo $rerurn_sanPhamTren10['productID']; ?>"><img src="admin/uploads/<?php echo $rerurn_sanPhamTren10['image']; ?>" alt="" /></a>

					 <?php
					if($rerurn_sanPhamTren10['type'] =='1')
						echo '<div class="discount"> <span class="percentage">Tạm hết</span> </div>';
					else if($rerurn_sanPhamTren10['type'] =='2')
						echo '<div class="discount"> <span class="percentage">Xả</span> </div>';
					else if($rerurn_sanPhamTren10['type'] =='3')
						echo '<div class="discount"> <span class="percentage">Full Box</span> </div>';
					


					 ?>

					 <h2><?php  echo $rerurn_sanPhamTren10['productName'];
					 	if(!empty($rerurn_sanPhamTren10['ghiChu']) )


					   echo ' ('.$rerurn_sanPhamTren10['ghiChu'].')';?></h2>
					 <p><?php echo $rerurn_sanPhamTren10['moTaNgan'];?></p>
					
					 <p>
						<?php if($rerurn_sanPhamTren10['price_old'] >0 )
						
							 echo '<span class="strike"> '.($fm -> format_cuurency($rerurn_sanPhamTren10['price_old']))." "."đ".'</span>'; ?>
						
							<span class="price"><?php echo $fm -> format_cuurency($rerurn_sanPhamTren10['price'])." "."đ"; ?></span>
					</p>
				     <div class="button"><span><a href="details.php?proid=<?php  echo $rerurn_sanPhamTren10['productID']; ?>" class="details">Chi tiết</a></span></div>
				</div>

		<?php 	

				}
				
			}else {echo(
					'<div class="result" style="min-height: 100px; margin: 20px ; text-align: center;">
			<p>Xin lỗi chúng tôi không có sản phẩm này. </p>
			<p>Hoặc máy tìm kiếm đã bị hỏng.Vui lòng kiểm tra lại!</p>
			</div>');}

		?>
				
			</div>

</div>
</div>

 <?php 
 	include 'inc/footer.php';
 ?>