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
            .style34 {color: #dd0000; font-weight: bold; font-style: italic; }
            .style35 {color: #dd0000}
            -->
        </style>
    </head>
    <?php
    include "aheader.php";
    include "connection.php";
    ?>
    <body>
        <?php
        $a11='';
        $a22='';
        $a33 ='';
        $a44 ='';
        $a55 ='';
        if (isset($_REQUEST['update'])) {
            $aa = $_REQUEST['id'];
            $name = $_POST['select'];
            $no = $_POST['a2'];
            $no1 = $_POST['a3'];
            $no2 = $_POST['a4'];
            $no3 = $_POST['a5'];
            include("connection.php");
            $mysql = $conn->query("update planetype set fliid='$name',fiseat='$no',exseat='$no1',ecseat='$no2',buseat='$no3' where tyid='$aa'");
        }
        if(isset($_REQUEST['id'])){
        $aa = $_REQUEST['id'];
        $sql1 = $conn->query("select * from planetype where tyid='$aa';");
        while ($sql2 = $sql1->fetch_assoc()) {
            $a11 = $sql2['fliid'];
            $a22 = $sql2['fiseat'];
            $a33 = $sql2['exseat'];
            $a44 = $sql2['ecseat'];
            $a55 = $sql2['buseat'];
        }
        }
        if (isset($_REQUEST['idd'])) {
            $a = $_REQUEST['idd'];
            $conn->query("delete from planetype where tyid='$a'");
//header("location:adminclass.php");
        }
        
       // $a = $_REQUEST['id'];
        if (isset($_REQUEST['Apply'])) {
            $flid = $_POST['select'];
            $fs = $_POST['a2'];
            $exs = $_POST['a3'];
            $ecs = $_POST['a4'];
            $bs = $_POST['a5'];

            include("connection.php");
            $mysql = $conn->query("insert into planetype(fliid,fiseat,exseat,ecseat,buseat)values('$flid','$fs','$exs','$ecs','$bs')");
        }
        ?>  <form id="form1" name="form1" method="post" action="#">
            <table width="100%" height="100%"  >
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
                                            <div align="center" class="style35">Flight </div>
                                        </div>
                                    </div>
                                    <div align="center">

                                        <table width="44%" > 
                                            <tr>
                                                <td width="50%"><span class="style34">Flight Name </span></td>
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
                                                    </select>                  </td>
                                            </tr> 
                                            <tr>
                                                <td><span class="style34">No of First Class </span></td>
                                                <td><input type="text" name="a2" value="<?php echo $a22; ?>"/></td>
                                            </tr>     
                                            <tr>
                                                <td><span class="style34">No of EXicutive </span></td>
                                                <td><input type="text" name="a3" value="<?php echo $a33; ?>"/></td>
                                            </tr>   
                                            <tr>
                                                <td><span class="style34">No of Economic </span></td>
                                                <td><input type="text" name="a4" value="<?php echo $a44; ?>"/></td>
                                            </tr>   
                                            <tr>
                                                <td><span class="style34">No of Bussiness </span></td>
                                                <td><input type="text" name="a5" value="<?php echo $a55; ?>"/></td>
                                            </tr>          
                                        </table>
                                        <p>		  
                                            <input name="Apply" type="submit" id="Apply" value="Apply" />
                                            <input name="reset" type="submit" id="reset" value="reset" />
                                            <input name="update" type="submit" id="update" value="update" />
                                        </p></div>

                                    <fieldset>
                                        <table width="691" align="center">
                                            <tr>
                                                <th width="116" scope="col"><div align="left">Flight Name </div></th>
                                                <th width="70" scope="col"><div align="left">First Seat</div></th>
                                                <th width="89" scope="col"><div align="left">Economic</div></th>
                                                <th width="96" scope="col"><div align="left">Exicutive</div></th>
                                                <th width="94" scope="col"><div align="left">Bussiness</div></th>

                                                <th width="56" scope="col"><div align="left">EDIT</div></th>
                                                <th width="138" scope="col"><div align="left">DELETE</div></th>
                                            </tr>
                                            <?PHP
                                            include("connection.php");
                                            $sql = $conn->query("select * from planetype p,flight f where p.fliid=f.fliid;");
                                            $num = $sql->num_rows;
                                            for ($i = 1; $i <= $num; $i++) {
                                                $row = $sql->fetch_assoc();
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['fliname']; ?></td>
                                                    <td><?php echo $row['fiseat']; ?></td>
                                                    <td><?php echo $row['exseat']; ?></td>
                                                    <td><?php echo $row['ecseat']; ?></td>
                                                    <td><?php echo $row['buseat']; ?></td>

                                                    <td><a href="?id=<?php echo $row['tyid']; ?>">Edit</a></td>
                                                    <td><a href="?idd=<?php echo $row['tyid']; ?>">delete</a></td>
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
