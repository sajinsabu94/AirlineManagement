<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Untitled Document</title>
        <script type="text/javascript" src="../calender/js/jquery-1.5.1.min.js"></script>
        <script type="text/javascript" src="../calender/js/jquery-ui-1.8.14.custom.min.js"></script>
        <link type="text/css" href="../calender/css/redmond/jquery-ui-1.8.14.custom.css" rel="stylesheet" />	
        <script type="text/javascript">
            $(function () {
                $('#age').datepicker({
                    dateFormat: 'yy-mm-dd',
                    inline: true
                });
            });
        </script>


        <script type="text/javascript">
            function val()
            {
                if (document.getElementById("a1").value == "")
                {
                    alert("Please Enter Your Name");
                    document.getElementById("a1").focus();
                    return false;
                }

                if (!(isNaN(document.getElementById("add").value)))
                {
                    alert("Address has character only!");
                    document.getElementById("add").focus();
                    return false;
                }
                if (document.getElementById("ph").value == "")
                {
                    alert("Please Enter Your phone Number");
                    document.getElementById("ph").focus();
                    return false;
                }

                if ((isNaN(document.getElementById("ph").value)))
                {
                    alert("Phone number has numeric only!");
                    document.getElementById("ph").focus();
                    return false;
                }

                var emailPat = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/
                var emailid = document.getElementById("h1").value;
                var matchArray = emailid.match(emailPat);
                //alert(matchArray);
                if (matchArray == null)
                {
                    alert("Your email address is wrong. Please try again.");
                    document.getElementById("h1").focus();
                    return false;
                }
                if ((isNaN(document.getElementById("ph").value)) > 5)
                {
                    alert("Mobile no greater than 5!");
                    document.getElementById("ph").focus();
                    return false;
                }
                return true;
            }


        </script>


        <style type="text/css">
            <!--
            .style20 {
                font-size: 24px;
                color: #99FF33;
            }
            .style22 {color: #666666}
            -->
        </style>
    </head>
    <?php
    session_start();
    ?>
    <body>
        <?php
        $Fname='';
        $sidd='';
        $didd='';
        $doj='';
        $a='';
        include("connection.php");
        if (isset($_REQUEST['id'])) {
            $a = $_REQUEST['id'];
            //echo $a; exit;
            $sql = $conn->query("select * from flight where fliid='$a';");
            $row = $sql->fetch_assoc();
            $Fname = $row['fliname'];
        }
        if (isset($_REQUEST['aid'])) {
            $aa = $_REQUEST['aid'];
            $sql1 = $conn->query("select * from allocation where allid='$aa';");
            $row1 = $sql1->fetch_assoc();
            $allo = $row1['allid'];
            $doj = $row1['startdate'];
            $roidd = $row1['roid'];
            $sql2 = $conn->query("select * from route ro,airport air where ro.roid='$roidd' and air.airid=ro.sid;");
            $row2 = $sql2->fetch_assoc();
            $sidd = $row2['airname'];
            $sql3 = $conn->query("select * from route ro,airport air where ro.roid='$roidd' and air.airid=ro.did;");
            $row3 = $sql3->fetch_assoc();
            $didd = $row3['airname'];
        }
        if (isset($_SESSION['cuid'])) {
            $cid = $_SESSION['cuid'];
            $sql4 = $conn->query("select * from customer where cuid='$cid';");
            $row4 = $sql4->fetch_assoc();
            $cuname = $row4['cuname'];
            $cuadd = $row4['cuaddress'];
            $cuph = $row4['cuphone'];
        }
        if (isset($_REQUEST['Next'])) {
            $no1 = $_POST['name'];
            $no2 = $_POST['add'];
            $no3 = $_POST['ph'];
            $no4 = $_POST['doj'];
            $no5 = $_POST['tts'];
            $flid = $_POST['flid'];
            include("connection.php");
            $mysql = $conn->query("insert into  boookingmaster(cuid,allid,cuname,address,phone,totseat,dofj)values('$cid','$allo','$no1','$no2','$no3','$no5','$no4');");
            $mysqli = $conn->query("select * from boookingmaster where cuid='$cid' and allid='$allo' and cuname='$no1'");
            $row5 = $mysqli->fetch_assoc();
            $bookid = $row5['bookmid'];
            if (isset($_POST['tts']))
                $tts = $_POST['tts'];
            $_SESSION['tts'] = $tts;
// echo $_SESSION['tts']; exit;
            $_SESSION['bookmid'] = $bookid;
            header("location:addcust.php?id=$a");
        }
        include "uheader.php";
        ?>
        <form id="form1" name="form1" method="post" action="#">
            <table width="100%" height="auto"  >
                <tr>
                    <td height="480">

                        <table width="100%" bgcolor="#FFFFFF">
                            <tr>
                                <td width="15%" height="247"><table width="100%" >
                                        <tr>
                                            <td width="84%" height="464">

                                            </td>
                                            <td width="16%">&nbsp;</td>
                                        </tr>
                                    </table></td>
                                <td width="70%">
                                    <div align="center">
                                        <fieldset>
                                            <div align="left">
                                                <legend><em><strong>Enter Your Details</strong> </em></legend>
                                            </div>
                                            <table width="100%" border="1" bordercolor="#FFFFFF" >
                                                <tr>
                                                    <td width="30%"><span class="style22">Name</span></td>
                                                    <td width="21%"><input name="name" type="text"   id="a1" /></td>
                                                    <td width="28%"><span class="style22">Flight Name </span></td>
                                                    <td width="21%"><input type="text" name="textfield9"  value="<?php echo $Fname; ?>"  disabled="disabled"/></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="style22">Address</span></td>
                                                    <td><label>
                                                            <textarea name="add" id="add" style="width:150px"></textarea>
                                                        </label></td>
                                                    <td><span class="style22">From</span></td>
                                                    <td><input type="text" name="textfield10"  value="<?php echo $sidd; ?>" disabled="disabled"/></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="style22">Phone Number </span></td>
                                                    <td><input name="ph" type="text"  id="ph" /></td>
                                                    <td><span class="style22">To</span></td>
                                                    <td><input type="text" name="textfield112" value="<?php echo $didd; ?>" disabled="disabled"/></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="style22">Total Seat</span></td>
                                                    <td><input type="text" name="tts" id="ts" onchange="dispblock();" /></td>
                                                    <td><span class="style22">DOJ </span></td>
                                                    <td><input type="text" name="doj"  value=" <?php echo $doj; ?>" disabled="disabled"/></td>
                                                </tr>
                                                <input type="hidden" name="flid" value="<?php echo $a; ?>" />
                                                <tr>
                                                    <td colspan="4"><div align="center">
                                                            <input name="Next" type="submit" id="Next"  style="width:130px" value="Next"  onclick="return val();"/>
                                                        </div></td>
                                                </tr>
                                            </table>
                                        </fieldset>  
                                        <p class="style20"></td>
                                            <td width="15%"><table width="100%" >
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


                                            &nbsp;</td>
                                            <td width="11%">&nbsp;</td>
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
