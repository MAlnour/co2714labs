<!DOCTYPE html>

<?php 
include 'connect.php';
?>

<html>
<head>
<title>create Table </title>
</head>
<body>
<?php
$sql = "SELECT ID, firstname, surname, email from users";
$result = $mysqli->query ($sql);
if ($result)
{
   if ($result->num_rows > 0)
   {
          echo "<table>";
    
       echo "<tr>";
       echo "<th>ID</th>";
       echo "<th>firstname</th>";
       echo "<th>surname</th>";
       echo "<th>email</th>";
       echo "<tr>";
       while($row = $result->fetch_assoc())
       {
           // output data of each row
           echo "<tr>";
           echo "<td>".$row['ID']."</td>";
           echo "<td>".$row['firstname']."</td>";
           echo "<td>".$row['suename']."</td>";
           echo "<td>".$row['emai']."</td>";
           echo "</tr>";
           
       }
       echo "</table";
   }
   else 
   {
       echo "<p> 0 results</p>";
   }

 $result->close();
 $mysqli->close();

}


echo "<h1>Hello world</h1>";

?>
</body>
</html>