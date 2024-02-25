<?php 
  include("../Assets/Connection/Connection.php")
?>

<html>
 <head>
   <title>Subcategory</title>
 </head>

<body>
<form method="post">
 <table border="5">
   <tr>
     <td>Category</td>
     <td>
       <select name="sel_cat">
       <option value="">--Select--</option>
       <?php  
	     $sel="select * from tbl_category";
		 $row=$con->query($sel);
		 while($data=$row->fetch_assoc())
		 {
			 ?>
             <option value="<?php echo $data["category_id"]; ?>"><?php echo $data["category_name"]; ?></option>
             <?php
		 }
	   ?>
   </tr>
   <tr>
     <td>Subcategory</td>
     <td><input type="text" name="subcategory" /></td>
   </tr>
   <tr>
     <td colspan="2" align="center">
     <input type="submit" name="submit" value="Save"nbsp>
     <input type="reset" name="cancel" value="Cancel">
     </td>
   </tr>
 
 </table>
 <?php
   if(isset($_POST["submit"]))
   {
	   $cat=$_POST["sel_cat"];
	   $subcat=$_POST["subcategory"];
	   
	   $insquery="insert into tbl_subcategory(category_id,subcategory_name)values('".$cat."','".$subcat."')";
	   if($con->query($insquery))
	   {
		   header("Location:Subcategory.php");
	   }
   }
   
   if(isset($_GET["del"]))
   {
	   $delquery="delete from tbl_subcategory where subcategory_id='".$_GET["del"]."'";
	   if($con->query($delquery))
	   {
		   header("Location:Subcategory.php");
	   }
   }
   
 ?>
 </form>
<table width="200" border="1">
   <tr>
     <td>SL.NO</td>
     <td>Category</td>
     <td>Subcategory</td>
     <td>Action</td>
   </tr>
   <?php  
     $sel_cat="select * from tbl_subcategory s inner join tbl_category c on s.category_id=c.category_id";
	 $result=$con->query($sel_cat);
	 $i=0;
	 while($val=$result->fetch_assoc())
	 {
		 $i++;
		 ?>
   
   <tr>
     <td>&nbsp;<?php echo $i ?></td>
     <td>&nbsp;<?php echo $val["category_name"] ?></td>
     <td>&nbsp;<?php echo $val["subcategory_name"] ?></td>
     <td>&nbsp;<a href="Subcategory.php ?del=<?php echo $val["subcategory_id"] ?>">Delete</a></td>
   </tr>
        <?php
	 }
	?>
 </table>
 
</body>


</html>