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
                    inline: true,
                    minDate: 0
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
            .style22 {color: #000000}
            -->
        </style>
    </head>
    <?php
    include "uheader.php";
    include("connection.php");
    ?>
    <body>
        <?php
        if (isset($_REQUEST['s2'])) {
            $name = $_POST['select1'];
            $name1 = $_POST['select2'];
            
            $sql = $conn->query("select * from allocation al,flight f,route ro where al.roid=ro.roid and ro.sid='$name' and ro.did='$name1' and al.fliid=f.fliid");
            $num = $sql->num_rows;
            if ($num >= 1) {
                header("location:selectone.php");
            }

            for ($i = 1; $i <= $num; $i++) {
                $row = $sql->fetch_assoc();
                $r = $sql1->fetch_assoc();
            }
            $sql2 = $sql->fetch_assoc();
            $a11 = $sql2['fliname'];
            echo $a11;
            $sql3 = $conn->query("select * from flight where fliid='$a11'");
            while ($sql4 = $sql3->fetch_assoc()) {
                $fn = $sql4['fliname'];
            }
        }
        ?> 
        <form id="form1" name="form1" method="post" action="selectone.php">
            <table width="100%" height="auto"  >
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
                                        <p class="style20 style22">Chooooose One </p>

                                        <fieldset>
                                            <table width="100%" border="1" bordercolor="#FFFFFF">
                                                <tr>
                                                    <td width="48%" class="style22"><div align="center">From</div></td>
                                                    <td width="52%"><div align="center"><span class="style22">To</span> </div></td>
                                                </tr>
                                                <tr>
                                                    <td class="style19"><div align="center">
                                                            <select name="select1" id="select1" style="width:200px" >
                                                                <?php
                                                                $abc = $conn->query("select  * from airport");
                                                                while ($row = $abc->fetch_assoc()) {
                                                                    ?>
                                                                    <option value="<?php echo $row['airid']; ?>">
                                                                        <?php echo $row['airname']; ?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div></td>
                                                    <td>  
                                                        <div align="center">
                                                            <select name="select2" id="select2" style="width:200px" >
                                                                <?php
                                                                $abc = $conn->query("select  * from airport");
                                                                while ($row = $abc->fetch_assoc()) {
                                                                    ?>
                                                                    <option value="<?php echo $row['airid']; ?>">
                                                                        <?php echo $row['airname']; ?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="style19"><div align="center"><span class="style22">Date</span>
                                                            <input name="age" type="text" id="age"  style="width:200Px"/>
                                                        </div></td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                        <input name="s2" type="submit" id="s2" value="Search" />
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p><?php
                                        if (isset($_GET['res'])) {
                                            if ($_GET['res'] == 0) {
                                                echo
                                                "NoResult";
                                            }
                                        }
                                        ?></td>
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
