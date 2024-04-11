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
            .style38 {color: #dd0000}
            -->
        </style>
    </head>
    <?php
    include "aheader.php";
    include("connection.php");
    $a11 = '';
    $a22 = '';
    $a33 = '';
    $nm='';
    $si='';
    if (isset($_REQUEST['idd'])) {
        $aa = $_REQUEST['idd'];
        $sql1 = $conn->query("select * from route where roid='$aa';");
        $sql2 = $sql1->fetch_assoc();
        $nm = $sql2['roname'];
        $si = $sql2['sid'];
        while ($sql3 = $sql1->fetch_assoc()) {
            $a33 = $sql3['roname'];
            $a11 = $sql3['sid'];
            $a22 = $sql3['did'];
        }
    }
    if (isset($_REQUEST['update'])) {
        $aa = $_REQUEST['idd'];
        $name = $_POST['a1'];
        $no = $_POST['aselect'];
        $noa = $_POST['select2'];
        $mysql = $conn->query("update route set roname='$name',sid='$no',did='$noa' where roid='$aa'");
    }
    if (isset($_REQUEST['id'])) {
        $a = $_REQUEST['id'];
        $conn->query("delete from route where roid='$a'");
    }
//header("location:adminclass.php");
    if (isset($_REQUEST['Apply'])) {
        $rname = $_POST['a1'];
        $name = $_POST['aselect'];
        $no = $_POST['select2'];
        $mysql = $conn->query("insert into route(roname,sid,did)values('$rname','$name','$no')");
    }
    ?>
    <body>
        <form id="form1" name="form1" method="post" action="#">
            <table width="100%" height="auto"  >
                <tr>
                    <td height="507">

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
                                                <p class="style38">Route</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div align="center">

                                        <p><table width="44%" >
                                                <tr>
                                                    <td><span class="style32 style38"> Route Name </span></td>
                                                    <td><input type="text" name="a1" value="<?php echo $nm; ?>" /></td>
                                                </tr>
                                                <tr>
                                                    <td width="50%"><span class="style32 style38">Sourse</span></td>
                                                    <td width="50%"><select name="aselect" style="width:150px" value="<?php echo $a11; ?>">
                                                            <?php
                                                            $abc2 = $conn->query("select  * from airport");
                                                            while ($row2 = $abc2->fetch_assoc()) {
                                                                ?>
                                                                <option value="<?php echo $row2['airid']; ?>"
                                                                    <?php if ($row2['airid'] == $si) { ?> selected="selected"<?php } ?>>
                                                                    <?php echo $row2['airname']; ?>
                                                                </option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>                  </td>
                                                </tr> 
                                                <tr>
                                                    <td><span class="style38">Destination</span></td>
                                                    <td><select name="select2" style="width:150px" value="<?php echo $a22; ?>">
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
                                                        </select>                  </td>
                                                </tr>            
                                            </table>
                                            �
                                            <input name="Apply" type="submit" id="Apply" value="Apply" />
                                            <input name="reset" type="submit" id="reset" value="reset" />
                                            <input name="update" type="submit" id="update" value="update" /></p>

                                    </div>
                                    <fieldset>
                                        <table width="709"  align="center" >
                                            <tr>
                                                <th width="101" scope="col"><div align="left">Name </div></th>
                                                <th width="175" scope="col"><div align="left">Source </div></th>
                                                <th width="163" scope="col"><div align="left">Destination </div></th>
                                                <th width="141" scope="col"><div align="left">EDIT</div></th>
                                                <th width="103" scope="col"><div align="left">DELETE</div></th>
                                            </tr>
                                            <?php
                                            $sql = $conn->query("select * from route r,airport a where r.sid=a.airid;");
                                            $num = $sql->num_rows;
                                            $sql1 = $conn->query("select * from route r,airport a where r.did=a.airid;");

                                            for ($i = 1; $i <= $num; $i++) {
                                                $row = $sql->fetch_assoc();
                                                $r = $sql1->fetch_assoc();
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['roname']; ?></td>
                                                    <td><?php echo $row['airname']; ?></td>
                                                    <td><?php echo $r['airname']; ?></td>

                                                    <td><a href="?idd=<?php echo $row['roid']; ?>">Edit</a></td>
                                                    <td><a href="?id=<?php echo $row['roid']; ?>">Delete</a></td>
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
