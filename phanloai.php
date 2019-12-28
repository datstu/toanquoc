
<?php 
 	include 'inc/header.php';

 	
 
 ?>
 <?php 
	$pd = new product();
	 if(isset($_GET['p'])) {
       		$id = $_GET['p'];
       		
    }
?>
<div class="main">


    <div class="content">
    	

		   <?php 
                                $catlist = $product -> laySanPhamtheoLoai_all($id);

            if($id != 'xahang'){
            if($catlist){
                while ($result_cat = $catlist ->fetch_assoc()) {

                
                		$s= $result_cat['catName'];
                		break;
                	} 
                }
            }else $s = 'Xả hàng || Giảm giá';
                ?>

    	<div class="content_top">
   				<div class="heading"> <h3>
				<?php if(isset($s)) echo $s; 
						

   				?></h3></div>
   				 
   			 	<div class="clear"></div>
  			</div>
  

		<!-- start xa hang -->
		

		<div class="section group" data-aos="fade-up">

  		<?php
  			$flag=false;
  			$i=1;

	      	$spTheoLoai = $pd ->laySanPhamtheoLoai_all($id);

	      	if($spTheoLoai){
	      		
  	
	      		while($result_theoLoai = $spTheoLoai -> fetch_assoc()){
	      			
	      			if($flag == true)
					{
	      				
			      			
			      			$flag =false;
			      				//echo '</div><div class="section group">';
			      			
	      			}else {
	      				if ($i>4 && ($i-1)%4 ==0){

	      					echo '</div><div class="section group" data-aos="fade-up">';
	      					$flag = true;

	      				}
	      			}
	      			

	   	?>
				
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php  echo $result_theoLoai['productID']; ?>"><img src="admin/uploads/<?php echo $result_theoLoai['image']; ?>" alt="" /></a>
					 <?php
					if($result_theoLoai['type'] =='1')
						echo '<div class="discount"> <span class="percentage">Tạm hết</span> </div>';
					else if($result_theoLoai['type'] =='3')
						echo '<div class="discount"> <span class="percentage">Full Box</span> </div>';
					else if($result_theoLoai['type'] =='5')
						echo '<div class="discount"> <span class="percentage">New</span> </div>';
					


					 ?>
					
					 <h2><?php  echo $result_theoLoai['productName'];
					 	if(!empty($result_theoLoai['ghiChu']) )


					   echo ' ('.$result_theoLoai['ghiChu'].')';?></h2>
					 <p><?php echo $result_theoLoai['moTaNgan']; ?></p>
					  <p>
						<?php if($result_theoLoai['price_old'] >0 )
						
							  echo '<span class="strike"> '.($fm -> format_cuurency($result_theoLoai['price_old']))." "."đ".'</span>'; ?>
						
							<span class="price"><?php echo $fm -> format_cuurency($result_theoLoai['price'])." "."đ"; ?></span>
					</p>
				     <div class="button"><span><a href="details.php?proid=<?php  echo $result_theoLoai['productID']; ?>" class="details">Chi tiết</a></span></div>
				</div>

		<?php 

				
	      		$i++;
	      	}
			
				
			}

		?>
			</div>
    </div>
</div>
<?php 
 	include 'inc/footer.php';
 ?>