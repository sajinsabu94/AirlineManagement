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
                if (document.getElementById("cname").value == "")
                {
                    alert("Please Enter Your Name");
                    document.getElementById("cname").focus();
                    return false;
                }
                if ((isNaN(document.getElementById("cage").value)))
                {
                    alert("Age has numeric only!");
                    document.getElementById("cage").focus();
                    return false;
                }
        </script>

        <style type="text/css">
            <!--
            .style19 {color: #99FF33}
            .style20 {
                font-size: 24px;
                color: #99FF33;
            }
            -->
        </style>
    </head>
    <?php
    ob_start();
    include("connection.php");
    session_start();    
    include "uheader.php";
    ?>
    <body>
        <?php
        $sno = '';
        $flag = '';
        $canid = '';
        if (isset($_SESSION['tts']))
            $tts = $_SESSION['tts'];
        if (isset($_GET['id'])) {
            $fid = $_GET['id'];
            $q1 = "select * from flight where fliid='$fid'";
//echo $q1; exit;
            $sqlq1 = $conn->query($q1);
            $row1 = $sqlq1->fetch_assoc();
            $tts = $row1['totseat'];
            $ls = $row1['lstseat'];
//echo $tts."-".$ls; exit;
            if ($ls == $tts) {
                $q2 = "select * from cancel where fliid='$fid'";
                //echo $q1; exit;
                $sqlq2 = $conn->query($q2);
                $cn = $sqlq2->num_rows;
                if ($cn > 0) {
                    $row2 = $sqlq2->fetch_assoc();
                    $sno = $row2['seatno'];
                    $canid = $row2['id'];
                    $flag = 1;
                } else {
                    echo "no seats available";
                    exit;
                }
            } else {
                $sno = $ls + 1;
            }
        }
        if (isset($_SESSION['bookmid']))
            $bookmid = $_SESSION['bookmid'];
        if (isset($_REQUEST['Add'])) {
            $cla = $_POST['as'];
            $no1 = $_POST['cname'];
            $no2 = $_POST['cage'];
            $no3 = $_POST['cg'];
            $no4 = $_POST['cs'];
            $no5 = $_POST['cp'];
            $fid = $_POST['fid'];
            $am = $_POST['as'];
            $q = "select * from class where claid='$am'";
            $sqlq = $conn->query($q);
            $row = $sqlq->fetch_assoc();
            $amt = $row['clafare'];
            $mysql = $conn->query("insert into bookingdetail(bookmid,cuname,cuage,cugender,claid,seatno,passportid,tamt)VALUES('$bookmid','$no1','$no2','$no3','$cla','$no4','$no5','$amt');");
            $flag = $_POST['flag'];
            if ($flag != 1) {
                $conn->query("update flight set lstseat='$no4' where fliid='$fid'");
            } else {
                $canid = $_POST['canid'];
                $conn->query("delete from cancel where id='$canid'");
            }
            header("location:fulldetails.php?id=$fid");
        }
        ?>
        <form id="form1" name="form1" method="post" action="#">
            <table width="100%" height="auto"  >
                <tr>
                    <td height="480">

                        <table width="100%" bgcolor="#FFFFFF">
                            <tr>
                                <td width="23%" height="247">
                                    <table width="100%" >
                                        <tr>
                                            <td width="84%" height="464">

                                            </td>
                                            <td width="16%">&nbsp;</td>
                                        </tr>
                                    </table>                                            
                                </td>
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
                                                <td>
                                                    <table width="100%" border="1" bordercolor="#FFFFFF" >
                                                        <?php /* ?><?php echo $ts=$_COOKIE['ts']; exit;?><?php */ ?>

                                                        <tr>
                                                            <td><div id="block" >

                                                                    <fieldset>
                                                                        <table width="100%" >
                                                                            <tr>
                                                                                <td width="8%" height="45">Name</td>
                                                                                <td width="22%"><input name="cname" type="text" id="cname" /></td>
                                                                                <td width="13%">Gender</td>
                                                                                <td width="22%"><input name="cg" type="radio" value="Male" />
                                                                                    Male
                                                                                    <input name="cg" type="radio" value="Female" />
                                                                                    Female</td>
                                                                                <td width="13%">PassportID</td>
                                                                                <td width="22%"><input name="cp" type="text" id="cp" /></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="46">Age</td>
                                                                                <td><input name="cage" type="text" id="cage" /></td>
                                                                                <td>SeatNo</td>
                                                                                <td><input name="cs" type="hidden" id="cs" value="<?php echo $sno; ?>"/>
                                                                                    <input type="hidden" name="flag" value="<?php echo $flag; ?>"/>
                                                                                    <input type="hidden" name="canid" value="<?php echo $canid; ?>"/>
                                                                                    <input name="cs1" type="text" id="cs" value="<?php echo $sno; ?>" disabled="disabled"/></td>
                                                                                <td>Class</td>
                                                                                <td><select name="as" style="width:150px" >
                                                                                        <?php
                                                                                        $abc = $conn->query("select  * from class");
                                                                                        while ($row = $abc->fetch_assoc()) {
                                                                                            ?>
                                                                                            <option value="<?php echo $row['claid']; ?>"> <?php echo $row['claname']; ?></option>
                                                                                            <?php
                                                                                        }
                                                                                        ?>
                                                                                    </select></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="49" colspan="6"><div align="center">
                                                                                        <input type="hidden" name="fid" value="<?php echo $fid; ?>"/>
                                                                                        <input name="Add" type="submit" id="Add" style=" width:100px" value="Add" />                                
                                                                                    </div></td>
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
                                            </form>
                                            </body>
                                            <?php
                                            include "footer.php"
                                            ?>
                                            </html>
