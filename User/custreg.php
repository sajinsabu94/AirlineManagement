<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Untitled Document</title>
        <style type="text/css">
            <!--
            .style20 {
                font-size: 24px;
                color: #99FF33;
            }
            .style22 {color: #dd0000}
            -->
        </style>

        <script type="text/javascript">
            function val()
            {
                if (document.getElementById("name").value == "")
                {
                    alert("Please Enter Your Name");
                    document.getElementById("name").focus();
                    return false;
                }
                if ((isNaN(document.getElementById("age").value)))
                {
                    alert("Age has numeric only!");
                    return false;
                }


                if (!(isNaN(document.getElementById("add").value)))
                {
                    alert("Address has character only!");
                    return false;
                }



                if ((isNaN(document.getElementById("ph").value)))
                {
                    alert("Phone number has numeric only!");
                    return false;
                }

                var emailPat = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/
                var emailid = document.getElementById("em").value;
                var matchArray = emailid.match(emailPat);
                //alert(matchArray);
                if (matchArray == null)
                {
                    alert("Your email address is wrong. Please try again.");
                    document.getElementById("em").focus();
                    return false;
                }
                return true;
            }


        </script>
    </head>
    <?php
    include "header.php";
    include("connection.php");
    ?>
    <body>
        <?php
        if (isset($_REQUEST['submit'])) {
//echo "submit action"; exit;
            $cn = $_POST['name'] . " " . $_POST['namel'];
            $ca = $_POST['age'];
            $cg = $_POST['gen'];
            $cadd = $_POST['add'];
            $cp = $_POST['ph'];
            $ce = $_POST['em'];
            $cpass = $_POST['pid'];
            $cus = $_POST['us'];
            $pass = $_POST['ps'];
            $sql = $conn->query("insert into customer(cuname,cuage,cugender,cuaddress,cuphone,cuemail,cupassportid,username,password)values('$cn','$ca','$cg','$cadd','$cp','$ce','$cpass','$cus','$pass')");
            header("location:index.php");
        }
//header("location:reser.php");
        ?> 
        <form id="form1" name="form1" method="post" action="#">
            <table width="100%" height="auto"  >
                <tr>
                    <td height="480"><table width="100%" bgcolor="#FFFFFF">
                            <tr>
                                <td width="23%" height="247"><table width="100%" >
                                        <tr>
                                            <td width="84%" height="464">

                                            </td>
                                            <td width="16%">&nbsp;</td>
                                        </tr>
                                    </table></td>
                                <td width="66%">
                                    <div align="center">
                                        <p class="style20 style22">Customer Reservation	          </p>
                                        <table width="100%" border="1" bordercolor="#FFFFFF">
                                            <tr>
                                                <td width="48%"><span class="style22">First Name </span></td>
                                                <td width="52%">
                                                    <input name="name" type="text" id="name" style="width:200Px"/>                    </td>
                                            </tr>
                                            <tr>
                                                <td><span class="style22">Last Name </span></td>
                                                <td><input name="namel" type="text" id="namel"  style="width:200Px"/></td>
                                            </tr>
                                            <tr>
                                                <td><span class="style22">Age</span></td>
                                                <td><input name="age" type="text" id="age"  style="width:200Px"/></td>
                                            </tr>
                                            <tr>
                                                <td><span class="style22">Gender </span></td>
                                                <td><label>
                                                        <input name="gen" type="radio" value="radiobutton" />
                                                        Male
                                                        <input name="gen" type="radio" value="radiobutton" />
                                                        Female</label></td>
                                            </tr>
                                            <tr>
                                                <td><span class="style22">Address</span></td>
                                                <td><label>
                                                        <textarea name="add" id="add" style="width:200px"></textarea>
                                                    </label></td>
                                            </tr>
                                            <tr>
                                                <td><span class="style22">Phone Number </span></td>
                                                <td><input name="ph" type="text" id="ph" style="width:200Px"/></td>
                                            </tr>
                                            <tr>
                                                <td><span class="style22">Emailid</span></td>
                                                <td><input name="em" type="text" id="em"  style="width:200Px"/></td>
                                            </tr>
                                            <tr>
                                                <td><span class="style22">passpoert ID </span></td>
                                                <td><input name="pid" type="text" id="pid"  style="width:200Px"/></td>
                                            </tr>
                                            <tr>
                                                <td><span class="style22">UserName</span></td>
                                                <td><input name="us" type="text" id="us"  style="width:200Px"/></td>
                                            </tr>
                                            <tr>
                                                <td><span class="style22">Password</span></td>
                                                <td><input name="ps" type="password" id="ps"  style="width:200Px"/></td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div align="center">
                                        <input name="submit" type="submit" id="submit" value="Submit"  onclick="return val();"/>
<?php /* ?> <input type="submit" name="Submit2" value="Reset" /><?php */ ?>
                                    </div>

                                    <p>&nbsp;</p>



                                    &nbsp;</td>
                                <td width="11%"><table width="100%" >
                                        <tr>
                                            <td width="20%" height="462">&nbsp;</td>
                                            <td width="80%">&nbsp;</td>
                                        </tr>
                                    </table></td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>
        </form>
    </body>
<?php
include "footer.php"
?>
</html>
