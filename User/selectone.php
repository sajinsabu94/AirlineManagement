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
    ?>
    <body>
        <form id="form1" name="form1" method="post" action="bookm.php">
            <table width="100%" height="auto">
                <tr>
                    <td height="480">

                        <table width="100%" bgcolor="#FFFFFF">
                            <tr>
                                <td width="23%" height="247"><table width="89%" >
                                        <tr>
                                            <td width="84%" height="464">

                                            </td>
                                            <td width="16%">&nbsp;</td>
                                        </tr>
                                    </table></td>
                                <td width="66%">
                                    <div align="center">
                                        <p class="style20">
                                            <?php
                                            $name = $_POST['select1'];
                                            $name1 = $_POST['select2'];
                                            $name2 = $_POST['age'];
                                            $q = "select * from allocation al,flight f,route ro where al.roid=ro.roid and ro.sid='$name' and ro.did='$name1' and al.fliid=f.fliid and al.startdate='$name2'";
                                            $sql = $conn->query($q);
                                            $num = $sql->num_rows;
                                            if ($num != 0) {
                                                ?>
                                                <table width="726"  align="center" >
                                                    <tr>
                                                        <th width="182" scope="col"><div align="left">Name </div></th>
                                                        <th width="79" scope="col"><div align="left">Status</div></th>
                                                        <th width="88" scope="col"><div align="left">Start Date</div></th>
                                                        <th width="90" scope="col"><div align="left">Start Time</div></th>
                                                        <th width="98" scope="col"><div align="left">End Date</div></th>
                                                        <th width="85" scope="col"><div align="left">End Time</div></th>
                                                        <th width="72" scope="col"><div align="left">Select</div></th>
                                                    </tr>
                                                    <?php
                                                    while ($row = $sql->fetch_assoc()) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row['fliname'] ?></td>
                                                            <td><?php echo $row['status'] ?></td>
                                                            <td><?php echo $row['startdate'] ?></td>
                                                            <td><?php echo $row['starttime'] ?></td>
                                                            <td><?php echo $row['enddate'] ?></td>
                                                            <td><?php echo $row['endtime'] ?></td>
                                                            <td><a href="bookm.php?id=<?php echo $row['fliid'] ?>&aid=<?php echo $row['allid']; ?>">Select</a></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <tr>                </tr>
                                                </table>
                                                <?php
                                            } else {
                                                header("Location:ticketres.php?res=0");
                                            }
                                            ?>
                                            </td>
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
