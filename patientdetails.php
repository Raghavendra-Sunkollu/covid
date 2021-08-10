

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Covid Vaccine Management portal</title>
    <style>
     
body {
  background-image: url("ht//tps://raghu2000.s3.ap-south-1.amazonaws.com/wp3287421-abstract-images-with-white-background.jpg");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}

   .image{
        width:80%;
        height:300px;
        margin-left:130px;
        padding: 10px;
        padding bottom :10px;
      
      }
    

        .form-row{
            width: 70%;
            align-content: center;
            margin: auto;
           
        }
      
        input[type=submit]{ 
        width: 15%; 
        background-color:rgb(20, 212, 171);
        border: 3px solid orange; 
        
        border-radius:20px;
      } 

       
      </style>  
  </head>
  <body>
  <?php 
session_start();
if(!$_SESSION['auth'])
{
    header('location:index.php');
}
?>
  
 <?php
if(isset($_POST['submit']))
     {

$server = "localhost";
$username = "root";
$password = "";
    
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$aadhar=$_POST['aadhar'];
$ward=$_POST['ward'];
$address=$_POST['address'];
$pincode=$_POST['pincode'];
$city=$_POST['city'];
$phone=$_POST['phone'];
echo"<br>";

$age=$_POST['age'];
$status1=$_POST['status1'];
$serial=$_POST['serial'];
echo"<br>";

$status2=$_POST['status2'];
$desc=$_POST['desc'];
echo"<br>";


$caugh=$_POST['caugh'];
$cold=$_POST['cold'];
$fever=$_POST['fever'];
$breath=$_POST['breath'];
$tired=$_POST['tired'];
$head=$_POST['head'];
echo"<br>";



 // Create connection
   $con=mysqli_connect($server,$username,$password);
   if(!$con){
    die("connection to database failed".mysql_error());   
    }      
    echo "Success connecting<br>";   
    $sql1= "INSERT INTO `covid`.`details` (`firstname`, `lastname`, `aadhar`, `ward`, `address`, `pincode`, `city`, `phone`) VALUES ('$firstname', '$lastname', '$aadhar','$ward', '$address', '$pincode', '$city', '$phone');";
    $sql2= "INSERT INTO `covid`.`vacstat` (`aadhar`, `age`,`status1`,`serial`) VALUES ( '$aadhar','$age', '$status1','$serial');";
    $sql3= "INSERT INTO `covid`.`previnf` (`aadhar`,`status2`,`descp`) VALUES ('$aadhar', '$status2', '$desc');"; 
    $sql4= "INSERT INTO `covid`.`symtoms` (`caugh`, `cold`, `fever`, `breath`, `tired`, `head`,`aadhar`) VALUES ('$caugh', '$cold', '$fever','$breath', '$tired', '$head','$aadhar');";
    $con->query($sql1);
    $con->query($sql2);
    $con->query($sql3);
    $con->query($sql4);
    //  if($con->query($sql1)==true){
    //     echo "Successfully Inserted details<br>";
    //   }
    //  else{
    //     echo "ERROR: $sql1 <br> $con->error";
    //   }


    //   if($con->query($sql2)==true){
    //     echo "Successfully Inserted Vaccination status<br>";
    //   }
    //  else{
    //     echo "ERROR: $sql2 <br> $con->error";
    //   }


    //   if($con->query($sql3)==true){
    //     echo "successfully Inserted Previous Infection Details<br>";
    //   }
    //  else{
    //     echo "ERROR: $sql3 <br> $con->error";
    //   }


    //   if($con->query($sql4)==true){
    //     echo "successfully Inserted Present Symptoms<br>";
    //   }
    //  else{
    //     echo "ERROR: $sql4 <br> $con->error";
    //   }
    echo "<meta http-equiv='refresh' content='0'>";
       $con->close();
 }
?> 

      
      <feildset>
    
   <h1 style="color: red;"><center>ENTER DETAILS</center></h1> 
            
   <form id="login" action="" method="POST">

  <div class="form-row">
    <div class="col">
        <label for="firstname" ><b>First name*:</b> </label>
      <input type="text" class="form-control" placeholder="First name" name="firstname" id="firstname" required>
    </div>
    <div class="col">
          <label for="lastname" ><b>Last name*:</b> </label>
      <input type="text" class="form-control" placeholder="Last name" name="lastname" id="lastname" required>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="aadhar">Enter the Aadhar number*</label>
      <input type="number" class="form-control" id="aadhar" name="aadhar" pattern="(?=.*\d).{12}" title="Enter valid 12 digit aadhar number" required>
    </div>
    <div class="form-group col-md-6">
      <label for="ward">Enter the Ward No*</label>
      <input type="number" class="form-control" id="ward" required name="ward" required>
    </div>
  </div>
  <div class="form-row">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" placeholder="Ex.. 79987 Main St" name="address">
  </div>
  <div class="form-row">
    <label for="pincode">Input Pincode*</label>
    <input type="number" class="form-control" id="pincode" placeholder="Enter your Pincode" name="pincode" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="city">City</label>
      <input type="text" class="form-control" id="city" name="city">
    </div>
    <div class="form-group col-md-6">
      <label for="phone">Phone*</label>
      <input type="number" class="form-control" id="phone" placeholder="Enter your phone Number" name="phone" required>
    </div>
</div>




<h3><center>Vaccination Status</center></h3>    
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="age">Enter Age*</label>
      <input type="number" class="form-control" id="age" name="age" required>
    </div>
    <div class="form-group col-md-6">
      <label for="status1">Enter Vaccination status*:</label>
      <input type="text" class="form-control" id="status1" placeholder="Enter Either Yes or No" name="status1" required>
    </div>
</div>
    <div class="form-row">
    <label for="serial">Enter Vaccine Serial Number*.</label>
    <input type="text" class="form-control" id="serial" placeholder="Enter Serial no on Vaccine" name="serial" rquired>
</div>




<h3><center>Previous Infection Details</center></h3>  
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="status2">Have you been Previously Infected From Covid19? *</label>
      <input type="text" class="form-control" id="status2" placeholder="Enter Either Yes or No" name="status2" required>
    </div>
    <div class="form-group col-md-6">
      <label for="desc">Give detailed Description.</label>
      <input type="text" class="form-control" id="desc" placeholder="Plese give Description if You were infected previosly Else please Ignore" name="desc" >
      </div>
</div>



<h3><center>Present Symptoms</center></h3>  
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="caugh">Do you have Caugh? *</label>
      <input type="text" class="form-control" id="caugh" name="caugh" placeholder="Enter Either Yes or No" required>
    </div>
    <div class="form-group col-md-6">
      <label for="cold"> Do you have Cold? *</label>
      <input type="text" class="form-control" id="cold" placeholder="Enter Either Yes or No" name="cold" required>
    </div>
</div>



<div class="form-row">
    <div class="form-group col-md-6">
      <label for="fever">Do you have Fever? *</label>
      <input type="text" class="form-control" id="fever" name="fever" placeholder="Enter Either Yes or No" required>
    </div>
    <div class="form-group col-md-6">
      <label for="breath"> Are you experiencing Shortness of Breath? *</label>
      <input type="text" class="form-control" id="breath" placeholder="Enter Either Yes or No" name="breath" required>
    </div>
</div>




<div class="form-row">
    <div class="form-group col-md-6">
      <label for="tired">Are you Feeling Tired?* </label>
      <input type="text" class="form-control" id="tired" name="tired" placeholder="Enter Either Yes or No" required>
    </div>
    <div class="form-group col-md-6">
      <label for="head"> Do you have Head ache?*</label>
      <input type="text" class="form-control" id="head" placeholder="Enter Either Yes or No" name="head" required>
    </div>
</div>

<br>
<br>
<center><input type="submit"  name="submit" value="submit"/></center>

<br>
</form>
          



   </feildset>   
      
      
    
  </body>
  <marquee><a href="logout.php" style=color:red>Click here to logout</a><marquee>
</html>

