 <!DOCTYPE html>
<html>
<head>
<title>Edit</title>
</head>
<body>
<?php include 'nav.php'?>
	<div class="container">
<?php
if (isset( $_POST['submit'] ))
{
	include 'connect.php';

    $ID = $_GET['id'];
    $fn = $_POST['firstname'];
    $sn = $_POST['surname'];
    $em = $_POST['email'];

	$updatequery ="UPDATE users SET firstname=?, surname=?, email=?, password=? WHERE ID=?";
    $stmt = $mysqli->prepare($updatequery);
    $stmt->bind_param('sssss', $fn, $sn, $em, $ID );
	
    if (!$stmt->execute()) {
        echo "Error: ".$mysqli->error;
    }
    else {
        echo "<p>Record updated successfully</p>";
        echo "<a href=\"display.php\">display</a>";
    } 
    $mysqli->close();
}
else
{
	include 'connect.php';
    
    $populatequery = "SELECT * from users WHERE ID=?";
    $stmt = $mysqli->prepare($populatequery);
    $stmt->bind_param('s', $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();

	$user = $result->fetch_assoc();
    $fn = $user['firstname'];
    $sn = $user['surname'];
    $em = $user['email'];
?>
	<h1>Edit record:</h1>
    <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="post" >
        Firstname: <br><input  type="text" id="fname" name="fname" value="<?php echo "$fn"; ?>"/><br>
        Surname: <br><input  type="text" id="sname" name="sname" value="<?php echo"$sn"; ?>"/><br>
        Email: <br><input  type="text" id="email" name="email" value="<?php echo"$em"; ?>"/><br>
    <input type="submit" id="submit" name="submit" value="submit"/>
    </form>	
</div>
</body>
</html>
<?php  
}
?>