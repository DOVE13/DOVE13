<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<title>Register</title>  
     
<div class="content">  
<fieldset style="border:2px solid blue;"> 
<center><fieldset style="border:2px solid Red;">  
<legend><font color="#111111"><b>สมัครสมาชิก</b></font></legend>   
<?php 
require('routeros_api.class.php');

$API = new RouterosAPI();

if ($API->connect('13.13.13.13', 'admin', '')) {  

$username = $_POST['txtUsername'];  
$password = $_POST['txtPassword'];  
$password_cf = $_POST['txtcfPassword'];  
$PNID = $_POST['txtID'];
$emailaddress = $_POST['txtName'];  
   
if($username=="" || $password==""  
  || $password_cf=="" || $PNID==""  
  || $emailaddress=="")  
{  
	echo "<script>alert('กรุณากรอก่ข้อมูลให้ครบค่ะ');</script>";
$empty_error="<center><font color=red>กรุณากรอกข้อมูลให้ถูกต้องค่ะ</font>";  
echo $empty_error;  
echo "  <a href='register.php'>  
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
echo "  <a href='register.php'>  
<br><br>
<input type='button'value='กลับ'style='background:Yellow;  
border:1px solid #000;color:Black;font-weight:bold;'/></a>  
</center>";  
exit();  
}  

if (strlen($PNID) < 13) {

echo "<script>alert('หมายเลขบัตรประชาชนของท่านไม่ถูกต้องค่ะ');</script>";
$confirm = "<center><font color=red>กรุณากรอกข้อมูลให้ถูกต้องค่ะ</font>";  
echo $confirm;  
echo "  <a href='register.php'>  
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
	echo "  <a href='register.php'>  
	<br><br>
	<input type='button'value='กลับ'style='background:Yellow;  
	border:1px solid #000;color:Black;font-weight:bold;'/></a>  
	</center>";  
exit(); 
	}
}

echo "<center><font color=red>สมัครสมาชิกเรียบร้อยแล้วค่ะ</font>";
echo "  <a href='register.php'>  
	<br><br>
	<input type='button'value='กลับ'style='background:Yellow;  
	border:1px solid #000;color:Black;font-weight:bold;'/></a>  
	</center>";  


$API->comm("/ip/hotspot/user/add",array(
      "name"     => $username,
      "password" => $password,
      "comment" => $PNID,
      "email" => $emailaddress));

   $API->disconnect();
}

?>  
</fieldset>  
</div>  