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
                    return false;
                }
        </script>
        <style type="text/css">
            <!--
            .style20 {
                font-size: 24px;
                color: #99FF33;
            }
            .style21 {
                font-size: 18px;
                font-style: italic;
                font-weight: bold;
            }
            -->
        </style>
    </head>
    <?php
    include "uheader.php";
    include ('connection.php');
    session_start();
    ?>
    <body>
        <?php
        if (isset($_SESSION['tts']))
            $tts = $_SESSION['tts'];
        if (isset($_SESSION['bookmid']))
            $bookmid = $_SESSION['bookmid'];
        
        if ($tts == 0) {
            header("location:fulldetails.php");
        } else {
            if (isset($_REQUEST['Next'])) {
                $cla = $_POST['as'];
                $no1 = $_POST['cname'];
                $no2 = $_POST['cage'];
                $no3 = $_POST['cg'];
                $no4 = $_POST['cs'];
                $no5 = $_POST['cp'];

                $am = $_POST['as'];
                $q = "select * from class where claid='$am'";
                $sqlq = $conn->query($q);
                $row = $sqlq->fetch_assoc();
                $amt = $row['clafare'];
                $mysql = $conn->query("insert into bookingdetail(bookmid,cuname,cuage,cugender,claid,seatno,passportid,tamt)values('$bookmid','$no1','$no2','$no3','$cla','$no4','$no5','$amt');");
                $_SESSION['tts'] = $_SESSION['tts'] - 1;
                header("location:adddetail.php");
            }
        }
        ?>
        <form id="form1" name="form1" method="post" action="#">
            <table width="100%" height="auto"  >
                <tr>
                    <td height="480">

                        <table width="100%" bgcolor="#FFFFFF">
                            <tr>
                                <td width="28%" height="247"><table width="100%" >
                                        <tr>
                                            <td width="84%" height="464">

                                            </td>
                                            <td width="16%">&nbsp;</td>
                                        </tr>
                                    </table></td>
                                <td width="61%">
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
                                                    <fieldset><legend class="style21">Enter The Following Details
                                                        </legend>
                                                        <table width="100%" border="1" bordercolor="#FFFFFF" >
                                                            <?php /* ?><?php echo $ts=$_COOKIE['ts']; exit;?><?php */ ?>

                                                            <tr>
                                                                <td><div id="block" >
                                                                        <table width="100%" >
                                                                            <tr>
                                                                                <td width="6%" height="46">Name</td>
                                                                                <td width="23%"><input name="cname" type="text" id="cname" /></td>
                                                                                <td width="9%">Gender</td>
                                                                                <td><input name="cg" type="radio" value="Male" />Male
                                                                                    <input name="cg" type="radio" value="Female" />
                                                                                    Female</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="61">Age</td>
                                                                                <td><input name="cage" type="text" id="cage" /></td>
                                                                                <td>SeatNo.</td>
                                                                                <td><input name="cs" type="text" id="cs" /></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="58"><p align="center">PassportID</p>                                </td>
                                                                                <td height="58"><input name="cp" type="text" id="cp" /></td>
                                                                                <td height="58">Class</td>
                                                                                <td height="58"><select name="as" style="width:150px" >
                                                                                        <?php
                                                                                        include("connection.php");
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
                                                                                <td height="58" colspan="4"><div align="center">
                                                                                        <input name="Next" type="submit" id="Next" style=" width:100px" value="Next" />
                                                                                    </div></td>
                                                                            </tr>


                                                                            <tr>
                                                                                <td>					</td>
                                                                            </tr>
                                                                        </table>

                                                                        </fieldset>



                                                                    </div></td>
                                                            </tr>
                                                        </table>
                                                        <tr>
                                                            <td height="41" valign="top">&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
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
