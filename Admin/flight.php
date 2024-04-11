<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Untitled Document</title>
        <style type="text/css">
            <!--
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
            -->
        </style>
    </head>
    <?php
    include "aheader.php"
    ?>
    <?php
    include("connection.php");
    $a11 = '';
    $a22 = '';
    $a33 = '';
    if (isset($_REQUEST['idd'])) {
        $aa = $_REQUEST['idd'];
        $sql1 = $conn->query("select * from flight where fliid='$aa';");
        while ($sql2 = $sql1->fetch_assoc()) {
            $a11 = $sql2['fliname'];
            $a22 = $sql2['status'];
            $a33 = $sql2['totseat'];
        }
    }
    ?>
    <body>
        <?php
        if (isset($_REQUEST['id'])) {
            $a = $_REQUEST['id'];
            $conn->query("delete from flight where fliid='$a'");
//header("location:adminflight.php");
        }
        if (isset($_REQUEST['update'])) {
            $aa = $_REQUEST['idd'];
            $c = $_POST['fname'];
            $d = $_POST['status'];
            $ts = $_POST['totseat'];
            $sql = "update flight set fliname='$c',status='$d',totseat='$ts' where fliid='$aa'";
            $conn->query($sql);
        }
        if (isset($_GET['id'])) {
            $idi = $_GET['id'];
            $sql1 = $conn->query("select * from flight where fliid='$idi'");
            $row1 = $sql1->fetch_assoc();
            if (isset($_REQUEST['Apply'])) {
                $name = $_POST['fname'];
                $no = $_POST['status'];
                $ts1 = $_POST['totseat'];
                include("connection.php");
                $mysql = $conn->query("insert into flight(fliname,status,totseat)values('$name','$no','$ts1')");
            }
        }
        ?>
        <form id="form1" name="form1" method="post" action="#">
            <table width="100%" height="auto"  >
                <tr>
                    <td height="480">

                        <table width="81%" bgcolor="#FFFFFF">
                            <tr>
                                <td width="19%" height="247"><table width="69%" >
                                        <tr>
                                            <td width="49%" height="464">			  </td>
                                            <td width="51%">&nbsp;</td>
                                        </tr>
                                    </table></td>

                                <td width="81%"><div align="center" class="style6 style19">
                                        <div align="justify" class="style11"> 
                                            <div align="center" class="style33">Flight </div>
                                        </div>
                                    </div>
                                    <div align="center">

                                        <table width="44%" > 
                                            <tr>
                                                <td width="50%"><span class="style34">Flight Name </span></td>
                                                <td width="50%"><input type="text" name="fname" value="<?php echo $a11; ?>" /></td>
                                            </tr> 
                                            <tr>
                                                <td><span class="style34">Status</span></td>
                                                <td><input type="text" name="status" value="<?php echo $a22; ?>" /></td>
                                            </tr>    
                                            <tr>
                                                <td><span class="style34">Total Seat </span></td>
                                                <td><input type="text" name="totseat" value="<?php echo $a33; ?>" /></td>
                                            </tr>         
                                        </table>

                                        <input name="Apply" type="submit" id="Apply" value="Apply" />
                                        <input name="reset" type="submit" id="reset" value="reset" />
                                        <input name="update" type="submit" id="update" value="update" />
                                    </div>
                                    <fieldset>
                                        <table width="692"  align="center">
                                            <tr>
                                                <th width="158" scope="col"><div align="left">flight name </div></th>
                                                <th width="101" scope="col"><div align="left">status </div></th>
                                                <th width="142" scope="col"><div align="left">Total Seat </div></th>
                                                <th width="129" scope="col"><div align="left">EDIT</div></th>
                                                <th width="138" scope="col"><div align="left">DELETE</div></th>
                                            </tr>
                                            <?PHP
                                            include("connection.php");
                                            $sql = $conn->query("select * from flight;");
                                            $num = $sql->num_rows;
                                            for ($i = 1; $i <= $num; $i++) {
                                                $row = $sql->fetch_assoc();
                                                $fid = $row['fliid'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['fliname']; ?></td>
                                                    <td><?php echo $row['status']; ?></td>
                                                    <td><?php echo $row['totseat']; ?></td>
                                                    <td><a href="?idd=<?php echo $row['fliid']; ?>">Edit</a></td>
                                                    <td><a href="?id=<?php echo $row['fliid']; ?>">Delete</a></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </table>
                                    </fieldset>

                                    <p>&nbsp;</p></td>

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
