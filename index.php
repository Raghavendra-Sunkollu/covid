<?php
if(isset($_POST['login'] ))
{
 $server="localhost";    
 $username="root";
 $password="";
 $db="covid";
 $con=mysqli_connect($server,$username,$password,$db);
 if(!$con){
     die("connection to database failed".mysql_error());
 }         
 echo "Success connecting <br>";
 $user=$_POST["user"]; 
 $pass=$_POST["pass"]; 
 $query="SELECT * FROM  user WHERE user='$user' and pass='$pass'";
 $result=mysqli_query($con,$query);
     if(mysqli_num_rows($result)==1)
      {
          session_start();
          $_SESSION['auth']='TRUE';
          header('location:patientdetails.php');
          echo"success";
      }
     else {
          echo'Wrong  user name or password';
          }
          $con->close();
        
}




// $result1 = mysql_query("SELECT password FROM Users WHERE username = '".$name."'");
// $result2 = mysql_query("SELECT username FROM Users WHERE password = '".$password."'");
//  if($user == $result2 && $pass == $result1) 
//  { 
//      $_SESSION["logged_in"] = true; 
//      $_SESSION["naam"] = $name; 
//  }
//  else
//  {
//      echo'The username or password are incorrect!';
//  }


?>
<!DOCTYPE html> 
<html> 
<style> 
     
     body {
  background-image: url("https://raghu2000.s3.ap-south-1.amazonaws.com/background-3048876_1920.jpg");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}

    form { 
        border: 3px solid green; 
        border-radius:35px;
        width: 25%;
        align-content: center;
        margin: auto;
        background-color:rgb(20, 212, 171);
    } 
 
      
    input[type=text], 
    input[type=password] { 
        width: 100%; 
        padding: 12px 20px; 
        margin: 12px 0; 
        display: inline-block; 
        border: 3px solid orange; 
        box-sizing: border-box; 
        border-radius:20px;
       
    } 
   
       button{ 
        background-color: #4CAF50; 
        color: white; 
        padding: 14px 20px; 
        margin: 8px 0; 
        border: none; 
        cursor: pointer; 
        width: 100%; 
    }  
     button:hover { 
        opacity: 0.8; 
    } 

      .imgcontainer { 
        text-align: center; 
        margin: 12px 0 12px 0; 
    } 

    img.avatar { 
        width: 50%; 
        border-radius: 30%; 
    } 
    .container { 
        padding: 16px; 
    } 
   
</style> 
  
<body> 
     <h1 style="color: red;"><center>Covid Vaccine Management System</center></h1> 
    <!--Step 1 : Adding HTML-->
    <form id="login" action="" method="POST">
        <div class="imgcontainer"> 
            <img src="https://raghu2000.s3.ap-south-1.amazonaws.com/20201212_182149.png" 
                 alt="Avatar" class="avatar"> 
                 <h3 style="color: red;">Vaccine management Login  Portal</h3>
        </div> 
  
        <div class="container"> 
            <label><b>Username</b></label> 
            <input type="text" name="user" id="user" minlength="4" maxlength="20" required/>
  
            <label><b>Enter Password</b></label> 
            <input type="password" required name="pass" id="pass" pattern="(?=.*\d)(?=.*[a-z]).{8,}" title="Enter an Password Consisting of Minimum of 8 Characters with minimum of 1 Letter,1 Uppercase,1 Lowercase" autocomplete="new-password"/>
            <input type="submit"  name="login" value="login"/>
            
           
        </div> 
  
        <div class="container" > 
         <p>If you haven't registered pleease register from the below  link <br></p>  
         <a href="registration1.php">Click here</a>
          
            
        </div> 
    </form> 
  
</body> 
  
</html>