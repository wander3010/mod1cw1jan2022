<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      // username and password sent from form 
      $myusername = $_POST['username'];
      $mypassword = $_POST['password'];
      
      $sql = "SELECT user_id FROM users WHERE user_name = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $count = $result->num_rows;
      
      // check query result
      if($count > 0) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?> (here)y

<html>
   
   <head>
      <title>Login</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login Page for 21051247</b></div> 
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px">
                 <?php if (isset($error)) echo $error; ?>
               </div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
