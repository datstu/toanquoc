<?php include 'inc/header.php';?>

<?php include 'inc/sidebar.php';?>



<?php include '../classes/category.php';?>

<?php include '../classes/brand.php';?>
<?php include '../classes/product.php';?>

<?php $pd= new product();
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){

       
      

        $insertProduct = $pd ->insert_product($_POST,$_FILES);
    }
    $txtnum="";
    if(isset($_POST["txtnum"])){
        $txtnum=$_POST["txtnum"];
    }

     ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm sản phẩm </h2>
        <div class="block">   
        <?php
                    if(isset($insertProduct)){
                        echo $insertProduct;
                    }

                 ?>            
          <form action="productadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                       <input type="text" name="productName" placeholder="Thinkpad E130" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Ghi Chú</label>
                    </td>
                    <td>
                       <input type="text" name="ghiChu" placeholder="Like new, full box, vỏ xấu, hư pin..." class="medium" />
                    </td>
                </tr>
                
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>-------Select Category---------</option>
                            
                          <?php
                                $cat = new category();
                                $catlist = $cat -> show_category();

                                if($catlist){
                                    while ($result = $catlist ->fetch_assoc()) {
                                     
                             ?>

                            <option value="<?php echo $result['catID']; ?>"><?php echo $result['catName']; ?></option>
                        <?php  
                                }  
                            } 
                          ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>-------Select Brand-------</option>

                          <?php 
                               $bra = new brand();
                               $bralist = $bra -> show_Brand();
                           
                               if($bralist){
                                   while ($result_ = $bralist ->fetch_assoc()) {
                                    
                            ?>
                           
                           <option value="<?php echo $result_['brandID']; ?>">
                               <?php echo $result_['brandName'];?></option>
                                                   <?php  
                               }  
                           } 
                            ?>
                                                            
                        </select>
                    </td>
                </tr>
				<tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả ngắn</label>
                    </td>
                    <td>
                        <textarea name="product_desc_mini" class="tinymce"></textarea>
                    </td>
                </tr>
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả chi tiết</label>
                    </td>
                    <td>
                        <textarea name="product_desc" class="tinymce"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Giá cũ</label>
                    </td>
                    <td>
                        <input type="text" name="price_old" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
                
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        
                     <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <option value="0">Còn hàng</option>
                            <option value="1">Hết</option>
                            <option value="2">Xả hàng</option>
                            <option value="3">Full box</option>
                            <option value="4">Full + xả</option>
                            <option value="5">Hàng Mới</option>

                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


