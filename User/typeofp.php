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
            .style20 {
                font-size: 24px;
                color: #99FF33;
            }
            .style22 {color: #666666}
            -->
        </style>
    </head>
    <?php
    include "uheader.php";
    include("connection.php");
    session_start();
    if (isset($_SESSION['bookmid']))
        $bookid = $_SESSION['bookmid'];
    if (isset($_REQUEST['Submit'])) {
        $name = $_POST['select1'];
        $mysql = $conn->query("update boookingmaster set tofp_id='$name' where bookmid='$bookid'");
        header("location:fulld.php");
    }
    ?>
    <body>
        <form id="form1" name="form1" method="post" action="#">
            <table width="100%" height="auto" >
                <tr>
                    <td height="480">

                        <table width="100%" bgcolor="#FFFFFF">
                            <tr>
                                <td width="30%" height="247"><table width="100%" >
                                        <tr>
                                            <td width="84%" height="464">

                                            </td>
                                            <td width="16%">&nbsp;</td>
                                        </tr>
                                    </table></td>
                                <td width="33%">
                                    <div align="center">
                                        <fieldset>
                                            <table width="100%" >
                                                <tr>
                                                    <td width="50%" height="25"><span class="style22">Type Of  Payment </span></td>
                                                    <td width="50%"><label>
                                                            <div align="right">
                                                                <select name="select1" id="select1" style="width:150px" >
                                                                    <?php
                                                                    include("connection.php");
                                                                    $abc = $conn->query("select * from tofp");
                                                                    while ($row = $abc->fetch_assoc()) {
                                                                        ?>
                                                                        <option value="<?php echo $row['tofp_id']; ?>">
                                                                            <?php echo $row['tofp_name']; ?>
                                                                        </option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                        </label>
                                                        </div></td>
                                                </tr>
                                                <tr>
                                                    <td height="28"><span class="style22">Date Of Payment </span></td>
                                                    <td><label>
                                                            <div align="right">
                                                                <input type="text" name="textfield" style="width:150px" disabled="disabled" value="<?php echo date("y-m-d"); ?>"/>
                                                            </div>
                                                        </label></td>
                                                </tr>
                                                <tr>
                                                    <td height="30" colspan="2"><label>
                                                            <div align="center">
                                                                <input type="submit" name="Submit" value="Confirm" />
                                                            </div>
                                                        </label></td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                        <div align="center"></div>
                                        <p class="style20"></td>
                                            <td width="37%"><table width="100%" >
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
