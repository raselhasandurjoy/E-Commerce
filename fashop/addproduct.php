<?php include"inc/header.php"; ?>
<?php include"inc/sidebarleft.php"; ?> 
<?php include_once  "../class/brand.php";  ?>
<?php include_once  "../class/product.php";  ?> 
<?php include_once "../class/category.php"; ?>
    <?php
    $product=new product();
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        $insertproduct=$product->insertproduct($_POST,$_FILES);
    } 
    ?>
<div class="sidebar_right">
    <div class="sr_title">
       Add New Product<span style="text-align: center; margin-left: 350px;"><?php if(isset($insertproduct)){echo $insertproduct;}  ?></span>
    </div>
    <div class="sr_body">
    <div class="sr_table2">
        <form class="form-inline" action="" method="POST" enctype="multipart/form-data"> 
            <table class="table">
                <tr>
                    <td>Product Name <span style="padding:0px; margin-left:30px;"><input type="text" name="productname"  placeholder="Type product name" id="form"  class="form-control"  /></span></td>
                </tr>
                 <tr>
                    <td>Product Price <span style="padding:0px; margin-left:30px;"><input type="text" name="productprice"  placeholder="Type product price" id="form"  class="form-control"  /></span></td>
                </tr>
                <tr>
                    <td>Product Code <span style="padding:0px; margin-left:30px;"><input type="text" name="productcode"  placeholder="Type product code" id="form"  class="form-control"  /></span></td>
                </tr>
                <tr>
                    <td>Product Size <span style="padding:0px; margin-left:30px;"><input type="text" name="productsize"  placeholder="Type product code" id="form"  class="form-control"  /></span></td>
                </tr>
                 <tr>
                    <td>Product Category <span style="padding:0px; margin-left:30px;">
                    <select id="form"  class="form-control"  name="productcat">
                        <option value="">Select Product Category</option>
                        <?php
                        $cat=new category();
                        $getcat=$cat->getallcat();
                        if($getcat){
                            while ($result=$getcat->fetch_assoc()) {
                                ?>
                                 <option value="<?php echo $result['catid'] ?>"><?php echo $result['catname'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select></span></td>
                </tr>
                <tr>
                    <td>Product Brand <span style="padding:0px; margin-left:30px;">
                    <select id="form"  class="form-control"  name="productbrand">
                        <option value="">Select Product Brand</option>
                         <?php
                         $brand=new brand();
                        $getbrand=$brand->getallbrand();
                        if($getbrand){
                            while ($result=$getbrand->fetch_assoc()) {
                                ?>
                                 <option value="<?php echo $result['brandid'] ?>"><?php echo $result['brandname'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select></span></td>
                </tr>
                <tr>
                    <td>
                   
                        Content <textarea   name="description"></textarea>
                        
                    </td>
                </tr>
                <tr>
                    <td>Image <span style="padding:0px; margin-left:18px;"><input type="file" name="fontimg" id="form"   class="form-control"  /></span></td>
                </tr>
                 <tr>
                    <td>Type <span style="padding:0px; margin-left:30px;">
                    <select id="form"   class="form-control"  name="fecture">
                        <option value="">Select Type</option>
                        <option value="0">Fectured</option>
                        <option value="1">Non-Fecture</option>
                    </select></span></td>
                </tr>
                 <tr>
                    <td><span style="padding:0px; margin-left:60px; "><input type="submit" name="submit" value="Save" id="form"  class="form-control" /></span></td>
                </tr>
            </table>
        </form>
    </div>
    </div>
</div>
 <?php include"inc/footer.php"; ?>