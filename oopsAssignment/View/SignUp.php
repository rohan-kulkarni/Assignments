<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Form</title>
        <link rel="stylesheet" href="Style/signUpStyle.css">
    </head>
    <body>

      <form action="register.php" method="post">
      
        <h1>Sign Up</h1>
        
        <fieldset>
          <legend><span class="number">1</span>Your basic info</legend>
          <label for="name">First Name:</label>
          <input type="text" id="first_name" name="first_name">

          <label for="name">Last Name:</label>
          <input type="text" id="last_name" name="last_name">
          
          <label for="name">Username:</label>
          <input type="text" id="username" name="username">
          

          <label for="email">Email:</label>
          <input type="email" id="email" name="email">
          
          <label for="password">Password:</label>
          <input type="password" id="password" name="password">
  
          <label>Gender:</label>
          Male : - <input type="radio" id="male" value="male" name="gender">
        
          Female : - <input type="radio" id="female" value="female" name="gender">
         
          <label>Date of Birth:</label>
          <input type="date" id="date_of_birth" name="date_of_birth">

          <br/><br/>
          <label for="profile">Job Profile:</label>
            <?php
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
            ?>
        
        </fieldset>
        <input type="submit" value='Sign Up' name="signup">
      </form>
      
    </body>
</html>