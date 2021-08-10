<?php
if(isset($_POST['Register'] )){
 $server="localhost";
 $username="root";
 $password="";
 $db="covid";
 $con=mysqli_connect($server,$username,$password,$db);
 if(!$con){
     die("connection to database failed".mysql_error());
 }         
 echo "Success connecting";
 $user=$_POST['user'];
 $pass=$_POST['pass'];
 $sql="INSERT INTO user ( `user`, `pass`) VALUES ( '$user', '$pass');";
 echo $sql;
 if($con->query($sql)==true){
     echo "successfully inserted";
 }
 else{
     echo "ERROR: $sql <br> $con->error";
 }
$con->close();
  /* mysql_connect("localhost", "root", "") or die(mysql_error()); // Connect to database server(localhost) with UserID and PIN.
  mysql_select_db("registrations") or die(mysql_error()); // Select registration database.

  if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['PIN']) && !empty($_POST['PIN'])){
      $UserID = mysql_escape_string($_POST['name']);
      $PIN = mysql_escape_string(md5($_POST['PIN']));

      $search = mysql_query("SELECT UserID, PIN, active FROM users WHERE UserID='".$UserID."' AND PIN='".$PIN."' AND active='1'") or die(mysql_error()); 
      $match  = mysql_num_rows($search);

      if($match > 0){
          $msg = 'Login Complete! Thanks';
      }else{
          $msg = 'Login Failed!<br /> Please make sure that you enter the correct details and that you have activated your account.';
      }
  }*/
}

?>
<!DOCTYPE html> 
<html> 
<style> 
 body {
  background-image: url("");
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
     <h1><center>Covid Vaccine Management System</center></h1> 
    <!--Step 1 : Adding HTML-->
    <form id="login" action="" method="POST">
        <div class="imgcontainer"> 
            <img src= 
"" 
                 alt="Avatar" class="avatar"> 
                 <h2>Vaccine management Registration  Portal</h2>
        </div> 
  
        <div class="container"> 
            <label><b>Username</b></label> 
            <input type="text" name="user" id="user" minlength="4" maxlength="20" required/>
  
            <label><b>Enter Password</b></label> 
            <input type="password" required name="pass" id="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"title="Enter an Password Consisting of Minimum of 8 Characters with minimum of 1 Letter,1 Uppercase,1 Lowercase" autocomplete="new-password"/>
            <input type="submit"  name="Register" value="Register"/>

           
        
  
        <p>If you have already registered pleease Login from the below link <br></p>  
        <a href="index.php">Click here</a>
    </div>
       
    
        </form> 
</body> 

  
</html