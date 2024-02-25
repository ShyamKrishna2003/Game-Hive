<?php 
  include("../Assets/Connection/Connection.php");

?>

<?php
 $selCat="select * from tbl_category";
 $resCat=$con->query($selCat);

if(isset($_POST["submit"]))
{
	 $name=$_POST["name"];
     $contact=$_POST["contact"];
     $email=$_POST["email"];
     $address=$_POST["address"];
     $place_id=$_POST["place"];
     $gender=$_POST["gender"];
     $dob=$_POST["date"];
     $pass=$_POST["password"];
     $c_pass=$_POST["c_password"];
	 
	 $game=$_POST['game'];
	 $category=$_POST['sel-cat'];
	 $experience=$_POST['sel-exp'];
	 
 	$photo=$_FILES["txtphoto"]["name"];
	$temp=$_FILES["txtphoto"]["tmp_name"];
	move_uploaded_file($temp,'../Assets/File/User/'.$photo);
	
	$insQry="insert into tbl_user (user_name, user_contact, user_email, user_address,place_id, user_gender, user_dob,user_password, user_photo,user_game,category_id,user_experience)value('".$name."','".$contact."','".$email."','".$address."','".$place_id."','".$gender."','".$dob."','".$pass."','".$photo."','".$game."','".$category."','".$experience."')";
	
  if($pass == $c_pass)
  {
    if($con->query($insQry))
	  {
		  ?>
        <script>
		      alert("Account Created");
		      window.location="Login.php";
		    </script>
      <?php
    }
  }
  else
  {
    ?>
    <script>
      alert("Recheck The Password");
      window.location="UserRegistration.php";
    </script>
    <?php
  }
}
?>
<style>
  body{
    background-color:#8380ff;
  }

  .text-box {
    padding:10px 20px;
    border:1px black solid;
    border-radius:10px;
  }

  .container {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 50px 40px;
    color: white;
    background: rgba(0, 0, 0, 0.8);
    border-radius: 10px;
    width: 370px;
    padding-left: 68px;
    margin-left: 450px;
    margin-top: 100px;
    margin-bottom: 100px;
    box-shadow: 0 0.4px 0.4px rgba(128, 128, 128, 0.109), 0 1px 1px rgba(128, 128, 128, 0.155), 0 2.1px 2.1px rgba(128, 128, 128, 0.195), 0 4.4px 4.4px rgba(128, 128, 128, 0.241), 0 12px 12px rgba(128, 128, 128, 0.35);
  }

  th{
    color:white;
  }
</style>


<html> 	
 <head>
   <title>Registration form</title>
 </head>
 <body>
  <div class="container">
   <form method="post" enctype="multipart/form-data">
     <table cellpadding="10" align="center" >
     <caption align="top" style="color: white"><h2>Create Account</h2></caption>
       <tr>
         <th scope="row">User Name</th>
         <td><input type="text" class="text-box" name="name" required title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" autocomplete="off"></td>
       </tr>
       <tr>
         <th scope="row">Contact</th>
         <td><input type="text" name="contact" class="text-box" required min="10"  pattern="[7-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaing 9 digit with 0-9" autocomplete="off"></td>
       </tr>
       <tr>
         <th scope="row">Email-id</th>
         <td><input type="email" name="email" class="text-box" required autocomplete="off"></td>
       </tr>
       <tr>
         <th scope="row">Address</th>
         <td><textarea name="address" placeholder="Enter address" class="text-box" required autocomplete="off"></textarea></td>
       </tr>
       <tr>
         <th scope="row">Photo</th>
         <td><input type="file" name="txtphoto"></td>
       </tr>
       <tr>
         <th scope="row">District</th>
         <td><select name="district" class="text-box" onChange="getPlace(this.value)" required>
              <option value="">--Select--</option>
              <?php
                $sel_dis="select * from tbl_district";
				$row=$con->query($sel_dis);
				while($res=$row->fetch_assoc())
				{
					?>
                    <option value="<?php echo $res["district_id"]; ?>"><?php echo $res["district_name"]; ?></option>
                    <?php
				}
			  ?></select></td>
       </tr>
       <tr>
         <th scope="row">Place</th>
         <td><select name="place" class="text-box" id="place" required>
             <option value="">--Select--</option>
             </select></td>
       </tr>
       <tr>
         <th scope="row">Gender</th>
         <td><input type="radio" name="gender" value="Male" required>Male<br>
             <input type="radio" name="gender" value="Female">Female<br>
             <input type="radio" name="gender" value="Others">Others
         </td>
       </tr>
       <tr>
         <th scope="row">Date of Birth</th>
         <td><input type="date" class="text-box" name="date" reguired></td>
       </tr>
       <tr>
    	 <th scope="row">Favourte Game</th>
    	 <td><input type="text" name="game" class="text-box" required autocomplete="off"/></td>
  	   </tr>
		<tr>
    		<th scope="row">Game Category</th>
    		<td>
     		  <select name="sel-cat" class="text-box" required>
       			<option value="">---Select---</option>
       			<?php
	   			while($catData=$resCat->fetch_assoc())
	   			{
		   			?>
           			<option value="<?php echo $catData['category_id'];?>"><?php echo $catData['category_name'];?></option>
           			<?php
	   			}
	   			?>
     		 </select>
   			</td>
  		</tr>
        <tr>
    	  <th scope="row">Experience Level</th>
    	  <td>
      		<select name="sel-exp" class="text-box" required>
        	  <option value="">---Select---</option>
        	  <option value="Beginner">Bgenner</option>
        	  <option value="Medium">Medium</option>
        	  <option value="Expert">Expert</option>
      		</select>
    	  </td>
  		</tr>
       <tr>
         <th scope="row">Password</th>
         <td><input type="password" class="text-box" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required autocomplete="off"></td>
       </tr>
       <tr>
         <th scope="row">Confirm Password</th>
         <td><input type="password" class="text-box" name="c_password" required autocomplete="off"></td>
       </tr>
       <tr>
         <td colspan="2" align="center">
          <input type="submit" name="submit" value="Create">
         </td>
       </tr>
     </table>
     <p align="center">Already have an account<a href="Login.php">Log in</a></p> 
   </form>
   </div>
 <script src="../Assets/JQ/jQuery.js"></script>
   <script>
     function getPlace(did)
	 {
		 $.ajax({
			 url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
			 success: function(html){
						 $("#place").html(html)
			 }
		 });
	 }
   </script>
</body>

</html>