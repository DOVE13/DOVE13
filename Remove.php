<fieldset style="border:2px solid blue;"> 
<fieldset style="border:2px solid Red;"> 
<center>
<?php

require('routeros_api.class.php');

$API = new RouterosAPI();

$API->debug = false;

if ($API->connect('13.13.13.13', 'admin', '')) {

	$name1 = $_GET ['name'];
	$API->write('/ip/hotspot/user/remove',false);
	$API->write("=.id=" . $name1, true);

   $READ = $API->read(false);
   $ARRAY = $API->parseResponse($READ);

   echo "<center><font color=red>ลบข้อมูลเสร็จแล้วค่ะ</font>";
echo "  <a href='Edit.php'>  
  <br><br>
  <input type='button'value='กลับ'style='background:Yellow;  
  border:1px solid #000;color:Black;font-weight:bold;'/></a>";

   $API->disconnect();

}

?>
