<?php
 session_start();
 if(isset($_SESSION['user']))
 {

 }
 else{
  echo"<script>location.href='login.html'</script>";
 }
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Customer </title>
    <style>
body {
  margin: 0;
  font-family: sans-serif;
  background: #484848;
}
.top-nav {
  overflow: hidden;
  background-color:rgb(221, 143, 40);
  height: 80px;
  border: 3px solid rgb(189, 115, 19);
}

.top-nav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 35px;
  font-weight: bold;
}

.top-nav-right {
  float: right;
}
button{
  margin:15px;
  height: 30px;
  width: 100px;
  border-radius:15px;
  border: 2px solid black;
  background-color: rgb(189, 115, 19);
  color:#f2f2f2;
  font-size:15px;
  cursor:pointer;
}
input[type=text]{
  width:100%;
  height:30px;
  border: 2px solid  rgb(241, 188, 117); 
  border-radius:5px; 
  background:transparent;
}
fieldset { 
  background: #FAFAFA;
	padding: 10px;
  margin:auto;
  padding: 2em;
  max-width:450px;
	box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
	border-radius: 10px;
	border: 4px solid black;
}
</style>    
</head>
<body>
<div class="top-nav">
    <a class="active" href="../home.html"><img src="../assets/images/icon2.png"></a>
    <a href="customer.php">Customers</a>
    <div class="top-nav-right">
        <a href="logout.php">Logout</a>
    </div>
</div>

<form>
    <button type="submit" formaction="customer.php">BACK</button>
</form>

<form method="POST" action="addCustomer.php"> 
<fieldset> 
   <input type="text" name="id" placeholder="Enter Customer ID">
  <br><br>
  <input type="text" name="fname"   pattern = "[A-Za-z]+" placeholder="Enter customer First Name"  required>
  <br><br>
  <input type="text" name="lname"  pattern = "[A-Za-z]+" placeholder="Enter customer Last Name" required>
  <br><br>
  <input type="text" name="address"   pattern = "[A-Za-z]+" placeholder="Enter Customer Address" required>
  <br><br>
  <input type="submit" name="submit"   pattern = "[A-Za-z]+" value="ADD" style="font-weight:bold; border-radius:5px; padding:.3em; width:100%; background-color:rgb(241, 188, 117);">  
</fieldset>
</form> 
</body>
</html>

<?php
if(isset($_POST["submit"]))
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petStore";


$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

  $id = $_POST["id"];
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $address = $_POST["address"];

$sql = "INSERT INTO customer( cs_id, cs_fname, cs_lname, cs_address)
VALUES ('$id','$fname','$lname','$address')";
if ($con->query($sql) == TRUE) {
  echo"<script>alert( ' Inserted successfully!')</script>";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$con->close();
}
?>