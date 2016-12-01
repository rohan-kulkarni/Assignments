<!DOCTYPE html>
<html>
<head>
	<title>Edit details</title>
	<link rel="stylesheet" type="text/css" href="Style/signUpStyle.css">
</head>
<body>
	<?php
			$file=fopen("jsonarray.txt","r");
			$jsonarray=json_decode(file_get_contents("jsonarray.txt"));
			echo"<form action='../View/save.php' method='post'>
			 <h1>Edit Details</h1>
			        <fieldset>
			          <legend><span class='number'>1</span>Your basic info</legend>";
			foreach ($jsonarray as $key=>$value) 
			{
				
       			if($key=='first_name')
       			{
       				echo "<label for='name'>First Name:</label>
			           <input type='text' id='first_name' name='first_name' value='".$value."'>";
       			}
       			if($key=='last_name')
       			{
       				echo "<label for='name'>Last Name:</label>
			           <input type='text' id='last_name' name='last_name' value='".$value."'>";
      			}
         		if($key=='email')
       			{
       				echo "<label for='name'>Email:</label>
			           <input type='email' id='email' name='email' value='".$value."'>";
       			}
       			if($key=='date_of_birth')
      			{
      				echo "<label>Date of Birth:</label>
          <input type='date' id='date_of_birth' name='date_of_birth' value=".$value.">";
      			}
				if($key=="gender")
				{
					if($value=="male")
					{
						echo "Male:-<input type='radio' value='male' name='gender' CHECKED>";
						echo "Female:-<input type='radio' value='female' name='gender'>";
					}
					else
					{
						echo "<input type='radio' value='male' name='gender'>";
						echo "<input type='radio' value='male' name='gender' CHECKED>";
					}
				}
				if($key=="name")
				{
	
		              include("../Config/database.php");
		              $selectProfile="Select * from profiles";
		              $result=mysql_query($selectProfile) or die("Could not Create table plese check error ".mysql_error());
		              echo $result[1];
		              echo "<select id='profile' name='profile'>";
		              while($row=mysql_fetch_array($result))
		              {
		                echo "<option value=".$row[0].">".$row[1]."</option>";
		              }
		              echo "</select>";
				}
			}
			echo "<input type='submit' value='save'>";
			unlink("jsonarray.txt");
?>
</body>
</html>