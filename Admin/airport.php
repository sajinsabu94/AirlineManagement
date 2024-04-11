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
            .style36 {color: #dd0000}
            -->
        </style>
    </head>
    <?php
    include "aheader.php";
    $conn = include("connection.php");
    $a11 = '';
    $a22 = '';
    if (isset($_GET['id'])) {
        ?>
        <script type="text/javascript">
            alert("hei");
        </script>
        '
        <?php
        $a = $_GET['id'];
        $qr = "delete from airport where airid='$a'";
        $res3 = $conn->query($qr);
        header("location:airport.php");
    }
    if (isset($_GET['idd'])) {
        $aa = $_GET['idd'];
        $sql1 = "select * from airport where airid='$aa';";
        $res1 = $conn->query($sql1);
        if ($res1->num_rows > 0) {
            while ($row = $res1->fetch_assoc()) {
                $a11 = $row['airname'];
                $a22 = $row['aircity'];
            }
        }
    }
    if (isset($_POST['update'])&&isset($_GET['idd'])) {
        $name = $_POST['a1'];
        $no = $_POST['a2'];
        $mysql = "update airport set airname='$name',aircity='$no' where airid='$aa'";
        $result = $conn->query($mysql);
        header("location:airport.php");
    }

    if (isset($_POST['Apply'])) {
        $name = $_POST['a1'];
        $no = $_POST['a2'];
        $query1 = "insert into airport(airname,aircity)values('$name','$no')";
        $res2 = $conn->query($query1);
    }
    ?>
    <body>

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

                                <td width="66%"><div align="center" class="style6 style19">
                                        <div align="justify" class="style11"> 
                                            <div align="center">
                                                <p class="style36">Airport</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div align="center">

                                        <p><table width="44%" > 
                                                <tr>
                                                    <td width="50%"><span class="style32 style36"> Name </span></td>
                                                    <td width="50%"><input type="text" name="a1" value="<?php echo $a11 ?>" /></td>
                                                </tr> 
                                                <tr>
                                                    <td><span class="style32 style36">City</span></td>
                                                    <td><input type="text" name="a2" value="<?php echo $a22 ?>" /></td>
                                                </tr>            
                                            </table>
                                            �</p>
                                        <p>
                                            <input name="Apply" type="submit" id="Apply" value="Apply" />
                                            <input name="reset" type="reset" id="reset" value="reset" />
                                            <input name="update" type="submit" id="update" value="update" />
                                        </p>

                                    </div>
                                    <fieldset>
                                        <table width="590"  align="center">
                                            <tr>
                                                <th width="124" scope="col"><div align="left">Name </div></th>
                                                <th width="154" scope="col"><div align="left">City </div></th>
                                                <th width="141" scope="col"><div align="left">EDIT</div></th>
                                                <th width="143" scope="col"><div align="left">DELETE</div></th>
                                            </tr>
                                            <?php
                                            $sql = "select * from airport;";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row['airname']; ?></td>
                                                        <td><?php echo $row['aircity']; ?></td>
                                                        <td><a href="?idd=<?php echo $row['airid']; ?>">edit</a></td>
                                                        <td><a href="?id=<?php echo $row['airid']; ?>">delete</a></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </table>
                                    </fieldset>
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
        </form>
    </body>
    <?php
    include "footer.php"
    ?>
</html>
