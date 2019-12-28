<?php 
 	include 'inc/header.php';

 
 
 ?>
<?php
	 if(!isset($_GET['proid']) || $_GET['proid'] ==NULL ){
        echo "<script>window.location='404.php'</script>";
       }else{ $id = $_GET['proid'];}
    
    // if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){

    //   $number = $_POST['number'];
      

    //     $AddtoCart = $cart ->add_to_cart($id,$number);
    // }
 ?>
 <div class="main">
    <div class="content">
    	<div class="section group">

    		<?php
    		$get_details = $product ->get_details($id);
    		if($get_details){
    			
    			while ($result_details = $get_details -> fetch_assoc()) {
    		
    		
    			 ?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						


							
                   <img id="image-container" src="admin/uploads/<?php echo $result_details['image']; ?>" alt="" />
                    
						 <?php
					if($result_details['type'] =='1')
						echo '<div class="discount"> <span class="percentage">Tạm hết</span> </div>';
					else if($result_details['type'] =='3')
						echo '<div class="discount"> <span class="percentage">Full Box</span> </div>';
					else if($result_details['type'] =='2')
						echo '<div class="discount"> <span class="percentage">Xả</span> </div>';
					else if($result_details['type'] =='5')
						echo '<div class="discount"> <span class="percentage">New</span> </div>';
					 ?>   

					<div class="navi">
						<img onclick="change_img(this)" src="admin/uploads/<?php echo $result_details['image']; ?>" alt="">

 							<?php

                                 $show_image = $product ->show_imagesbyID($result_details['productID']);
                     
   					 			if($show_image){
                                	

                                    while ($result_IMG = $show_image ->fetch_assoc()) {
                                  	  

                 
                    	
		                           
		                       	
                 
                              ?>
                              		


					 
					<img onclick="change_img(this)" src="admin/uploads/<?php echo $result_IMG['imgName']; ?>" alt="">
				


						<?php }
                          		}
                        
                   ?>
					</div>

					</div>

				<div class="desc span_3_of_2">
					<h2><?php  echo $result_details['productName'];
					 	if(!empty($result_details['ghiChu']) )


					   echo ' ('.$result_details['ghiChu'].')';?></h2>
					<p><?php echo $result_details['product_desc']; ?></p>
					
 

				<div class="price" >
						<?php if($result_details['price_old'] >0 )
						
				echo '<p>Giá cũ: <span style="color:#444;text-decoration:line-through;"> '.($fm -> format_cuurency($result_details['price_old']))." "."đ".'</span>'; ?>
						</p>
					
						<p>Giá <?php if($result_details['price_old'] >0 ) echo 'mới'?>: <span class="price"><?php echo $fm -> format_cuurency($result_details['price'])." "."đ"; ?></span></p>
					</div>


					
				<div class="add-cart">
					<form action="" method="post">
						
						<input type="number" class="buyfield" name="number" value="1" min="1" />
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
						
						
					</form>	
					<?php
						if(isset($AddtoCart)){
							echo '<span style="color:red; font-size:18px;"> '.$AddtoCart.'</span>';
						}

						 ?>			
				</div>
			</div>
			<div class="product-desc">
			<h2>Laptoptoanquoc.com</h2>
			<p>	- 100% Sản phẩm như hình (Do cửa hàng tự chụp).</p>
			<p>	- Máy nhập Nhật Bản, không tân trang, không sửa chữa.</p>
			<p>	- Máy nguyên bản, ngoại hình phai dần tự nhiên theo thời gian.</p>
			<p>	- Xài thử (bao test sản phẩm) 7 ngày, 1 đổi 1 hoặc hoàn tiền nếu xảy ra lỗi phần cứng.</p>
			<?php if($result_details['type'] != 2 )
						
							 
			 echo '<p>- Bảo hành 1 tháng, gói bảo hành lên đến 12 tháng (tùy chọn).</p>';?>
			
	    </div>
	    <div class="product-tags">
			<h2>Tags</h2>
			<h4>Từ khóa liên quan:</h4>
			<div class="input-box">
				<input type="text" value="" />
			</div>
			<div class="button"><span><a href="#">Thêm từ khóa</a></span></div>
	    </div>	
				
	</div>
	<?php
			}
		}
			 ?>
				<div class="rightsidebar span_3_of_1">
					<h2>Hãng sản xuất</h2>
					<ul>
				<?php
				                                 
				                                
				                                 $bralist = $br -> show_Brand();
				 
				                                 if($bralist){
				                                     while ($result_brand = $bralist ->fetch_assoc()) {
				                                      
				                              ?>

				      <li><a href="productbybrand.php?p=<?php echo $result_brand['brandID'];?>"><?php echo $result_brand['brandName']; ?></a></li>
				   <?php
				     }
				     } ?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
<?php 
 	include 'inc/footer.php';
 ?>