<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title></title>
        <style type="text/css">
            <!--
            .style15 {color: #FFFFFF}
            -->
        </style>
        <script type="text/JavaScript">
            <!--
            function MM_preloadImages() { //v3.0
            var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
            var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
            if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
            }

            function MM_findObj(n, d) { //v4.01
            var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
            d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
            if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
            for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
            if(!x && d.getElementById) x=d.getElementById(n); return x;
            }

            function MM_swapImgRestore() { //v3.0
            var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
            }

            function MM_swapImage() { //v3.0
            var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
            if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
            }
            //-->
        </script>
    </head>
    <?php
    include("connection.php");
    if (isset($_REQUEST['login'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        session_start();
        $sql = $conn->query("select * from customer where username='$user' and password='$pass'");
        $count = $sql->num_rows;
        if ($count >= 1) {
            $row = $sql->fetch_assoc();
            $_SESSION['cuid'] = $row['cuid'];
            header("location:ticketres.php");
        } else {
            header("location:index.php");
            echo "Invalid UserName Or Password";
        }
    }
    ?>
    <body onload="MM_preloadImages('EN-hero-loyalty_v01.jpg', 'Img/EN-hero-loyalty_v01.jpg')">
        <?php
        include("header.php");
        ?>
        <table width="100%" height="379">
            <tr>
                <td width="155" height="447" rowspan="2"><img src="Img/left-srtip-link-img.png" width="30" height="120" /></td>
                <td width="315" height="228"><fieldset>
                        <div align="center">
                            <form id="form2" name="form2" method="post" action="#">
                                <table width="93%">
                                    <tr bgcolor="#006AD5">
                                        <td height="22" colspan="4"><div align="center"><span class="style15">Search Your Flight </span></div></td>
                                    </tr>
                                    <tr>
                                        <td width="24%" height="38">From</td>
                                        <td height="38" colspan="3">
                                            <div align="right">
                                                <input type="text" name="textfield" style="width:200px" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="47">To</td>
                                        <td height="47" colspan="3">
                                            <div align="right">
                                                <input type="text" name="textfield2" style="width:200px"/>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="40">Departing</td>
                                        <td height="40" colspan="3">
                                            <div align="right">
                                                <input type="text" name="textfield3"  style="width:200px" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="26" colspan="4">
                                            <div align="center">
                                                <input type="submit" name="Submit" value="Search"/>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </fieldset></td>
                <td width="531" rowspan="2">
                    <a href="Img/EN_hero_combining-loyalty_FINAL.jpg" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image11', '', 'Img/EN-hero-loyalty_v01.jpg', 1)">
                        <img src="Img/EN_hero_combining-loyalty_FINAL.jpg" name="Image11" width="531" height="365" border="0" id="Image11" />
                    </a>
                </td>
                <td width="71" rowspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td height="143"><fieldset >
                        <legend>LogIn</legend>
                        <form id="form1" name="form1" method="post" action="#">
                            <table width="100%" border="0">
                                <tr>
                                    <td width="54%" height="21">Username</td>
                                    <td width="46%"><input name="username" type="text" id="username"  style="width:150px"/></td>
                                </tr>
                                <tr>
                                    <td height="21">Password</td>
                                    <td><input name="password" type="password" id="password"   style="width:150px"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div align="right">
                                            <input name="login" type="submit" id="login" value="Login" />
                                            <a href="custreg.php"> NewUser</a>? </div></td></tr>
                            </table>
                        </form>
                    </fieldset></td>
            </tr>
        </table>
        <?php
        include("footer.php");
        ?>
    </body>
</html>
