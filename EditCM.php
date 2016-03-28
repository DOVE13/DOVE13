
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
<title>Register</title>  
<link type="text/css" rel="stylesheet" href="style.css">  

<div class="content">  
	<fieldset style="border:2px solid Blue;">  
	<fieldset style="border:2px solid red;">  
		<legend><font color="#12768E"><b></b></font></legend>  
		
		<?php 
		require('routeros_api.class.php');

		$API = new RouterosAPI();
		$API->debug = false;

		if ($API->connect('13.13.13.13', 'admin', '')) {  
			$id = $_POST['id'];
			$username = $_POST['username'];  
			$password = $_POST['password'];  
			$password_cf = $_POST['password_cf'];  
			$emailaddress = $_POST['emailaddress']; 
			$PNID = $_POST['citizenid']; 
			
			if($username=="" || $password==""  
				|| $password_cf=="" || $emailaddress==""|| $PNID=="")  
			{  
				echo "<script>alert('กรุณากรอก่ข้อมูลให้ครบค่ะ');</script>";
$empty_error="<center><font color=red>กรุณากรอกข้อมูลให้ถูกต้องค่ะ</font>";  
echo $empty_error;  
echo "  <a href='Edit.php'>  
<br><br>
<input type='button'value='กลับ'style='background:Yellow;  
border:1px solid #000;color:Black;font-weight:bold;'/></a>  
</center>";  
exit();    
		} 

		else if($password != $password_cf)  
{  
	echo "<script>alert('รหัสผ่านของท่านไม่ตรงกันค่ะ');</script>";
$confirm = "<center><font color=red>กรุณากรอกข้อมูลให้ถูกต้องค่ะ</font>";  
echo $confirm;  
echo "  <a href='Edit.php'>  
<br><br>
<input type='button'value='กลับ'style='background:Yellow;  
border:1px solid #000;color:Black;font-weight:bold;'/></a>  
</center>";  
exit();   
	}  
	else{
		if (!filter_var($emailaddress, FILTER_VALIDATE_EMAIL)) {
		echo "<script>alert('อีเมล์ของท่านไม่ถูกต้องค่ะ');</script>";
		$confirm = "<center><font color=red>กรุณากรอกข้อมูลให้ถูกต้องค่ะ</font>";  
	echo $confirm;  
	echo "  <a href='Edit.php'>  
	<br><br>
	<input type='button'value='กลับ'style='background:Yellow;  
	border:1px solid #000;color:Black;font-weight:bold;'/></a>  
	</center>";  
exit();  
	}
	else{
		if (strlen($PNID) < 13) {

echo "<script>alert('หมายเลขบัตรประชาชนของท่านไม่ถูกต้องค่ะ');</script>";
$confirm = "<center><font color=red>กรุณากรอกข้อมูลให้ถูกต้องค่ะ</font>";  
echo $confirm;  
echo "  <a href='Edit.php'>  
<br><br>
<input type='button'value='กลับ'style='background:Yellow;  
border:1px solid #000;color:Black;font-weight:bold;'/></a>  
</center>";

exit();
	}
}
}

$API->write('/ip/hotspot/user/set',false);
$API->write('=.id='.$id,false);
$API->write('=name='.$username,false);
$API->write('=password='.$password,false);
$API->write('=email='.$emailaddress,false);
$API->write('=comment='.$PNID);

}
$a= $API->comm('/ip/hotspot/user/print');
foreach ($a as $key => $value) {
	if ($key < 1) continue;
	$API->disconnect();

	echo "</td>";
	echo "</tr>";
}	

echo "<center><font color=red>แก้ไขเสร็จสิ้น</font>";
echo "  <a href='Edit.php'>  
	<br><br>
	<input type='button'value='กลับ'style='background:Yellow;  
	border:1px solid #000;color:Black;font-weight:bold;'/></a>  
	</center>"; 

?> 
</fieldset>  
</div>  