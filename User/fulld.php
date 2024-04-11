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
    include "uheader.php";
    include("connection.php");
    session_start();
    if (isset($_REQUEST['Add'])) {
        header("location:addcust.php");
    }
    ?>
    <body>
        <?php
        if (isset($_REQUEST['id'])) {
            $a = $_REQUEST['id'];
            $conn->query("delete from bookingdetail where bdid='$a'");
//header("location:adminclass.php");
        }
        $dt = date("y-m-d");
        if (isset($_SESSION['bookmid']))
            $bookmid = $_SESSION['bookmid'];
        if (isset($_REQUEST['Next'])) {
            $su = $_SESSION['sum'];
            $cu = $_SESSION['cuid'];
            $mysql = $conn->query("insert into payment(cuid,bookmid,paydate,Amount)values('$cu','$bookmid','$dt','$su')");
            $mysq = $conn->query("update boookingmaster set totamt='$su',status='1'");
            header("location:index.php");
        }
        if (isset($_SESSION['bookmid']))
            $bookmid = $_SESSION['bookmid'];
        $sum = 0;
        $ad = 0;
        $cl = 0;
        $q = "select * from customer cu,boookingmaster bm where cu.cuid=bm.cuid and bookmid='$bookmid'";
        $sqlq = $conn->query($q);
        $row = $sqlq->fetch_assoc();
        $cuname = $row['cuname'];
        ?>
        <form id="form1" name="form1" method="post" action="#">
            <table width="100%" height="auto" >
                <tr>
                    <td height="480">

                        <table width="100%" bgcolor="#FFFFFF">
                            <tr>
                                <td width="18%" height="247"><table width="95%" >
                                        <tr>
                                            <td width="84%" height="464">

                                            </td>
                                            <td width="16%">&nbsp;</td>
                                        </tr>
                                    </table></td>
                                <td width="66%">
                                    <div align="center">
                                        <fieldset>


                                            <table width="709" >
                                                <tr>
                                                    <td width="102" height="30">Customer Name </td>
                                                    <td width="182"><label>
                                                            <input type="text" name="textfield"   value="<?php echo $cuname ?>" disabled="disabled"/>
                                                        </label></td>
                                                    <td colspan="3">&nbsp;</td>
                                                    <td width="232">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="29" colspan="6">

                                                        <fieldset>
                                                            <table width="578"  align="center">
                                                                <tr>
                                                                    <th width="84" scope="col"><div align="left">Name </div></th>
                                                                    <th width="43" scope="col"><div align="left">Age</div></th>
                                                                    <th width="66" scope="col"><div align="left">Gender </div></th>
                                                                    <th width="94" scope="col"><div align="left">Class Name </div></th>
                                                                    <th width="85" scope="col"><div align="left">Seat No.</div></th>
                                                                    <th width="97" scope="col"><div align="left">Passport Id</div></th>
                                                                    <th width="63" scope="col"><div align="left">Amount</div></th>
                                                                </tr>
                                                                <?php
                                                                include("connection.php");
                                                                $q = "select * from bookingdetail bd,class c where bd.bookmid='$bookmid' and c.claid=bd.claid";
//echo $q; exit;
                                                                $sql = $conn->query($q);
                                                                $num = $sql->num_rows;
                                                                $_SESSION['ts'] = $num;
                                                                for ($i = 1; $i <= $num; $i++) {
                                                                    $row = $sql->fetch_assoc();
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $row['cuname']; ?></td>
                                                                        <td><?php echo $row['cuage']; ?></td>
                                                                        <td><?php echo $row['cugender']; ?></td>
                                                                        <td><?php echo $row['claname']; ?></td>
                                                                        <td><?php echo $row['seatno']; ?></td>
                                                                        <td><?php echo $row['passportid']; ?></td>
                                                                        <td><?php echo $row['clafare']; ?></td>

                                                                        <?php
                                                                        if ($row['cuage'] > 17)
                                                                            $ad = $ad + 1;
                                                                        else
                                                                            $cl = $cl + 1;
                                                                        $summ = $row['clafare'];
                                                                        $sum = $sum + $summ;
                                                                        ?>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                                $_SESSION['sum'] = $sum;
                                                                ?>
                                                            </table>		
                                                        </fieldset>		</td>
                                                </tr>



                                                <tr>
                                                    <td height="25">&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td><div align="right"></div></td>
                                                </tr>
                                                <tr>
                                                    <td height="25">Total Seat </td>
                                                    <td><label>
                                                            <input type="text" name="textfield2"  disabled="disabled" value="<?php echo $_SESSION['ts']; ?>"/>
                                                        </label></td>
                                                    <td width="52">Adult(s)</td>
                                                    <td width="53"><label>
                                                            <input type="text" name="textfield4"  style="width:50px" disabled="disabled" value="<?php echo $ad; ?>"/>
                                                        </label></td>
                                                    <td width="48">Child(s)</td>
                                                    <td><input type="text" name="textfield42"  style="width:50px"  disabled="disabled"value="<?php echo $cl; ?>"/></td>
                                                </tr>
                                                <tr>
                                                    <td height="23">&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td colspan="3">Total Amount</td>
                                                    <td><input type="text" name="textfield3" disabled="disabled" value="<?php echo $sum; ?>"/></td>
                                                </tr>
                                                <tr>
                                                    <td height="23">&nbsp;</td>
                                                    <td><label></label></td>
                                                    <td colspan="3">&nbsp;</td>
                                                    <td><label>

                                                            <div align="right"><a href="ticketres.php">Go to Home Page </a></div>
                                                        </label></td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                        <p class="style20"></td>
                                            <td width="16%"><table width="100%" >
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


                                            �</td>
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
