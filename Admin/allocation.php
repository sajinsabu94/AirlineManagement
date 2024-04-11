<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Untitled Document</title>

        <script type="text/javascript" src="calender/js/jquery-1.5.1.min.js"></script>
        <script type="text/javascript" src="/Admin/js/jquery.timepicker.js"></script>        
        <script type="text/javascript" src="/Admin/js/jquery.timepicker.min.js"></script>
        <script type="text/javascript" src="calender/js/jquery-ui-1.8.14.custom.min.js"></script>
        <link type="text/css" href="calender/css/redmond/jquery-ui-1.8.14.custom.css" rel="stylesheet" />        
        <script type="text/javascript">
        </script>
        <style type="text/css">
            .style6 {
                font-weight: bold;
                font-style: italic;
                font-size: 36px;
                font-family: Georgia, "Times New Roman", Times, serif;
                color: #FFFF00;
            }
            .style11 {font-size: 24px}
            .style19 {color: #99FF66}
            .style33 {color: #dd0000}
            .style34 {color: #dd0000; font-weight: bold; font-style: italic; }            
        </style>

        <script type="text/javascript" src="../calender/js/jquery-1.5.1.min.js"></script>
        <script type="text/javascript" src="../calender/js/jquery-ui-1.8.14.custom.min.js"></script>
        <link type="text/css" href="../calender/css/redmond/jquery-ui-1.8.14.custom.css" rel="stylesheet" />	
        <script type="text/javascript">
            $(function () {
                $('#a3').datepicker({
                    dateFormat: 'yy-mm-dd',
                    inline: true
                });
                $('#a5').datepicker({
                    dateFormat: 'yy-mm-dd',
                    inline: true
                });
            });
        </script>
    </head>

    <?php
    $a33 = '';
    $a44 = '';
    $a55 = '';
    $a66 = '';
    $a77 = '';
    $a88 = '';
    include("connection.php");
    if (isset($_REQUEST['idd'])) {
        $aa = $_REQUEST['idd'];
        $sql1 = "select * from allocation where allid='$aa';";
        $sql2 = $conn->query($sql1);
        $row = $sql2->fetch_assoc();
        $a33 = $row['startdate'];
        $a44 = $row['starttime'];
        $a55 = $row['enddate'];
        $a66 = $row['endtime'];
        $a77 = $row['roid'];
        $a88 = $row['fliid'];
    }
    ?>
    <body>
        <?php
        if (isset($_REQUEST['Apply'])) {
            $flid = $_POST['flight'];
            $rid = $_POST['route'];
            $std = $_POST['a3'];
            $stt = $_POST['a4'];
            $edd = $_POST['a5'];
            $edt = $_POST['a6'];
            include("connection.php");
            $q = "insert into allocation(fliid,roid,startdate,starttime,enddate,endtime)values('$flid','$rid','$std','$stt','$edd','$edt')";
            $mysql = $conn->query($q);
        }
        ?>
        <?php
        if (isset($_POST['update'])) {
            $aa = $_REQUEST['idd'];
            $name = $_POST['route'];
            $no = $_POST['flight'];
            $no1 = $_POST['a3'];
            $no2 = $_POST['a4'];
            $no3 = $_POST['a5'];
            $no4 = $_POST['a6'];
            include("connection.php");
            $q1 = "update allocation set fliid='$no',roid='$name',startdate='$no1',starttime='$no2',enddate='$no3',endtime='$no4' where allid='$aa'";
            $mysql = $conn->query($q1);
            header("location:allocation.php");
        }
        ?>
        <?php
        include "aheader.php"
        ?>

        <table width="100%" height="auto" >
            <tr>
                <td height="480">

                    <table width="100%" bgcolor="#FFFFFF">
                        <tr>
                            <td width="18%" height="247"><table width="86%" >
                                    <tr>
                                        <td width="84%" height="464">

                                        </td>
                                        <td width="16%">&nbsp;</td>
                                    </tr>
                                </table></td>

                            <td width="66%"><div align="center" class="style6 style19">
                                    <div align="justify" class="style11"> 
                                        <div align="center" class="style33">Allocation</div>
                                    </div>
                                </div><form id="form1" name="form1" method="post" action="#">
                                    <div align="center">
                                        <table width="44%" >
                                            <tr>
                                                <td width="50%"><span class="style34"> Route Name</span></td>
                                                <td width="50%"><select name="route" style="width:150px">

                                                        <?php
                                                        $abc = "select  * from route";
                                                        $res11 = $conn->query($abc);
                                                        if ($res11->num_rows > 0) {
                                                            while ($row = $res11->fetch_assoc()) {
                                                                ?>
                                                                <option value="<?php echo $row['roid']; ?>" <?php if ($a77 == $row['roid']) { ?> selected="selected" <?php } ?>>

                                                                    <?php echo $row['roname']; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="style34">Flight Name </span></td>
                                                <td><select name="flight" style="width:150px" >
                                                        <?php
                                                        $abc1 = "select  * from flight";
                                                        $res33 = $conn->query($abc1);
                                                        if ($res33->num_rows > 0) {
                                                            while ($row1 = $res33->fetch_assoc()) {
                                                                ?>
                                                                <option value="<?php echo $row1['fliid']; ?>" <?php if ($a88 == $row1['fliid']) { ?> selected="selected" <?php } ?>> <?php echo $row1['fliname']; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><span class="style34">Starting Date </span></td>
                                                <td>
                                                    <input type="text" name="a3"  id="a3" value="<?php echo $a33; ?>"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="26"><span class="style34">Time</span></td>
                                                <td>
                                                    <input type="text" name="a4" id="a4" value="<?php echo $a44; ?>"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="26">
                                                    <span class="style34">Ending Date </span>
                                                </td>
                                                <td>
                                                    <input type="text" name="a5"  id="a5" value="<?php echo $a55; ?>"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="28">
                                                    <span class="style34 time ui-timepicker-input">Time</span>
                                                </td>
                                                <td>
                                                    <input type="text" name="a6" id="a6" value="<?php echo $a66; ?>"/>
                                                </td>
                                            </tr>                                                                                 
                                        </table>

                                        <input name="Apply" type="submit" id="Apply" value="Apply" />
                                        <input name="reset" type="reset" id="reset" value="reset" />
                                        <input name="update" type="submit" id="update" value="update" />

                                    </div></form>
                                <fieldset>
                                    <table width="710"  align="center">
                                        <tr>
                                            <th width="67" scope="col"><div align="left">Routename</div></th>
                                            <th width="86" scope="col"><div align="left">Flight Name </div></th>
                                            <th width="80" scope="col"><div align="left">Start Date</div></th>
                                            <th width="79" scope="col"><div align="left">StartTime</div></th>
                                            <th width="85" scope="col"><div align="left">Enddate</div></th>
                                            <th width="83" scope="col"><div align="left">EndTime</div></th>
                                            <th width="50" scope="col"><div align="left">EDIT</div></th>
                                            <th width="62" scope="col"><div align="left">DELETE</div></th>
                                        </tr>
                                        <?php
                                        $sqla = "select * from allocation";

                                        $res44 = $conn->query($sqla);
                                        $num = $res44->num_rows;
//$sql3=mysql_query("select * from allocation al,flight f,route rou where al.fliid=f.fliid and al.roid=rou.roid;");
                                        while ($rowa = $res44->fetch_assoc()) {

                                            //$row3=mysql_fetch_array($sql3);
                                            //print_r($rowa);
                                            ?>
                                            <tr>

                                                <?php
                                                $rid = $rowa['roid'];
                                                //echo $rid; exit;
                                                $q1 = "select * from route where roid='$rid'";
                                                $s1 = $conn->query($q1);
                                                $rw1 = $s1->fetch_assoc();
                                                ?>
                                                <td><?php echo $rw1['roname']; ?></td>
                                                <?php
                                                $flid = $rowa['fliid'];
                                                $q2 = "select * from flight where fliid='$flid'";
                                                //echo $q2; exit;
                                                $s2 = $conn->query($q2);
                                                $rw2 = $s2->fetch_assoc();
                                                ?>
                                                <td><?php echo $rw2['fliname']; ?></td>
                                                <td><?php echo $rowa['startdate']; ?></td>
                                                <td><?php echo $rowa['starttime']; ?></td>
                                                <td><?php echo $rowa['enddate']; ?></td>
                                                <td><?php echo $rowa['endtime']; ?></td>
                                                <td><a href="?idd=<?php echo $rowa['allid']; ?>">Edit</a></td>
                                                <td><a href="allocation_delete.php?id=<?php echo $rowa['allid']; ?>">Delete</a></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </table>

                                </fieldset>
                                <p>&nbsp;</p></td>
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

    </body>
    <?php
    include ("footer.php");
    ?>
</html>
