<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
session_start();
 $a=$_SESSION['cuid'];
include("connection.php");
$sql=$conn->query("select * from customer where cuid='$a'");
$row1=$sql->fetch_assoc();
if(isset($_POST['save']))
{
$new=$_POST['new'];
$re=$_POST['confirm'];
if($new==$re)
{
$m="update customer set password='$re' where cuid='$a'";
$conn->query($m);
}
}
include "uheader.php";
?>
<body>
<form action="#" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="8%">&nbsp;</td>
    <td width="46%">&nbsp;</td>
    <td width="46%">&nbsp;</td>
  </tr>
  <tr>
    <td height="33">&nbsp;</td>
    <td>Old Password </td>
    <td><label>
      <input type="text" name="old" value="<?php echo $row1['password'];?>" disabled="disabled"/>
    </label></td>
  </tr>
  <tr>
    <td height="33">&nbsp;</td>
    <td>New Password </td>
    <td><label>
      <input type="text" name="new" />
    </label></td>
  </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td>Confirm Password </td>
    <td><label>
      <input type="text" name="confirm" />
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><label>
      <input name="save" type="submit" id="save" value="SAVE" />
    </label></td>
  </tr>
</table>
</form>
<?php
include "footer.php";
?>
</body>
</html>
