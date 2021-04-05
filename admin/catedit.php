<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
include '../classes/category.php';

$cat = new category();

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>             
               <div class="block copyblock"> 
               <?php
                if(isset($insert_cat)){
                    echo $insert_cat;
                }
                ?>
                 <form action="catedit.php" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" placeholder="Edit category" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Edit" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>