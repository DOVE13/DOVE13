<fieldset style="border:2px solid blue;"> 
<fieldset style="border:2px solid Red;"> 
<center>
<?php

require('routeros_api.class.php');

$API = new RouterosAPI();

$API->debug = false;

if ($API->connect('13.13.13.13', 'admin', '')) {

  $id = $_GET ['id'];
			$API -> write('/ip/hotspot/user/print',false);
			$API -> write("?.id=".$id,true);

			$READ = $API->read(false);
			$ARRAY = $API->parseResponse($READ);
			echo "<form name=\"myform\" method=\"post\" action=\"EditCM.php\">";
			echo 		"<div id=\"register\"> ";
			echo		"<div>";
			echo 		"<input name=\"id\" id=\"id\" type=\"hidden\" value=\"".$id."\" >";
			echo 		"</div>";
			echo		"<div>";
			echo		"<div>";
			echo		"<label for=\"username\">Username:</label>";
			echo 		"<input name=\"username\" id=\"user\" type=\"text\" value=\"".$ARRAY[0]['name']."\">";
			echo 		"</div>";
			echo		"<div>";
			echo 		"<label for=\"password\">Password:</label>";
			echo 		"<input name=\"password\" id=\"pass\" type=\"password\" value=\"".$ARRAY[0]['password']."\">";
			echo 		"</div>";
			echo		"<div>";
			echo 		"<label for=\"password_cf\">Comfirm Password:</label> ";
			echo 		"<input name=\"password_cf\" id=\"pcf\" type=\"password\">  ";
			echo 		"</div>";
			echo		"<div>";
			echo 		"<label for=\"PnID\">รหัสบัตรประชาชน :</label>   ";
			echo 		"<input name=\"citizenid\" id=\"citizenid\" type=\"text\"value=\"".$ARRAY[0]['comment']."\">";
			echo 		"</div>";
			echo		"<div>";
			echo 		"<label for=\"email\">Email:</label> ";
			echo 		"<input name=\"emailaddress\" id=\"email\" type=\"text\"value=\"".$ARRAY[0]['email']."\">";
			echo 		"</div>";
		}
	{
			echo		"<div>";
			echo "<input id=\"submit\" value=\"เสร็จสิ้น\" name=\"submit\"  
			style=\"margin-left:300px;background:Yellow;border:1px solid #000;  
			color:Black;font-weight:bold;\" type=\"submit\">"; 
			
			echo "<div>";
}
		$API->disconnect();

		?> 
	</fieldset>  
</div>  