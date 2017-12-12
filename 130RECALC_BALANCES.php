<?php
require_once('../tryconnection.php');

mysql_select_db($database_tryconnection, $tryconnection);

$BALANCE1 = "DROP TEMPORARY TABLE IF EXISTS TAR1" ;
$BALANCE2 = "CREATE TEMPORARY TABLE TAR1 (CUSTNO FLOAT(7),COMPANY VARCHAR(50),INVDTE DATE, IBAL FLOAT(8,2)) SELECT CUSTNO, COMPANY, INVDTE, SUM(IBAL) AS IBAL FROM ARARECV WHERE IBAL <> 0  GROUP BY CUSTNO ";
$BALANCE3 = "UPDATE ARCUSTO SET BALANCE = 0 WHERE BALANCE <> 0" ;
$BALANCE4 = "UPDATE ARCUSTO JOIN TAR1 USING (CUSTNO) SET ARCUSTO.BALANCE = TAR1.IBAL" ;
$BALANCE5 = "UPDATE ARCUSTO SET BALANCE = BALANCE - CREDIT" ;

$AUTOROLL = "UPDATE CRITDATA SET AUTOROLL = DATE_SUB(NOW(), INTERVAL  1 DAY ) ; " ;
$Q_CRITDATA = mysql_query($AUTOROLL, $tryconnection) or die(mysql_error()) ;

$Q_Balance1 = mysql_query($BALANCE1, $tryconnection) or die(mysql_error());
$Q_Balance2 = mysql_query($BALANCE2, $tryconnection) or die(mysql_error());
$Q_Balance3 = mysql_query($BALANCE3, $tryconnection) or die(mysql_error());
$Q_Balance4 = mysql_query($BALANCE4, $tryconnection) or die(mysql_error());
$Q_Balance5 = mysql_query($BALANCE5, $tryconnection) or die(mysql_error());

 echo '<script type="text/javascript">  alert("Balances have been re-calculated.") ; history.back() ;</script> ' ;
?>