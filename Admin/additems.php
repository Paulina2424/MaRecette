<?php
session_start();

if(!$_SESSION['admin_username'])
{

    header("Location: ../index.html");//redirect to login page to secure the welcome page without login access.
}

?>

<?php
include("db_conection.php");
if(isset($_POST['item_save']))
{
$item_name = $_POST['item_name'];
$item_price = $_POST['item_price'];
$item_qty = $_POST['item_qty'];
 
 $check_item="select * from items WHERE item_name='$item_name'";
 echo $check_item;
    $run_query=mysqli_query($dbcon,$check_item);

    if(mysqli_num_rows($run_query)>0)
    {
echo "<script>alert('Item is already exist, Please try another one!')</script>";
 echo"<script>window.open('index.html','_self')</script>";
exit();
    }
 
$imgFile = $_FILES['item_image']['name'];
$tmp_dir = $_FILES['item_image']['tmp_name'];
$imgSize = $_FILES['item_image']['size'];

$upload_dir = 'item_images/';
$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
//$itempic = rand(1000,1000000).".".$imgExt;

$i=0;
while ($i == 0){
    $itempic = rand(1000,1000000).".".$imgExt;
	if (file_exists($itempic)) {
		
	} else {
		$i=1;
	}

};
				
	
			if(in_array($imgExt, $valid_extensions)){			
		
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$itempic);
					$saveitem="insert into items (item_name,unidad_ing,item_image,item_date,candisp) VALUE ('$item_name','$item_price','$itempic',CURDATE(),'$item_qty ')";
					mysqli_query($dbcon,$saveitem);
					echo $saveitem;
					 echo "<script>alert('Data successfully saved!')</script>";				
					 echo "<script>window.open('items.php','_self')</script>";
				}
				else{
					
					 echo "<script>alert('Sorry, your file is too large.')</script>";				
					 echo "<script>window.open('items.php','_self')</script>";
				}
			}
			else{
				
				 echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";				
				 echo "<script>window.open('items.php','_self')</script>";
				
			}
		
	
		

}

?>









