<?php
  include("../Assets/Connection/Connection.php")
?>

    <?php
	  if(isset($_POST["brname"]))
	  {
		  $brand=$_POST["brand"];
		  $insertqury="insert into tbl_brand(brand_name)value('".$brand."')";
		  if($con->query($insertqury))
		  {
			  ?>
			  <script>
			    alert("Inserted Succesfully");
				window.location="brand.php"
			  </script>
              <?php
		  }
	  }
	  
	  if(isset($_GET["del"]))
	  {
		  $del_query="delete from tbl_brand where brand_id='".$_GET["del"]."'";
		  if($con->query($del_query))
		  {
			   header("Loction:Brand.php");
		  }
	  }
	  ?>

<html>
  <head>
    <title>brand form</title>
  </head>
  <body>
    <form method="post">
    <table border="4">
     <tr>
       <td>brand</td>
       <td><input type="text" name="brand"/></td>
     </tr>
     <tr>
       <td colspan="2" align="center">
         <input type="submit" name="brname" value="Ok"/>
         <input type="reset" name="res" value="cancel"/>
       </td>
     </tr>
    </table>
    </form>
    
   <table width="200" border="1">
                <tr>
                  <td>SI.no</td>
                  <td>Brand</td>
                  <td>Action</td>
                </tr>
                   <?php 
				     $S="select * from tbl_brand";
					 $row=$con->query($S);
					 $l=0;
					 while($data=$row->fetch_assoc())
					 {
						 $l++;		 
				  ?>                   
                <tr>
                  <td>&nbsp;<?php echo $l ?></td>
                  <td>&nbsp;<?php echo $data["brand_name"] ?></td>
                  <td>&nbsp;<a href="brand.php ?del=<?php echo $data["brand_id"]?>">delete</a></td>
                </tr>
                <?php 
					 }
				?>
  </table>
  </body>
</html>  