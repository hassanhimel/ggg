
<!--  SE Lab Project  
 
      After Mid  -->

<?php
session_start();
error_reporting(0);
if ($_SESSION['email']==true) {
  
}else
  header('location:admin_login.php');
  $page='categories';

include('include/header.php');

?>

<?php 
	include('database/connection.php');
	$id=$_GET['edit'];
	$query=mysqli_query($conn,"select * from subcategory where id='$id' ");

	while ($row=mysqli_fetch_array($query)) {
		$subcategory=$row['subcategory_name'];
		$des=$row['des'];
	
	}



?>

<div style="width: 70% ; margin-left: 25%; margin-top: 10% ">	

	<form action="edit_sub.php" method="post" name="categoryform"onsubmit="return validateform() ">
		<h1>Update Sub Category</h1>
		<hr>
  <div class="form-group">
    <label for="email"> Sub Category: </label>
    <input type="text" name="subcategory" value="<?php echo $subcategory; ?>" class="form-control" id="email">
  </div>
  
  <div class="form-group">
  <label for="comment">Description:</label>
  <textarea class="form-control" value="<?php echo $des; ?>" rows="6" name="des" id="comment"><?php echo $des; ?></textarea>
</div>

<input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>">
  
  <input type="submit" name="submit" class="btn btn-primary" value="Update Sub-Category">
</form>

<script>
  
function validateform(){
  var x = document.forms['categoryform']['subcategory'].value;
  if (x=="") {
    alert('Carefully Fillup !');
    return false;
  }
   
}

</script>
	
</div>

<?php 

include('database/connection.php');
	if (isset($_POST['submit'])) {
		$id=$_POST['id'];
		$subcategory=$_POST['subcategory'];
		$des=$_POST['des'];

		$query1=mysqli_query($conn,"update subcategory set subcategory_name='$subcategory',des='$des' where id='$id' ");

		if (query1) {
			echo "<script> alert('Sub-category updated successfully') </script> "; 
			header('location:categories.php');

		echo "<script>window.location='http://localhost/newsportal/categories.php';</script>"; 

 	    
		}else{
			echo "Sub Category Not Update";
		}

	}

?>

<?php 
	include('include/footer.php');

?>

