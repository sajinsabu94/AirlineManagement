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
    include "uheader.php";
    include("connection.php");
    ?>
    <body>        
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
                                    <fieldset>
                                        <table width="692"  align="center">
                                            <tr>
                                                <th width="158" scope="col"><div align="left">flight name </div></th>
                                                <th width="101" scope="col"><div align="left">status </div></th>
                                                <th width="142" scope="col"><div align="left">Total Seat </div></th>
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
