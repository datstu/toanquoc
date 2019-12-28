<?php include 'inc/header.php';?>

<?php include 'inc/sidebar.php';?>



<?php include '../classes/category.php';?>

<?php include '../classes/brand.php';?>
<?php include '../classes/product.php';?>

<?php
 $pd = new product();
    if(!isset($_GET['productid']) || $_GET['productid'] ==NULL ){
        echo "<script>window.location='productlist.php'</script>";
       }else{ $id = $_GET['productid'];
    }
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){


      

        $updateProduct = $pd->update_product($_POST,$_FILES,$id);
    }

 
 ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa sản phẩm </h2>
        <div class="block">   
         <?php
                    if(isset($updateProduct)){
                        echo $updateProduct;
                    }

                 ?>
                 <?php
                    $get_pd_name = $pd ->getproductbyID($id);
                    if($get_pd_name){
                        while ($result_product = $get_pd_name ->fetch_assoc()) {
                            # code...
                       
                  ?>      

         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                       <input type="text" name="productName" value="<?php echo $result_product['productName'];?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Ghi Chú</label>
                    </td>
                    <td>
                       <input type="text" name="ghiChu" value="<?php echo $result_product['ghiChu'];?>" class="medium" />
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

                            <option

                            <?php if($result['catID'] == $result_product['catID']){ echo 'selected';} ?>


                             value="<?php echo $result['catID'] ?>"><?php echo $result['catName'] ?></option>
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
                                $fm = new Format();
                                $bralist = $bra -> show_Brand();

                                if($bralist){
                                    while ($result_brand = $bralist ->fetch_assoc()) {
                                     
                             ?>

                            <option 


                            <?php if($result_brand['brandID'] == $result_product['brandID']){ echo 'selected';} ?>

                            value="<?php echo $result_brand['brandID'] ?>"><?php echo $result_brand['brandName'] ?></option>
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
                        <textarea name="product_desc_mini" class="tinymce"><?php echo $result_product['moTaNgan']; ?></textarea>
                    </td>
                </tr>
                
                 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="product_desc" class="tinymce"><?php echo $result_product['product_desc']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $result_product['price']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Giá cũ</label>
                    </td>
                    <td>
                        <input type="text" name="price_old" value="<?php echo $result_product['price_old']; ?>" class="medium" />
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="uploads/<?php echo $result_product['image']; ?>" width=90px;><br/>
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
                            <?php 
                            if ($result_product['type'] == 0){

                            
                            ?>
                         <!--    <option selected value="1">Featured</option>
                            <option value="0">Non-Featured</option> -->

                            <option selected  value="0">Còn hàng</option>
                            <option  value="1">Hết</option>
                            <option  value="2">Xả hàng</option>
                            <option value="3">Full box</option>
                            <option value="4">Full + xả</option>
                             <option  value="5">Hàng Mới</option>

                        <?php }else  if ($result_product['type'] == 1) { ?>
                          <!--   <option value="1">Featured</option>
                            <option selected value="0">Non-Featured</option> -->
                             <option  value="0">Còn hàng</option>
                            <option  selected  value="1">Hết</option>
                            <option  value="2">Xả hàng</option>
                            <option value="3">Full box</option>
                            <option value="4">Full + xả</option>
                             <option  value="5">Hàng Mới</option>

                        <?php  }else  if ($result_product['type'] == 2) { ?>
                          <!--   <option value="1">Featured</option>
                            <option selected value="0">Non-Featured</option> -->
                             <option  value="0">Còn hàng</option>
                            <option    value="1">Hết</option>
                            <option  selected value="2">Xả hàng</option>
                            <option value="3">Full box</option>
                            <option value="4">Full + xả</option>
                             <option  value="5">Hàng Mới</option>

                        <?php  }else  if ($result_product['type'] == 3) { ?>
                          <!--   <option value="1">Featured</option>
                            <option selected value="0">Non-Featured</option> -->
                             <option  value="0">Còn hàng</option>
                            <option     value="1">Hết</option>
                            <option  value="2">Xả hàng</option>
                            <option selected value="3">Full box</option>
                            <option value="4">Full + xả</option>
                             <option  value="5">Hàng Mới</option>

                        <?php } else if ($result_product['type'] == 4)    { ?>
                          <!--   <option value="1">Featured</option>
                            <option selected value="0">Non-Featured</option> -->
                             <option  value="0">Còn hàng</option>
                            <option   value="1">Hết</option>
                            <option  value="2">Xả hàng</option>
                            <option value="3">Full box</option>
                            <option selected value="4">Full + xả</option>
                             <option  value="5">Hàng Mới</option>


                        <?php } else if ($result_product['type'] == 5)    { ?>
                          <!--   <option value="1">Featured</option>
                            <option selected value="0">Non-Featured</option> -->
                             <option  value="0">Còn hàng</option>
                            <option   value="1">Hết</option>
                            <option  value="2">Xả hàng</option>
                            <option value="3">Full box</option>
                            <option value="4">Full + xả</option>
                             <option selected value="5">Hàng Mới</option>



                        <?php } ?>
                         
                        </select>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        <?php }
    }
    ?>
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


