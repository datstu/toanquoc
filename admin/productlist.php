<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php' ?>

<?php include '../classes/brand.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helper/format.php';?>

<?php 
	$pd = new product();
	 if(isset($_GET['delid'])) {
       		$id = $_GET['delid'];
       		$delid = $pd ->delete_product($id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					
					<th>Product Name</th>
					<th>Product Price</th>
					<th>Product Image</th>
					<th>Brand</th>
					<th>Category</th>
					
					<th>Description</th>
					<th>Type</th>
					
				</tr>
			</thead>
			<tbody>

				<?php 
					 $pd= new product();
					  $fm= new Format();
                                $pdlist = $pd-> show_product();
                               
                                if($pdlist){

                                	$i=0;

                                    while ($result = $pdlist ->fetch_assoc()) {
                                    	$i++;
				?>
				<tr class="odd gradeX" >
					<td><?php echo $i; ?></td>
					
					<td><?php echo $result['productName']; ?></td>
					<td><?php echo ($fm -> format_cuurency($result['price'])); ?></td>
					<td width=200px;>
			<img src="uploads/<?php echo $result['image']; ?>" style="width: 120px; margin-top: 2px;">
						<?php
                                 $show_image = $pd ->show_imagesbyID($result['productID']);
                     
   					 			if($show_image){
                                	

                                    while ($result_IMG = $show_image ->fetch_assoc()) {
                                  	  

                 
                    	
		                             echo  '<img src="uploads/'.$result_IMG['imgName'].'" width=80px;>';
		                       	
                 
                              
                              		}
                          		}
                        
                   ?>
						<div><a href="xuly.php?productid=<?php echo $result['productID'] ?>">Thêm hình</a></div>
						<p>----------------------</p>
					</td>
					
					<td><?php echo $result['brandID']; ?></td>
					<td><?php echo $result['catID']; ?></td>
					<td width="300px"><?php echo $fm -> textShorten($result['product_desc'],100); ?></td>

				
					<td class="center"><?php
					if($result['type'] ==0){
					 echo 'Còn hàng';
					}
					else if($result['type'] ==1) {echo 'Hết hàng';}

					else if($result['type'] ==2){echo 'Xả hàng';	}
					 else if($result['type'] ==3) {echo 'Full box';}
					else if($result['type'] ==4)   {echo 'Full box + Xả hàng';} 
					else {echo 'Hàng Mới';} 
					 ?></td>
					

					<td><a href="pdedit.php?productid=<?php echo $result['productID'] ?>">Edit</a> || <a onclick="return confirm('Are you want to delete?')" href="?delid=<?php echo $result['productID'] ?>">Delete</a></td>
				</tr>
				<?php 
							}
						}
						?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
