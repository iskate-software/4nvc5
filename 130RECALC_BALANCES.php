<?php
require_once('../tryconnection.php');

mysqli_select_db($tryconnection, $database_tryconnection);

$BALANCE1 = "DROP TEMPORARY TABLE IF EXISTS TAR1" ;
$BALANCE2 = "CREATE TEMPORARY TABLE TAR1 (CUSTNO FLOAT(7),COMPANY VARCHAR(50),INVDTE DATE, IBAL FLOAT(8,2)) SELECT CUSTNO, COMPANY, INVDTE, SUM(IBAL) AS IBAL FROM ARARECV WHERE IBAL <> 0  GROUP BY CUSTNO ";
$BALANCE3 = "UPDATE ARCUSTO SET BALANCE = 0 WHERE BALANCE <> 0" ;
$BALANCE4 = "UPDATE ARCUSTO JOIN TAR1 USING (CUSTNO) SET ARCUSTO.BALANCE = TAR1.IBAL" ;
$BALANCE5 = "UPDATE ARCUSTO SET BALANCE = BALANCE - CREDIT" ;

$AUTOROLL = "UPDATE CRITDATA SET AUTOROLL = DATE_SUB(NOW(), INTERVAL  1 DAY ) ; " ;
$Q_CRITDATA = mysqli_query($tryconnection, $AUTOROLL) or die(mysqli_error($mysqli_link)) ;

$Q_Balance1 = mysqli_query($tryconnection, $BALANCE1) or die(mysqli_error($mysqli_link));
$Q_Balance2 = mysqli_query($tryconnection, $BALANCE2) or die(mysqli_error($mysqli_link));
$Q_Balance3 = mysqli_query($tryconnection, $BALANCE3) or die(mysqli_error($mysqli_link));
$Q_Balance4 = mysqli_query($tryconnection, $BALANCE4) or die(mysqli_error($mysqli_link));
$Q_Balance5 = mysqli_query($tryconnection, $BALANCE5) or die(mysqli_error($mysqli_link));

 echo '<script type="text/javascript">  alert("Balances have been re-calculated.") ; history.back() ;</script> ' ;
?>