<?php
echo ' Started ' ;
session_start() ;

require_once('../tryconnection.php'); 

mysqli_select_db($tryconnection, $database_tryconnection);

for ($j=1; $j < 37000 ; $j++)
 { 
 $view = 'hx'.$j ;
  $dropit = "DROP VIEW IF EXISTS $view " ;
  $go = mysqli_query($tryconnection, $dropit) or die(mysqli_error($mysqli_link)) ;
 }
echo '</br>  done ' ;

/*
$query_OVMA = "SELECT * FROM OVMAFEE";
$OVMA = mysql_query($query_OVMA, $tryconnection) or die(mysql_error());
$row_OVMA = mysql_fetch_assoc($OVMA) ;
do {
 echo $row_OVMA['MAXIMUM'] .';' . $row_OVMA['NDFMARKUP']  .';' . $row_OVMA['DFMARKUP'] .';'; 
 } while ($row_OVMA = mysql_fetch_assoc($OVMA)) ;
 echo ' done ' .'</br> ' ;


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

 echo '<script type="text/javascript">  alert("Balances have been re-calculated.") ; </script> ' ;


setlocale(LC_MONETARY, 'en_US'); 
$who = "SELECT CUSTNO, COMPANY, CONTACT, BALANCE, CREDIT,LDATE, LASTPAY FROM ARCUSTO WHERE YEAR(LDATE) > 2010 ORDER BY COMPANY,CONTACT ASC" ;
$Q_who = mysql_query($who, $tryconnection) or die(mysql_error()) ;
$row_who  = mysql_fetch_assoc($Q_who) ;
$who =  $row_who['CUSTNO'] ;
reset ($row_who) ;
$outawhack = 0 ;
do {
 $who = $row_who['CUSTNO'] ;
 $whoalph = $row_who['COMPANY'] ;
 $whof = $row_who['CONTACT'] ;
 $bal =  round($row_who['BALANCE'],2) ;
 $Linv = $row_who['LDATE'] ;
 $Lpay = $row_who['LASTPAY'] ;

 $inv1 = "SELECT SUM(ITOTAL) AS I1TOT FROM ARINVOI WHERE CUSTNO = '$who' " ;
 $gi1 = mysql_query($inv1, $tryconnection) or die(mysql_error()) ;
 $row_agi1 = mysql_fetch_assoc($gi1) ;   
 $I1tot = $row_agi1['I1TOT'] ;

 $inv2 = "SELECT SUM(ITOTAL) AS I2TOT FROM INVLAST WHERE CUSTNO = '$who' " ;
 $gi2 = mysql_query($inv2, $tryconnection) or die(mysql_error()) ;
 $row_agi2 = mysql_fetch_assoc($gi2) ;
 $I2tot = $row_agi2['I2TOT'] ;
  
 $inv3 = "SELECT SUM(ITOTAL) AS I3TOT FROM ARYINVO WHERE CUSTNO = '$who' " ;
 $gi3 = mysql_query($inv3, $tryconnection) or die(mysql_error()) ;
 $row_agi3 = mysql_fetch_assoc($gi3) ;
 $I3tot = $row_agi3['I3TOT'] ;
 
 $csh1 = "SELECT SUM(AMTPAID) AS C1TOT FROM ARCASHR WHERE CUSTNO = '$who' " ;
 $gc1 = mysql_query($csh1, $tryconnection) or die(mysql_error()) ;
 $row_agc1 = mysql_fetch_assoc($gc1) ;   
 $C1tot = $row_agc1['C1TOT'] ;
 
 $csh2 = "SELECT SUM(AMTPAID) AS C2TOT FROM CASHDEP WHERE CUSTNO = '$who' " ;
 $gc2 = mysql_query($csh2, $tryconnection) or die(mysql_error()) ;
 $row_agc2 = mysql_fetch_assoc($gc2) ;   
 $C2tot = $row_agc2['C2TOT'] ;
 
  
 $csh3 = "SELECT SUM(AMTPAID) AS C3TOT FROM LASTCASH WHERE CUSTNO = '$who' " ;
 $gc3 = mysql_query($csh3, $tryconnection) or die(mysql_error()) ;
 $row_agc3 = mysql_fetch_assoc($gc3) ;   
 $C3tot = $row_agc3['C3TOT'] ;
 
  
 $csh4 = "SELECT SUM(AMTPAID) AS C4TOT FROM ARYCASH WHERE CUSTNO = '$who' " ;
 $gc4 = mysql_query($csh4, $tryconnection) or die(mysql_error()) ;
 $row_agc4 = mysql_fetch_assoc($gc4) ;   
 $C4tot = $row_agc4['C4TOT'] ;

 $In =  $I1tot + $I2tot + $I3tot ;
 $Cn =  $C1tot + $C2TOT + $C3tot +$C4tot;
 $Diff =  round(($In - $Cn),2) ;
//  if (round($In,2) + $bal - round($Cn,2) != 0)
    if ($bal != $Diff) {

  $outawhack++ ;
  echo $who . ' - 5 ' . $whoalph . ', ' . $whof . ' Balance is ' . $bal .':: invoiced ' .$In . ' Cash ' . $Cn 
      . ' Difference = ' .  $Diff . ' Invoiced '  . $Linv . ' Payment ' . $Lpay  ;
  echo '</br>' ; 
 }

} while ($row_who  = mysql_fetch_assoc($Q_who)) ;
echo  'We have ' . $outawhack . ' imbalances' ;
echo '</br>' . ' 4end' ;


 /*

$name = " thESE ARE  apostropheS' ' " ;
echo $name ;
$namex = str_replace( "'", "*",$name) ;
echo ' New name is ' . $namex ;
$_POST['staff'] = 'Me' ;
$_POST['problem'] = 'Hullabaloo' ;
	$today = 'Appointment made by '.mysql_real_escape_string($_POST['staff']).' for '.mysql_real_escape_string($_POST['problem'])  ;
ECHO $today ;
echo ' Finished' ;

$tr_it = "SELECT INVMAJ, INVREVCAT, INVORDDOC, PRIORITY, SUM(INVTOT) AS INVTOT FROM SALESCAT RIGHT JOIN DOCTOR ON SALESCAT.INVORDDOC = DOCTOR.DOCTOR GROUP BY INVREVCAT, PRIORITY WITH ROLLUP" ;
$get_tr = mysql_query($tr_it, $tryconnection) or die(mysql_error()) ;
$row_TOTREV = mysql_fetch_assoc($get_tr) ;
echo ' Got the data ' ;


//do {
//if (!empty($row_TOTREV['INVORDDOC']) && $row_TOTREV['INVREVCAT']<90) {
echo ' checking ' ;
	 if ($row_TOTREV['PRIORITY'] === null){
	  echo $row_TOTREV['INVORDDOC'];
//	  $subtot = $subtot + $row_TOTREV['INVTOT'] ;
}
	 else {
	  echo 'Subtotal';
	 }
	 $_POST[treatdate] = '04/02/2016' ;
	 echo '</br> ' . $_POST[treatdate] ;
	$getnow = "SELECT NOW() as now, DATE_SUB(NOW(), INTERVAL 2 WEEK) AS window" ;
	$qg = mysql_query($getnow, $tryconnection) or die(mysql_error()) ;
	$row_q = mysql_fetch_assoc($qg) ;
	$get_when = "SELECT STR_TO_DATE('$_POST[treatdate]', '%m/%d/%Y') AS PROJ" ;
	$q_when = mysql_query($get_when, $tryconnection) or die(mysql_error()) ;
	$row_when = mysql_fetch_assoc($q_when) ;
	 if ($row_when[PROJ] > $row_q[now] || $row_when[PROJ] < $row_q[window] ) {
	 echo ' Not in the past or future!!!' ;
	 }
	 else
	 {
	
	  echo ' OK' ;
	 }
	
//	} 

	else if (empty($row_TOTREV['INVREVCAT'])){
	echo "TOTAL";
	}
	else if ($row_TOTREV['INVREVCAT']<90){
	echo "Subtotal";
	}
	
//} (while $row_TOTREV = mysql_fetch_assoc($get_tr) ;)
*/
echo ' end ' ;
echo 10 + null ;
?>