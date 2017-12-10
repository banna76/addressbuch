<?php 
include('conn.php');
$output="";
	if($_POST['mode'] == "insert")
	{
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$numbers=$_POST['numbers'];
		$result = false;
		$result2 = false;
		$result3 = false;
		if($fname != "" && $lname != "" ){		
			$sql="insert into userinfo(`vorname`, `nachname`) values('$fname','$lname')";
			$result = mysqli_query($con,$sql);
		}
		if($result){
			$sql2="SELECT id FROM userinfo where vorname='$fname' AND nachname='$lname'";
			$result2 = mysqli_query($con,$sql2);
			while($row = mysqli_fetch_array($result2)) {
				if(is_numeric($row[0])){
					if($numbers[0] != null){
						foreach ($numbers as $value) {
							if($value != "")
							{
								$sql3="insert into telephonenumbers(user_id,phonenumber) values('$row[0]','$value')";
								$result3 = mysqli_query($con,$sql3);
							}
						}
						if($result3){
							$output ="$fname $lname has been inserted successfullly with Phone numbers!";
						}else{
							$output = $result3;
						}
					}else{
						$output ="$fname $lname has been inserted successfullly with out Phone numbers!";
					}
				}
			}
		}
	}

	if($_POST['mode'] == "update")
	{
		$id=$_POST['id'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$numbers=$_POST['numbers'];
		$result = false;
		$phoneids =[];
		if($id != "" && $fname != "" && $lname != "" ){		
			$sql = "UPDATE userinfo SET vorname='$fname',nachname='$lname'  WHERE id ='$id' ";
			$result = mysqli_query($con,$sql);
		}
		if($result){
			foreach ($numbers as $key=>$value) {
				if($value != ""){
					$tid = str_replace('number_', '', $key);
					if(is_numeric($key)){
						$sql3="insert into telephonenumbers(user_id,phonenumber) values('$id','$value')";
					}else{
						$sql3="UPDATE telephonenumbers SET phonenumber='$value' WHERE id='$tid'";
					}

					$result3 = mysqli_query($con,$sql3);
				}
			}
					if($result3){
						$output ="$fname $lname has been updated Successfullly!";
					}else{
						$output = $result3;
					}
		}
		//var_dump($id,$fname,$lname,$numbers);
	}

	if($_POST['mode']  == "delete")
	{
		$id=$_POST['id'];
		$result = false;
		$result2 = false;		
		//
		if($id != ""){
			$sql = "delete from userinfo WHERE id ='$id' ";
			$result = mysqli_query($con,$sql);
			
			if($result){
				$sql2 = "delete from telephonenumbers WHERE user_id='$id'";
				$result2 = mysqli_query($con,$sql2);
			}

			if($result || $result2){
			   $output ="$id has been deleted Successfullly!";
			}
		}
	}
	
	if($_POST['mode']  == "deleteNum")
	{
		$id=$_POST['id'];
		$sql2 = "delete from telephonenumbers WHERE id='$id'";
		$result2 = mysqli_query($con,$sql2);
		if($result2){
		   $output ="The Phonenumber has been deleted Successfullly!";
		}
	}
	
echo $output;	
mysqli_close($con);
?>