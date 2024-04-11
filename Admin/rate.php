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
            .style37 {color: #dd0000}
            -->
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
        <script type="text/javascript">
        </script>
    </head>
    <?php
    include "aheader.php";
    include("connection.php");
    $a22='';
    $a33='';
    $a44='';
    if (isset($_REQUEST['idd'])) {
        $aa = $_REQUEST['idd'];
        $sql1 = $conn->query("select * from rate where rateid='$aa';");
        while ($sql2 = $sql1->fetch_assoc()) {

            $a22 = $sql2['age'];
            $a33 = $sql2['disco'];
            $a44 = $sql2['pdate'];
        }
    }
    ?>
    <body>
        <?php
        if (isset($_REQUEST['update'])) {
            $aa = $_REQUEST['idd'];
            $name = $_POST['select'];
            $no = $_POST['ag'];
            $no1 = $_POST['di'];
            $no2 = $_POST['pd'];
            $mysql = $conn->query("update rate set fliid='$name',age='$no',disco='$no1',pdate='$no2' where rateid='$aa'");
//header("location:rate.php");
        }
        if (isset($_REQUEST['id'])) {
            $a = $_REQUEST['id'];
            $conn->query("delete from rate where rateid='$a'");
        }
//header("location:adminclass.php");
        if (isset($_REQUEST['Apply'])) {
            $fname = $_POST['select'];
            $age = $_POST['ag'];
            $dis = $_POST['di'];
            $pdat = $_POST['pd'];
            $mysql = $conn->query("insert into rate(fliid,age,disco,pdate)values('$fname','$age','$dis','$pdat')");
        }
        ?>
        <form id="form1" name="form1" method="post" action="#">
            <table width="100%" height="auto"  >
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

                                <td width="64%"><div align="center" class="style6 style19">
                                        <div align="justify" class="style11"> 
                                            <div align="center">
                                                <p class="style37">Rate</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div align="center">

                                        <p><table width="44%" > 
                                                <tr>
                                                    <td width="50%"><span class="style32 style37">Flight Name </span></td>
                                                    <td width="50%"><select name="select" style="width:150px">
                                                            <?php
                                                            $abc = $conn->query("select  * from flight");
                                                            while ($row = $abc->fetch_assoc()) {
                                                                ?>
                                                                <option value="<?php echo $row['fliid']; ?>">
                                                                    <?php echo $row['fliname']; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>                    </td>
                                                </tr> 
                                                <tr>
                                                    <td><span class="style32 style37">Age</span></td>
                                                    <td><input type="text" name="ag" value="<?php echo $a22; ?>"/></td>
                                                </tr>   
                                                <tr>
                                                    <td><span class="style32 style37">Discount</span></td>
                                                    <td><input type="text" name="di" value="<?php echo $a33; ?>"/></td>
                                                </tr>       
                                                <tr>
                                                    <td><span class="style32 style37">Date</span></td>
                                                    <td><input type="text" name="pd"  id="a3" value="<?php echo $a44; ?>"/></td>
                                                </tr>                
                                            </table>
                                            �</p>
                                        <p>
                                            <?php
                                            if (!isset($_REQUEST['idd'])) {
                                                ?>
                                                <input name="Apply" type="submit" id="Apply" value="Apply" />
                                                <input name="reset" type="reset" id="reset" value="reset" />
                                                <?php
                                            }
                                            ?>	          <input name="update" type="submit" id="update" value="update" /></p>

                                    </div>
                                    <fieldset>
                                        <table width="686"  align="center">
                                            <tr>
                                                <th width="127" scope="col"><div align="left">Flight Name </div></th>
                                                <th width="91" scope="col"><div align="left">Age</div></th>
                                                <th width="104" scope="col"><div align="left">Discount</div></th>
                                                <th width="112" scope="col"><div align="left">Date</div></th>
                                                <th width="108" scope="col"><div align="left">EDIT</div></th>
                                                <th width="116" scope="col"><div align="left">DELETE</div></th>
                                            </tr>
                                            <?php
                                            $sql = $conn->query("select * from rate r,flight f where r.fliid=f.fliid;");
                                            $num = $sql->num_rows;
                                            for ($i = 1; $i <= $num; $i++) {
                                                $row = $sql->fetch_assoc();
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['fliname']; ?></td>
                                                    <td><?php echo $row['age']; ?></td>
                                                    <td><?php echo $row['disco']; ?></td>
                                                    <td><?php echo $row['pdate']; ?></td>
                                                    <td><a href="?idd=<?php echo $row['rateid']; ?>">Edit</a></td>
                                                    <td><a href="?id=<?php echo $row['rateid']; ?>">Delete</a></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </table>
                                    </fieldset>
                                </td>
                                <td width="18%"><table width="100%" >
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
