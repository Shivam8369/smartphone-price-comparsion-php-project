
<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="database123";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());

}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{	
	 $Name = $_POST['name'];
	 $Email = $_POST['Email'];
	 $Password = $_POST['Password'];


	 $sql_query = "INSERT INTO entry_details(id,Name, Email, Password)
	 VALUES('NULL','$Name','$Email','$Password')";
	$result1 = mysqli_query($conn, $sql_query);

	 if ($result1) 
	 {
	header("Location:login.html");
	 } 
	 else
     {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>
