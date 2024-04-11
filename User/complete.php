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
            .style22 {
                font-size: 20px;
                color: #999999;
                font-weight: bold;
            }
            .style23 {font-size: 16px}
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
                                            <div align="center" class="style22">
                                                <p>Complete The Process</p>
                                                <p class="style23">Press The Home Button  </p>
                                                <p class="style23"><a href="ticketres.php">Go to Home Page </a></p>
                                            </div>
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
