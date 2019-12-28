<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php include '../classes/category.php';?>

<?php include '../classes/brand.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helper/format.php';?>



<?php 

	$pd = new product();
	if(isset($_GET['delid'])) {
       		$id = $_GET['delid'];
       		$delid = $pd ->delete_images($id);
    }
    if(isset ($_GET['productid'])) {
       		$id2 =  $_GET['productid'];
       		
    }
    

			
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Images List of product:
          <?php
        $get_details = $pd ->get_details($id2);
        if($get_details){
          
          while ($result_details = $get_details -> fetch_assoc()) {
        
         echo $result_details['productName'];
          }
        }
           ?>
             
        </h2>
<div class="block">  
            <table class="data display datatable" id="example">
			
			<tbody>
	<tr class="odd gradeX" >
					
					
				
			
						<?php
                                 $show_image = $pd ->show_imagesbyID($id2);
                     
   					 			      if($show_image){
                                	

                                    while ($result_IMG = $show_image ->fetch_assoc()) {
                                  	
                                  	?> 
                                  	

                
                    		<td width=200px;>
                    		<?php
		                             echo  '<img src="uploads/'.$result_IMG['imgName'].'" width=80px;>';
		                       	
                 
                              ?>
                       
						
						
					</td>
					<td>
					<a onclick="return confirm('Are you want to delete?')" 
					href="?delid=<?php echo $result_IMG['imgID']; ?>&&productid=<?php echo $id2 ?>">Delete</a></td>
					  
				</tr>
				     	<?php	
				     }
                 }         		
                         
                   ?>
			</tbody>
		</table>

       </div>






         <form action="" method="post" enctype="multipart/form-data">
         		         
                    
                                 <div>  <input type='file' name='img[]' multiple="multiple" /><br /></div>
                                
                                <input type='submit' name='ok_upload' value='Upload' />
                                </form>
                                <?php
                  if( isset($_POST['ok_upload'])){

      $add_image = $pd ->add_image($_POST,$_FILES,$id2);
      
    }	

                 ?>    
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




				  

				
                   
                
                    