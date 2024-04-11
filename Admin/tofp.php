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
    include("connection.php");
    include "aheader.php";
    $a11='';
    if (isset($_REQUEST['id'])) {
        $a = $_REQUEST['id'];
        $conn->query("delete from tofp where tofp_id='$a'");
//header("location:adminclass.php");
    }
    if (isset($_REQUEST['idd'])) {
        $aa = $_REQUEST['idd'];
        $sql1 = $conn->query("select * from tofp where tofp_id='$aa';");
        while ($sql2 = $sql1->fetch_assoc()) {
            $a11 = $sql2['tofp_name'];
        }
    }
    if (isset($_REQUEST['update'])) {
        $aa = $_REQUEST['idd'];
        $name = $_POST['a1'];
        include("connection.php");
        $mysql = $conn->query("update tofp set tofp_name='$name' where tofp_id='$aa'");
    }
    ?>
    <body>
        <?php
        if (isset($_REQUEST['Apply'])) {
            $name = $_POST['a1'];
            $mysql = $conn->query("insert into tofp(tofp_name)values('$name')");
        }
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

                                <td width="66%"><div align="center" class="style6 style19">
                                        <div align="justify" class="style11"> 
                                            <div align="center">
                                                <p class="style36">Type Of Payment </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div align="center">

                                        <p><table width="44%" > 
                                                <tr>
                                                    <td width="50%">Payment Type </td>
                                                    <td width="50%"><input type="text" name="a1" value="<?php echo $a11; ?>" /></td>
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
                                        <table width="430"  align="center">
                                            <tr>
                                                <th width="124" scope="col"><div align="left">Name </div></th>
                                                <th width="141" scope="col"><div align="left">EDIT</div></th>
                                                <th width="143" scope="col"><div align="left">DELETE</div></th>
                                            </tr>
                                            <?PHP
                                            include("connection.php");
                                            $sql = $conn->query("select * from tofp;");
                                            $num = $sql->num_rows;
                                            for ($i = 1; $i <= $num; $i++) {
                                                $row = $sql->fetch_assoc();
                                                //echo $cid=$row['claid'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['tofp_name']; ?></td>
                                                    <td><a href="?idd=<?php echo $row['tofp_id']; ?>">Edit</a></td>
                                                    <td><a href="?id=<?php echo $row['tofp_id']; ?>">delete</a></td>
                                                </tr>
                                                <?php
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
