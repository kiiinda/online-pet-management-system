<?php
 session_start();
 if(isset($_SESSION['user']))
 {

 }
 else{
  echo"<script>location.href='login.html'</script>";
 }
?>
<html>
    <head>
        <title>Customer</title>
        <style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
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
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    outline:2px solid black;
    width: 100%;
    margin:5px ;
    background: #FAFAFA;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
th{
  background-color:rgba(230, 143, 29, 0.973); 
    
}

button{
  height: 50px;
  width: 150px;
  cursor:pointer;
  border-radius:15px;
  border: 1.5px solid white;
  background-color: rgba(224, 145, 42, 0.973);
  color:#f2f2f2;
  font-size:15px;
  font-weight: bold;
}

.custom-button{
  margin:25px;
  
}
#delete-btn{
  width:80px;
  height:44px;
  cursor:pointer;
  border-radius:15px;
  border: 1.5px solid  white; 
  background-color: rgba(230, 143, 29, 0.973); 
  color:#f2f2f2;
  font-size:15px;
  font-weight: bold;
}
input[type=text] {
    width: 15%;
    padding: 12px 20px;
    margin:8px ;
    border: 2px solid white;
    background:transparent;
    color:white;        
}


</style>    
</head>
<body>
<div class="top-nav">
            <a class="active" href="home.html"><img src="../assets/images/icon2.png"></a>
            <a href="customer.php">Customers</a>
            <div class="top-nav-right">
              <a href="logout.php">logout</a>
            </div>
          </div>
          <div class="custom-button">         
<form>
<button formaction="addCustomer.php">Add Customer</button>
<button formaction="updateCustomer.php">Update Customer</button>
<button formaction="phone.php">Phone No.</button>
</form>
</div>
    <?php
   
$con = mysqli_connect("localhost","root","","petStore");
if(!$con)
{ 
die("could not connect".mysql_error());
}
$var=mysqli_query($con,"SELECT * FROM customer ");
echo "<table>";
echo "<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Address</th>
</tr>";
if(mysqli_num_rows($var)>0){
    while($arr=mysqli_fetch_row($var))
    { echo "<tr>
    <td>$arr[0]</td>
    <td>$arr[1]</td>
    <td>$arr[2]</td>
    <td>$arr[3]</td>
  
    </tr>";}
    echo "</table>";
    mysqli_free_result($var);
}

mysqli_close($con);
    
    
?>
<form action="deleteCustomer.php" method="post">
<input  id="d-button" type="text" name="id" placeholder="Enter the id to delete" required>
    <input id= "delete-btn" type="submit" value="Delete">
</form> 

</body>
</html>