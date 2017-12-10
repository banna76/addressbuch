<!DOCTYPE html>
<html>
<head>
<style>
.closeDiv  {float:right;cursor:pointer;padding:5px;}
#insertMask {padding:50 10;}
</style>
</head>
<body>

<?php

include('conn.php');

$id=$_GET['id'];

$noPhone = true;

$sql="SELECT id FROM telephonenumbers where user_id = '$id'";

$result = mysqli_query($con,$sql);

$user_id = mysqli_fetch_array($result);

	if(empty($user_id)){	
		$sql_1="SELECT id,vorname,nachname, id as tid, id as phonenumber FROM `userinfo` WHERE id = '$id'";
		$noPhone = false;
	}
	else{
		$sql_1="SELECT u.id as uid,vorname,nachname,t.id as tid,phonenumber FROM userinfo as u, telephonenumbers as t where u.id = t.user_id AND u.id = '$id'";
		$noPhone = true;
	}
$result_1 = mysqli_query($con,$sql_1);

echo "<div class='closeDiv' onclick='closeDiv(\"updateMask\")'>close</div>";
echo "<div id='insertMask'>";
echo "<table id='updateTable'>";
$i = 1;
while($row = mysqli_fetch_array($result_1)) {
	if($i==1){
		echo "<tr><td>Vorname:</td><td><input type='text' name='firstname' value='".$row['vorname']."'></td></tr>";
		echo "<tr><td>Nachname:</td><td><input type='text' name='lastname' value='".$row['nachname']."'></td></tr>";
		if($noPhone){
			echo "<tr id='row_".$row['tid']."' ><td>Telefonnummer:</td><td><input type='text' class='telefon' name='number_".$row['tid']."' value='".$row['phonenumber']."'><input type='button' onclick='deleteRowID(\"row_".$row['tid']."\")' value='Delete'></td></tr>";
		}
		echo "</tr>";
	}else{
		echo "<tr id='row_".$row['tid']."' ><td>Telefonnummer:</td><td><input type='text' class='telefon' name='number_".$row['tid']."' value='".$row['phonenumber']."'><input type='button' onclick='deleteRowID(\"row_".$row['tid']."\")' value='Delete'></td></tr>";
	}
		$i++;
	}
echo "<tr><td><div id='moreTelNr' onclick='addPhoneNumberRow(\"updateTable\")'><a href='#'>more Tel Nr.</a></div></td><td><button type='submit'  id='btnUpdate' name='update' value='$id'>Update</button></td></tr>";
echo "</table>";
echo "</div>";
echo "<div id ='messageBox' class='show-msgbox'></div></div>";
mysqli_close($con);
?>
</body>
</html>