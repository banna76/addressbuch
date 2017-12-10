<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}

span {border-left: 1px solid black;margin: 5px; height: 200px;}
</style>
</head>
<body>

<?php
include('conn.php');


$sql="SELECT * from userinfo";

$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>ID</th>
<th>Vorname</th>
<th>Nachname</th>
<th>Telefonnummern </th>
<th>Action</th>
<th>Action</th>
</tr>";

$lastID = null;

while($row = mysqli_fetch_array($result)) {
	    echo "<tr>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['vorname'] . "</td>";
		echo "<td>" . $row['nachname'] . "</td>";
		echo "<td><table><tr>";
		$sql_2="SELECT id,phonenumber FROM `telephonenumbers` where user_id = '".$row['id']."'";
		$result_2 = mysqli_query($con,$sql_2);	
			while($row2 = mysqli_fetch_array($result_2)) {
					echo "<td>".$row2['phonenumber']."</td>";	
			}
		echo "<tr></table></td>";
		echo "<td><button type='button'  name='update' onclick=updateFunc('".$row['id']."') value='".$row['id']."'>Update</button></td>";
		echo "<td><button type='button' id='btnDelete' name='delete' value='".$row['id']."'>Delete</button></td>";
		echo "</tr>";
	}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>