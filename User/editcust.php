<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Untitled Document</title>
        <script type="text/javascript" src="../../air12/calender/js/jquery-1.5.1.min.js"></script>
        <script type="text/javascript" src="../../air12/calender/js/jquery-ui-1.8.14.custom.min.js"></script>
        <link type="text/css" href="../../air12/calender/css/redmond/jquery-ui-1.8.14.custom.css" rel="stylesheet" />	
        <script type="text/javascript">
            $(function () {
                $('#age').datepicker({
                    dateFormat: 'yy-mm-dd',
                    inline: true
                });
            });
        </script>
        <script type="text/javascript">
        </script>
        <style type="text/css">
            <!--
            .style20 {
                font-size: 24px;
                color: #99FF33;
            }
            .style22 {color: #666666}
            .style23 {color: #999999}
            -->
        </style>
    </head>
    <?php
    include("connection.php");
    session_start();
    if (isset($_GET['idd']))
        $edid = $_GET['idd'];
    if (isset($_REQUEST['Update'])) {
        $bookmid = $_SESSION['bookmid'];
        $cla = $_POST['as'];
        $no1 = $_POST['cname'];
        $no2 = $_POST['cage'];
        $no3 = $_POST['cg'];
        $no4 = $_POST['cs'];
        $no5 = $_POST['cp'];
        $am = $_POST['as'];
        $q = "select * from class where claid='$am'";
//echo $q;exit;
        $sqlq = $conn->query($q);
        $row = $sqlq->fetch_assoc();
        $amt = $row['clafare'];
        $mysql = $conn->query("update bookingdetail set cuname='$no1',cuage='$no2',cugender='$no3',claid='$cla',passportid='$no5',tamt='$amt' where bdid=$edid");
        header("location:fulldetails.php");
    }
    include "uheader.php";
    ?>
    <body>
        <?php
        if (isset($_SESSION['tts']))
            $tts = $_SESSION['tts'];
        if (isset($_SESSION['bookmid']))
            $bookmid = $_SESSION['bookmid'];
        $sqle = $conn->query("select * from bookingdetail where bdid='$edid'");
        $rowe = $sqle->fetch_assoc();
        ?>
        <form id="form1" name="form1" method="post" action="#">
            <table width="100%" height="auto" >
                <tr>
                    <td height="480">

                        <table width="100%" bgcolor="#FFFFFF">
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
                                        <table width="100%" border="1" bordercolor="#FFFFFF" >
                                            <tr>
                                                <td width="30%">&nbsp;</td>
                                                <td width="21%">&nbsp;</td>
                                                <td width="28%">&nbsp;</td>
                                                <td width="21%">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td valign="top">&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td><table width="100%" border="1" bordercolor="#FFFFFF" >
                                                        <?php /* ?><?php echo $ts=$_COOKIE['ts']; exit;?><?php */ ?>

                                                        <tr>
                                                            <td><div id="block" >
                                                                    <fieldset>
                                                                        <table width="100%">
                                                                            <tr>
                                                                                <td width="8%" height="26"><span class="style22">Name</span></td>
                                                                                <td width="22%"><input name="cname" type="text" id="cname" value="<?php echo $rowe['cuname']; ?>" /></td>
                                                                                <td width="13%"><span class="style22">Gender</span></td>
                                                                                <td width="22%"><input name="cg" type="radio" value="Male" />
                                                                                    Male
                                                                                    <input name="cg" type="radio" value="Female" />
                                                                                    Female</td>
                                                                                <td width="13%"><span class="style23">PassportID</span></td>
                                                                                <td width="22%"><input name="cp" type="text" id="cp" value="<?php echo $rowe['passportid']; ?>"/></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="28"><span class="style22">Age</span></td>
                                                                                <td><input name="cage" type="text" id="cage" value="<?php echo $rowe['cuage']; ?>" /></td>
                                                                                <td><span class="style22">SeatNo</span></td>
                                                                                <td><input name="cs" type="text" id="cs"  disabled="disabled" value="<?php echo $rowe['seatno']; ?>"/></td>
                                                                                <td><span class="style23">Class</span></td>
                                                                                <td><select name="as" style="width:150px" >
                                                                                        <?php
                                                                                        $abc = $conn->query("select  * from class");
                                                                                        while ($row = $abc->fetch_assoc()) {
                                                                                            ?>
                                                                                            <option value="<?php echo $row['claid']; ?>"> <?php echo $row['claname']; ?>
                                                                                            </option>
                                                                                            <?php
                                                                                        }
                                                                                        ?>
                                                                                    </select></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="37" colspan="6"><p align="center">
                                                                                        <input name="Update" type="submit" id="Update" style=" width:100px" value="Update" />
                                                                                    </p>                                </td>
                                                                            </tr>
                                                                        </table>

                                                                    </fieldset>
                                                                </div></td>
                                                        </tr>

                                                    </table></td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td valign="top">&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                            <!--<script type="text/javascript">
                            function dispblock()
                            {
                            var ts=document.getElementById('ts').value;
                            alert (ts);
                            document.cookie="ts="+ts;
                            location.reload;
                            }
                            </script>-->
                                            <?php /* ?><?php echo $ts=$_COOKIE['ts']; exit;?><?php */ ?>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </table>
                                        <p class="style20"></td>
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
