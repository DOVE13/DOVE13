<fieldset style="border:2px solid blue;"> 
<fieldset style="border:2px solid Red;"> 
<center>
<?php

require('routeros_api.class.php');

$API = new RouterosAPI();

$API->debug = false;

if ($API->connect('13.13.13.13', 'admin', '')) {

  $API->write('/ip/hotspot/user/print');
  
   $READ = $API->read(false);
   $ARRAY = $API->parseResponse($READ);
  
   foreach ($ARRAY as $key=>$value ) {
    
    if ($key<1) continue;
       }  

  $a= $API->comm('/ip/hotspot/user/print');
    foreach ($a as $key => $value) {
      if ($key < 1) continue;
      echo"<tr>";
      echo"<td>";
      echo "<br>";
      echo "<B>User</B>:".$value['name']."&nbsp";
      echo "</td>";
      echo"<td>";
      echo "<B>Password</B>:".$value['password']."&nbsp";
      echo "</td>";
      echo "<td>";
      echo "<B>Email:</B>".$value['email']."&nbsp";
      echo "</td>";
      echo "<td>";
      echo "<a href=\"EditUser.php?id=".$value['.id']."\">  
      <input type='button'value='แก้ไข' style='background:Red;  
      border:1px solid #000;color:#ffffff;font-weight:bold;'></a>";
      echo "<a href=\"Remove.php?name=".$value['.id']."\">  
      <input type='button'value='ลบ' style='background:Blue;  
      border:1px solid #000;color:#ffffff;font-weight:bold;'></a>";
      echo "</td>";
      echo "</tr>";
    } 
    echo"</table>";

   echo "  <a href='register.php'>  
  <br><br>
  <input type='button'value='กลับ'style='background:Yellow;  
  border:1px solid #000;color:Black;font-weight:bold;'/></a>  
  </center>";  

   $API->disconnect();

}

?>
