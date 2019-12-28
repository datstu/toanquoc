<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php include '../classes/brand.php' ?>

<?php
 $Brand = new brand();
    if(!isset($_GET['brandid']) || $_GET['brandid'] ==NULL ){
        echo "<script>window.location='brandlist.php'</script>";
       }else{ $id = $_GET['brandid'];
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $BrandName = $_POST['BrandName'];
      

        $updateBrand = $Brand ->update_Brand($BrandName,$id);
    }

 
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
                
               <div class="block copyblock"> 
                <?php
                    if(isset($updateBrand)){
                        echo $updateBrand;
                    }

                 ?>
                 <?php
                    $get_Brande_name = $Brand ->getBrandbyID($id);
                    if($get_Brande_name){
                        while ($result = $get_Brande_name ->fetch_assoc()) {
                            # code...
                       
                  ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result ['brandName'];  ?>" name="BrandName" placeholder="Sửa danh mục sản phẩm.." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php 
            }
        }
                ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>